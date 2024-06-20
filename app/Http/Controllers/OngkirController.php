<?php

namespace App\Http\Controllers;

use App\Models\Ongkir;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OngkirController extends Controller
{
    public function index(): View
    {
        $ongkir = Ongkir::first();
        return view('app.ongkir.index', compact('ongkir'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data = Ongkir::findOrFail($id);
        $data->update([
            'biaya' => $request->ongkir
        ]);
        return back()->with('sukses', 'Ongkos kirim berhasil disimpan.');
    }
}
