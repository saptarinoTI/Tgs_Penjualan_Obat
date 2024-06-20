<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::get();
        return view('app.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('app.obat.create');
    }

    public function store(Request $request)
    {
        $datas = $request->validate([
            'nama_obat' => ['required'],
            'jenis_obat' => ['required'],
            'stok' => ['required', 'numeric', 'min_digits:1',],
            'deskripsi_obat' => ['required'],
            'dosis_obat' => ['required'],
            'harga' => ['required', 'numeric', 'min_digits:1',],
        ], [
            'required' => 'Kolom wajib diisi.',
            'numeric' => 'Kolom wajib diisi dengan angka.',
            'min_digits' => 'Kolom wajib diisi minimal 1 angka.',
        ]);
        DB::beginTransaction();
        try {
            Obat::create($datas);

            DB::commit();
            return to_route('obat.index')->with('sukses', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function show(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('app.obat.show', compact('obat'));
    }

    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('app.obat.edit', compact('obat'));
    }

    public function update(Request $request, string $id)
    {
        $datas = $request->validate([
            'nama_obat' => ['required'],
            'jenis_obat' => ['required'],
            'stok' => ['required', 'numeric', 'min_digits:1',],
            'deskripsi_obat' => ['required'],
            'dosis_obat' => ['required'],
            'harga' => ['required', 'numeric', 'min_digits:1',],
        ], [
            'required' => 'Kolom wajib diisi.',
            'numeric' => 'Kolom wajib diisi dengan angka.',
            'min_digits' => 'Kolom wajib diisi minimal 1 angka.',
        ]);
        $obat = Obat::findOrFail($id);
        DB::beginTransaction();
        try {
            $obat->update($datas);

            DB::commit();
            return to_route('obat.index')->with('sukses', 'Data Berhasil Dirubah');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }

    public function destroy(string $id)
    {
        $obat = Obat::findOrFail($id);
        DB::beginTransaction();
        try {
            $obat->delete();

            DB::commit();
            return to_route('obat.index')->with('sukses', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
