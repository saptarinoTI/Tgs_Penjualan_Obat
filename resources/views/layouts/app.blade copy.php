<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- ========== MAIN CONTENT ========== -->
    <!-- Breadcrumb -->
    <div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden">
        <div class="flex justify-between items-center py-2">
            <!-- Breadcrumb -->
            <img src="{{ asset('logo-tra.png') }}" alt="" class="w-24" />
            <!-- End Breadcrumb -->

            <!-- Sidebar -->
            <button type="button"
                class="py-2 px-3 flex justify-center items-center gap-x-1.5 text-xs rounded-lg text-gray-500 hover:text-gray-600"
                data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Sidebar">
                <i class='bx bx-menu-alt-right bx-sm'></i>
                <span class="sr-only">Sidebar</span>
            </button>
            <!-- End Sidebar -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Sidebar -->
    <div id="application-sidebar"
        class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform w-[260px] hidden fixed inset-y-0 start-0 z-[60] bg-white border-e border-gray-200 lg:block lg:translate-x-0 lg:end-auto lg:bottom-0">
        <div class="px-8 pt-4">
            <!-- Logo -->
            <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80 mb-4"
                href="#" aria-label="Preline">
                <img src="{{ asset('logo-tra.png') }}" alt="" class="w-40" />
            </a>
            <!-- End Logo -->
            <hr />
        </div>

        <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul>
                <li class="text-[11px] font-semibold text-gray-300 tracking-widest mb-2">DASHBOARD</li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 bg-green-100 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100"
                        href="#">
                        <i class='bx bxs-dashboard bx-xs'></i>
                        Dashboard
                    </a>
                </li>

                <li class="text-[11px] font-semibold text-gray-300 tracking-widest mb-2 mt-4">RESOURCE</li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-gray-700 rounded-lg mb-1 hover:bg-gray-100"
                        href="#">
                        <i class='bx bxs-group bx-xs'></i>Data Pembeli
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-gray-700 rounded-lg mb-1 hover:bg-gray-100"
                        href="#">
                        <i class='bx bxs-capsule bx-xs'></i>Data Obat
                    </a>
                </li>

                <li class="text-[11px] font-semibold text-gray-300 tracking-widest mb-2 mt-4">TRANSAKSI</li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-gray-700 rounded-lg mb-1 hover:bg-gray-100"
                        href="#">
                        <i class='bx bxs-cart-download bx-xs'></i>Keranjang Obat
                    </a>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-gray-700 rounded-lg mb-1 hover:bg-gray-100"
                        href="#">
                        <i class='bx bxs-cart-alt bx-xs'></i>Pembelian Obat
                    </a>
                </li>

                <li class="text-[11px] font-semibold text-gray-300 tracking-widest mb-2 mt-4">AKUN</li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-gray-700 rounded-lg mb-1 hover:bg-gray-100"
                        href="#">
                        <i class='bx bxs-cog bx-xs'></i>Rubah Password
                    </a>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-white rounded-lg mb-1 bg-red-700"
                        href="#">
                        <i class='bx bxs-log-out bx-xs'></i>Logout
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- End Sidebar -->

    <div class="w-full px-4 sm:px-6 md:px-8 lg:ps-72">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            @yield('mainContent')
        </div>
    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.tailwindcss.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        new DataTable('#example');
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Sukses!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "Keluar"
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "Error!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "Keluar"
            })
        </script>
    @endif

    @yield('scriptContent')
</body>

</html>
