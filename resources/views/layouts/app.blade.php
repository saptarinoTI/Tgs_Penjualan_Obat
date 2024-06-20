<!doctype html>
<html lang="en">

<!-- Head -->

<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('assets/css/libs.bundle.css') }}" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.bundle.css') }}" />
    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
            /**
          * Reinstate scrolling for non-JS clients
          */
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>

    <!-- Page Title -->
    <title>{{ config('app.name') }}</title>

    <style>
        .dt-length select {
            padding: 5px 25px 5px 15px !important;
            text-align: left !important;
        }

        thead tr th,
        tbody tr td {
            border-bottom: 1px solid #eaeaea !important;
            text-align: left !important;
        }
    </style>

</head>

<body class="">

    <!-- Navbar-->
    <nav class="py-0 bg-white navbar navbar-expand-lg navbar-light border-bottom fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex justify-content-start align-items-center border-end" href="index.html">
                <img src="{{ asset('logo-tra.png') }}" width="110" alt="">
            </a>
            <div class="d-flex justify-content-between align-items-center flex-grow-1 navbar-actions">

                <!-- Menu Toggle-->
                <div class="d-flex align-items-center">
                    <!-- Menu Toggle-->
                    <div
                        class="cursor-pointer d-xl-none menu-toggle me-4 text-primary-hover transition-color disable-child-pointer">
                        <i class="align-middle ri-skip-back-mini-line ri-lg fold" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Close menu"></i>
                        <i class="align-middle ri-skip-forward-mini-line ri-lg unfold" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Open Menu"></i>
                    </div>
                    <!-- / Menu Toggle-->
                </div>
                <!-- /Menu Toggle-->

                <!-- Right Side Widgets-->
                <div class="d-flex align-items-center">

                    <!-- Profile Menu-->
                    <div class="dropdown ms-1">
                        <button class="p-0 btn btn-link text-success position-relative" type="button"
                            id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->is_admin == 1 ? 'Administrator' : 'Pembeli' }}
                        </button>
                        <ul class="dropdown-menu dropdown-md dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li class="">
                                <p class="mb-2 lh-1 fw-semibold text-body">{{ ucwords(auth()->user()->name) }}</p>
                                <p class="text-muted small">{{ ucwords(auth()->user()->no_hp) }}</p>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            </li>
                            <li><a class="dropdown-item text-danger d-flex align-items-center"
                                    href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div> <!-- / Profile Menu-->

                </div>
                <!-- / Notifications & Profile-->
            </div>
        </div>
    </nav>
    <!-- / Navbar-->

    <!-- Page Content -->
    <main id="main">

        <!-- Breadcrumbs-->
        <div class="py-3 mb-5 bg-white border-bottom">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('titleContent', 'Title')</li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('subTitleContent', 'SubTitle')
                        </li>
                    </ol>
                </nav>
            </div>
        </div> <!-- / Breadcrumbs-->

        <!-- Content-->
        <section class="container-fluid">

            <!-- Page Title-->
            <h2 class="mb-2 fs-3 fw-bold">@yield('titleContent', 'Title')</h2>
            <p class="mb-3 text-muted">@yield('descriptionContent', 'Description')</p>
            <!-- / Page Title-->

            @yield('mainContent')

            <!-- Footer -->
            <footer class="ms-auto footer">
                <p class="m-0 small text-muted">Grand Health - {{ date('Y') }}</p>
            </footer>
        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->

    <!-- Page Aside-->
    <aside class="bg-white aside">

        <div class="simplebar-wrapper">
            <div data-pixr-simplebar>
                <div class="pb-6">
                    <!-- Mobile Logo-->
                    <div class="d-flex d-xl-none justify-content-between align-items-center border-bottom aside-header">
                        <a class="m-0 border-0 navbar-brand lh-1 d-flex align-items-center" href="index.html">
                            <img src="{{ asset('logo-tra.png') }}" width="110" alt="">
                        </a>
                        <i
                            class="transition-all cursor-pointer ri-close-circle-line ri-lg close-menu text-muted text-primary-hover me-4"></i>
                    </div>
                    <!-- / Mobile Logo-->

                    <ul class="mb-6 list-unstyled">

                        <!-- Menu Section-->
                        <li class="mt-2 menu-section text-secondary">Dashboard</li>
                        <li class="menu-item"><a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                                <span class="menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M2.5 3A1.5 1.5 0 0 0 1 4.5v4A1.5 1.5 0 0 0 2.5 10h6A1.5 1.5 0 0 0 10 8.5v-4A1.5 1.5 0 0 0 8.5 3h-6Zm11 2A1.5 1.5 0 0 0 12 6.5v7a1.5 1.5 0 0 0 1.5 1.5h4a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 17.5 5h-4Zm-10 7A1.5 1.5 0 0 0 2 13.5v2A1.5 1.5 0 0 0 3.5 17h6a1.5 1.5 0 0 0 1.5-1.5v-2A1.5 1.5 0 0 0 9.5 12h-6Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span class="menu-link">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <!-- / Menu Section-->

                        <!-- Menu Section-->
                        <li class="mt-4 menu-section text-secondary">DATA</li>
                        @if (auth()->user()->is_admin == 1)
                        <li class="menu-item"><a class="d-flex align-items-center" href="{{ route('pembeli.index') }}">
                                <span class="menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path
                                            d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" />
                                    </svg>
                                </span>
                                <span class="menu-link">
                                    Data Pembeli
                                </span>
                            </a>
                        </li>
                        @endif
                        <li class="menu-item"><a class="d-flex align-items-center" href="{{ route('obat.index') }}">
                                <span class="menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM6.75 9.25a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span class="menu-link">
                                    Data Obat
                                </span>
                            </a>
                        </li>
                        <!-- / Menu Section-->

                        <!-- Menu Section-->
                        <li class="mt-4 menu-section text-secondary">TRANSAKSI</li>
                        @if (auth()->user()->is_admin == 0)
                        <li class="menu-item"><a class="d-flex align-items-center"
                                href="{{ route('keranjang.index') }}">
                                <span class="menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path
                                            d="M1 1.75A.75.75 0 0 1 1.75 1h1.628a1.75 1.75 0 0 1 1.734 1.51L5.18 3a65.25 65.25 0 0 1 13.36 1.412.75.75 0 0 1 .58.875 48.645 48.645 0 0 1-1.618 6.2.75.75 0 0 1-.712.513H6a2.503 2.503 0 0 0-2.292 1.5H17.25a.75.75 0 0 1 0 1.5H2.76a.75.75 0 0 1-.748-.807 4.002 4.002 0 0 1 2.716-3.486L3.626 2.716a.25.25 0 0 0-.248-.216H1.75A.75.75 0 0 1 1 1.75ZM6 17.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM15.5 19a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                                    </svg>
                                </span>
                                <span class="menu-link">
                                    Keranjang Obat
                                </span>
                            </a>
                        </li>
                        @endif
                        <li class="menu-item"><a class="d-flex align-items-center"
                                href="{{ route('transaksi.index') }}">
                                <span class="menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M18 5.25a2.25 2.25 0 0 0-2.012-2.238A2.25 2.25 0 0 0 13.75 1h-1.5a2.25 2.25 0 0 0-2.238 2.012c-.875.092-1.6.686-1.884 1.488H11A2.5 2.5 0 0 1 13.5 7v7h2.25A2.25 2.25 0 0 0 18 11.75v-6.5ZM12.25 2.5a.75.75 0 0 0-.75.75v.25h3v-.25a.75.75 0 0 0-.75-.75h-1.5Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M3 6a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H3Zm6.874 4.166a.75.75 0 1 0-1.248-.832l-2.493 3.739-.853-.853a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.154-.114l3-4.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span class="menu-link">
                                    Pembelian Obat
                                </span>
                            </a>
                        </li>
                        @if (auth()->user()->is_admin == 1)
                        <li class="menu-item"><a class="d-flex align-items-center" href="{{ route('ongkir.index') }}">
                                <span class="menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M1 4a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm12 4a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM4 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm13-1a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM1.75 14.5a.75.75 0 0 0 0 1.5c4.417 0 8.693.603 12.749 1.73 1.111.309 2.251-.512 2.251-1.696v-.784a.75.75 0 0 0-1.5 0v.784a.272.272 0 0 1-.35.25A49.043 49.043 0 0 0 1.75 14.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span class="menu-link">
                                    Atur Ongkir
                                </span>
                            </a>
                        </li>
                        @endif
                        <!-- / Menu Section-->

                    </ul>
                </div>
            </div>
        </div>

    </aside> <!-- / Page Aside-->

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
    @yield('scriptContent')

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

    @if (session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    </script>
    @endif
</body>

</html>
