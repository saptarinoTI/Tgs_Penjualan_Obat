<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Keranjang;
use App\Models\Obat;
use App\Models\Ongkir;
use App\Models\Transaksi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;

class KeranjangController extends Controller
{
    public function index(): View
    {
        $keranjangs = Keranjang::where('user_id', auth()->user()->id)->with(['user', 'obat'])->get();
        $ongkir = Ongkir::first();
        $ongkirs = 0;
        return view('app.keranjang.index', compact('keranjangs', 'ongkir', 'ongkirs'));
    }

    public function create(Request $request): RedirectResponse
    {
        $image = '';
        $total = 0;
        $request->validate([
            'transfer' => ['required_if:pembayaran,transfer', 'image', 'extensions:jpg,png,jpeg']
        ], [
            'required_if' => 'Wajib mengirim bukti transfer',
            'image' => 'Masukkan hanya gambar.',
            'extensions' => 'Masukkan hanya gambar dengan ektensi jpgm jpeg atau png.',
        ]);

        $keranjangs = Keranjang::where('user_id', auth()->user()->id)->get();
        foreach ($keranjangs as $keranjang) {
            if ($keranjang->jumlah > $keranjang->obat->stok) {
                return redirect()->back()->with('error', 'Pembelian obat melebihi stok obat yang ada.');
            }
        }

        $ongkir = Ongkir::first();

        DB::beginTransaction();
        try {
            if (!empty($request->file('transfer'))) {
                $image = 'pemb_' . Str::random(10) . '_' . date('dmYhis') . '.' . $request->file('transfer')->getClientOriginalExtension();
                $request->file('transfer')->storeAs('pembayaran', $image);
                $img_slider = config('app.url') . '/pembayaran/' . $image;
            }
            foreach ($keranjangs as $keranjang) {
                $total += ($keranjang->obat->harga * $keranjang->jumlah);
            }

            $tr = Transaksi::create([
                'user_id' => auth()->user()->id,
                'kode_unik' => Str::random('6'),
                'tgl_pembelian' => now(),
                'pembayaran' => $request->pembayaran,
                'bukti_tf' => $request->pembayaran == 'cod' ? null : $image,
                'status' => '0',
                'total' => $total + $ongkir->biaya,
            ]);

            foreach ($keranjangs as $keranjang) {
                $obt = Obat::findOrFail($keranjang->obat_id);
                DetailTransaksi::create([
                    'transaksi_id' => $tr->id,
                    'obat_id' => $keranjang->obat_id,
                    'jumlah' => $keranjang->jumlah,
                ]);

                $obt->update([
                    'stok' => $obt->stok - $keranjang->jumlah,
                ]);

                $keranjang->delete();
            }

            DB::commit();
            return to_route('transaksi.index')->with('sukses', 'Data pembelian obat berhasil dikonfirmasi.');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
    }

    public function destroy($id): RedirectResponse
    {
        $keranjang = Keranjang::findOrFail($id);
        DB::beginTransaction();
        try {
            $keranjang->delete();
            DB::commit();
            return to_route('keranjang.index')->with('sukses', 'Data pembelian obat berhasil dihapus.');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
    }
}
