<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IObatController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'jumlah' => ['required', 'numeric', 'min_digits:1'],
        ], [
            'required' => 'Kolom wajib diisi.',
            'numeric' => 'Kolom wajib diisi dengan angka.',
            'min_digits' => 'Kolom wajib diisi minimal 1 angka.',
        ]);

        $obat = Obat::findOrFail($request->id);
        $keranjang = Keranjang::where('user_id', auth()->user()->id)->where('obat_id', $obat->id)->first();

        if ($request->jumlah > $obat->stok) {
            return to_route('obat.index')->with('error', 'Data pembelian obat melebihi stok');
        }

        if ($request->jumlah <= 0) {
            return to_route('obat.index')->with('error', 'Data pembelian obat tidak boleh kurang dari 0');
        }

        if ($keranjang) {
            $jKeranjang = $keranjang->jumlah + $request->jumlah;
            if ($jKeranjang > $obat->stok) {
                return to_route('obat.index')->with('error', 'Data pembelian obat dangan keranjang obat melebihi stok');
            }
        }

        DB::beginTransaction();
        try {
            if (!$keranjang) {
                Keranjang::create([
                    'user_id' => auth()->user()->id,
                    'obat_id' => $request->id,
                    'jumlah' => $request->jumlah
                ]);
            } else {
                $keranjang->update([
                    'jumlah' => $keranjang->jumlah + $request->jumlah,
                ]);
            }

            DB::commit();
            return to_route('keranjang.index')->with('sukses', 'Data obat masuk kedalam keranjang.');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
        dd($obat);
    }
}
