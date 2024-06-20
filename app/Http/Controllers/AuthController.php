<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function check(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'no_hp' => ['required', 'numeric'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'no_hp' => 'Nomor Hp atau Password salah.',
        ])->onlyInput('no_hp');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $datas = $request->validate([
            'name' => ['required'],
            'no_hp' => ['required', 'numeric', 'max_digits:15', 'min_digits:10', 'unique:users,no_hp'],
            'password' => ['required'],
            'alamat' => ['required'],
        ], [
            'required' => 'Kolom wajib diisi.',
            'numeric' => 'Kolom wajib diisi dengan angka.',
            'min_digits' => 'Kolom wajib diisi minimal 10 angka.',
            'max_digits' => 'Kolom wajib diisi maksimmal 15 angka.',
            'unique' => 'Nomor hp telah terdaftar.',
        ]);
        DB::beginTransaction();
        try {

            User::create($datas);

            DB::commit();
            return to_route('login')->with('sukses', 'Pendaftaran berhasil, silahkan login,');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
