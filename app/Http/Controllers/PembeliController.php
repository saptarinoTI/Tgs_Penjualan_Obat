<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PembeliController extends Controller
{
    public function index(): View
    {
        $pembelis = User::where('is_admin', '0')->get();
        return view('app.pembeli.index', compact('pembelis'));
    }

    public function destroy($id): RedirectResponse
    {
        $pembeli = User::findOrFail($id);
        DB::beginTransaction();
        try {
            $pembeli->delete();

            DB::commit();
            return to_route('pembeli.index')->with('sukses', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
        }
    }
}
