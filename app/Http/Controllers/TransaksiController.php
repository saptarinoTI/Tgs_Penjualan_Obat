<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Transaksi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TransaksiController extends Controller
{
    public function index(): View
    {
        if (Auth::user()->is_admin == 1) {
            $transaksis = Transaksi::with(['detailtransaksis', 'user'])->get();
        } else {
            $transaksis = Transaksi::with(['detailtransaksis', 'user'])->where('user_id', Auth::user()->id)->get();
        }
        return view('app.transaksi.index', compact('transaksis'));
    }

    public function show($id): View
    {
        $data = Transaksi::findOrFail($id);
        return view('app.transaksi.show', compact('data'));
    }

    public function confirm($id): RedirectResponse
    {
        $data = Transaksi::findOrFail($id);
        $data->update([
            'status' => "1",
        ]);
        return redirect()->back()->with('sukses', 'Data pembelian berhasil di konfirmasi,');
    }

    public function reject($id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = Transaksi::findOrFail($id);
            foreach ($data->detailtransaksis as $detail) {
                $obat = Obat::findOrFail($detail->obat_id);
                $obat->update([
                    'stok' => $obat->stok + $detail->jumlah
                ]);
            }
            $data->update([
                'status' => "3",
            ]);
            DB::commit();
            return redirect()->back()->with('sukses', 'Data pembelian berhasil di batalkan,');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
    }

    public function finish($id): RedirectResponse
    {

        $data = Transaksi::findOrFail($id);
        $data->update([
            'status' => "2",
        ]);
        return redirect()->back()->with('sukses', 'Data pembelian telah selesai,');
    }
}
