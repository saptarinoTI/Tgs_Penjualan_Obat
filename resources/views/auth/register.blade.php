<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-Djs4JRYA.css') }}">
    <script src="{{ asset('build/assets/app-6JcJmGPt.js') }}"></script>
</head>

<body>
    <div class="flex justify-center min-h-screen bg-emerald-100">
        <div class="flex flex-col items-center justify-center p-6 lg:w-1/2 xl:w-5/12 sm:p-12">
            <div class="w-full px-10 pt-6 pb-8 bg-white shadow-xl rounded-xl">
                <div class="flex justify-center">
                    <img src="{{ asset('logo-tra.png') }}" class="w-48" />
                </div>
                <div class="flex flex-col items-center mt-6">
                    <div class="w-full text-left">
                        <h1 class="mb-1 text-xl font-bold text-gray-800">Register</h1>
                        <p class="text-sm text-gray-400">Silakan masuk jika Anda sudah membuat akun.
                        </p>
                    </div>
                    <div class="flex-1 w-full mt-4">
                        <form class="mx-auto space-y-2 w-sm" method="POST">
                            @csrf
                            <div>
                                <label for="name" class="text-sm font-semibold text-gray-700">Nama Lengkap</label>
                                <input class="input-auth @error('name') is-invalid @enderror" required type="text"
                                    name="name" id="name" placeholder="Masukkan Nama Lengkap"
                                    value="{{ old('name') }}" />
                                @error('name')
                                <div class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="name" class="text-sm font-semibold text-gray-700">No. Hp</label>
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
                            <div>
                                <label for="name" class="text-sm font-semibold text-gray-700">Alamat Lengkap</label>
                                <textarea class="input-auth @error('alamat') is-invalid @enderror" required
                                    name="alamat" id="alamat" rows="4">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                <div class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <button
                                class="w-full py-2 font-semibold text-white transition-all duration-300 ease-in-out rounded-lg bg-emerald-600 hover:bg-emerald-700">
                                Register
                            </button>
                        </form>
                    </div>
                </div>
                <div class="mt-6 text-sm font-medium text-center text-gray-400">
                    <span>Sudah punya akun ? <a href="{{ route('login') }}" class="text-emerald-700">Masuk
                            disini</a></span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
