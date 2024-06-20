<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('build/assets/app-Djs4JRYA.css') }}">
    <script src="{{ asset('build/assets/app-6JcJmGPt.js') }}"></script>
</head>

<body>
    <div class="flex justify-center min-h-screen bg-emerald-100">
        <div class="flex flex-col items-center justify-center p-6 lg:w-1/2 xl:w-5/12 sm:p-12">
            <div class="px-10 pt-6 pb-8 bg-white shadow-xl rounded-xl">
                <div class="flex justify-center">
                    <img src="{{ asset('logo-tra.png') }}" class="w-48" />
                </div>
                <div class="flex flex-col items-center mt-6">
                    <div class="w-full text-left">
                        <h1 class="mb-1 text-xl font-bold text-gray-800">Login</h1>
                        <p class="text-sm text-gray-400">Selamat datang kembali, masukkan kredensial Anda untuk
                            melanjutkan.
                        </p>
                    </div>
                    <div class="flex-1 w-full mt-4">
                        <form method="POST" action="{{ route('login.check') }}" class="max-w-sm mx-auto space-y-2">
                            @csrf
                            <div>
                                <label for="name" class="text-sm font-semibold text-gray-700">Nomor Hp</label>
                                <input class="input-auth @error('no_hp') is-invalid @enderror" required type="number"
                                    name="no_hp" id="no_hp" min="0" maxlength="15" placeholder="Masukkan Nomor Hp"
                                    value="{{ old('no_hp') }}" />
                                @error('no_hp')
                                <div class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="text-sm font-semibold text-gray-700">Password</label>
                                <input class="input-auth @error('password') is-invalid @enderror" required
                                    type="password" name="password" id="password" placeholder="Masukkan Password" />
                                @error('password')
                                <div class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <button
                                class="w-full py-2 font-semibold text-white transition-all duration-300 ease-in-out rounded-lg bg-emerald-600 hover:bg-emerald-700">
                                Sign In
                            </button>
                        </form>
                    </div>
                </div>
                <div class="mt-6 text-sm font-medium text-center text-gray-400">
                    <span>Belum punya akun ? <a href="{{ route('register') }}" class="text-emerald-700">Daftar
                            disini</a></span>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('sukses'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: '{{ session('sukses') }}',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    </script>
    @endif

</body>

</html>
