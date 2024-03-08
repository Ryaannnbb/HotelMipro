<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<!-- Mirrored from prium.github.io/phoenix/v1.13.0/apps/e-commerce/landing/homepage.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 12:13:49 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Small Hotel</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/storage/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/storage/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/storage/logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/storage/logo.png') }}">
    <link rel="manifest" href="../../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../../../vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../../../vendors/simplebar/simplebar.min.js"></script>
    <script src="../../../assets/js/config.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="../../../../../../unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="{{ asset('assets/css/theme-rtl.min.css') }}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="../../../assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="../../../assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="../../../assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
    <link href="../../../vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
</head>

<body>
    <section class="py-0">

        <div class="container-small">
            <div class="ecommerce-topbar">
                <nav class="navbar navbar-expand-lg navbar-light px-0">
                    <div class="row gx-0 gy-2 w-100 flex-between-center">
                        <div class="col-auto"><a class="text-decoration-none" href="#">
                                <div class="d-flex align-items-center"><img
                                        src="{{ asset('assets/img/brands/small.png') }}" alt="phoenix" width="40" />
                                    <p class="logo-text ms-2">Small Hotel</p>
                                </div>
                            </a></div>
                        <div class="col-auto order-md-1">
                            <ul class="navbar-nav navbar-nav-icons flex-row me-n2">
                                <li class="nav-item d-flex align-items-center">
                                    <div class="theme-control-toggle fa-icon-wait px-2"><input
                                            class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                                            data-theme-control="phoenixTheme" value="dark"
                                            id="themeControlToggle" /><label
                                            class="mb-0 theme-control-toggle-label theme-control-toggle-light"
                                            for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Switch theme"><span class="icon"
                                                data-feather="moon"></span></label><label
                                            class="mb-0 theme-control-toggle-label theme-control-toggle-dark"
                                            for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Switch theme"><span class="icon" data-feather="sun"></span></label>
                                    </div>
                                </li>
                                {{-- <li class="nav-item"><a
                                        class="nav-link px-2 @if ($totalpesanan > 0) icon-indicator icon-indicator-primary @endif"
                                        href="{{ route('keranjang') }}" role="button"><span class="text-700"
                                            data-feather="shopping-cart" style="height:20px;width:20px;"></span><span
                                            class="icon-indicator-number">
                                            @if ($totalpesanan > 0)
                                                <span>{{ $totalpesanan }}</span>
                                            @endif
                                        </span></a></li> --}}
                                {{-- <li class="nav-item dropdown"><a
                    class="nav-link px-2 icon-indicator icon-indicator-sm icon-indicator-danger"
                    id="navbarTopDropdownNotification" href="#" role="button" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="text-700"
                      data-feather="bell" style="height:20px;width:20px;"></span></a>
                  <div
                    class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret mt-2"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                      <div class="card-header p-2">
                        <div class="d-flex justify-content-between">
                          <h5 class="text-black mb-0">Notificatons</h5><button
                            class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="scrollbar-overlay" style="height: 27rem;">
                          <div class="border-300">
                            <div
                              class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                              <div class="d-flex align-items-center justify-content-between position-relative">
                                <div class="d-flex">
                                  <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                      src="../../../assets/img/team/40x40/30.webp" alt="" /></div>
                                  <div class="flex-1 me-sm-3">
                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                        class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span
                                        class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                                    <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span
                                        class="fw-bold">10:41 AM </span>August 7,2021</p>
                                  </div>
                                </div>
                                <div class="font-sans-serif d-none d-sm-block"><button
                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                    aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span
                                      class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                  <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                      href="#!">Mark as unread</a></div>
                                </div>
                              </div>
                            </div>
                            <div
                              class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                              <div class="d-flex align-items-center justify-content-between position-relative">
                                <div class="d-flex">
                                  <div class="avatar avatar-m status-online me-3">
                                    <div class="avatar-name rounded-circle"><span>J</span></div>
                                  </div>
                                  <div class="flex-1 me-sm-3">
                                    <h4 class="fs--1 text-black">Jane Foster</h4>
                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                        class='me-1 fs--2'>📅</span>Created an event.<span
                                        class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                    <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span
                                        class="fw-bold">10:20 AM </span>August 7,2021</p>
                                  </div>
                                </div>
                                <div class="font-sans-serif d-none d-sm-block"><button
                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                    aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span
                                      class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                  <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                      href="#!">Mark as unread</a></div>
                                </div>
                              </div>
                            </div>
                            <div
                              class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                              <div class="d-flex align-items-center justify-content-between position-relative">
                                <div class="d-flex">
                                  <div class="avatar avatar-m status-online me-3"><img
                                      class="rounded-circle avatar-placeholder"
                                      src="../../../assets/img/team/40x40/avatar.webp" alt="" /></div>
                                  <div class="flex-1 me-sm-3">
                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                        class='me-1 fs--2'>👍</span>Liked your comment.<span
                                        class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                                    <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span
                                        class="fw-bold">9:30 AM </span>August 7,2021</p>
                                  </div>
                                </div>
                                <div class="font-sans-serif d-none d-sm-block"><button
                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                    aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span
                                      class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                  <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                      href="#!">Mark as unread</a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="border-300">
                            <div
                              class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                              <div class="d-flex align-items-center justify-content-between position-relative">
                                <div class="d-flex">
                                  <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                      src="../../../assets/img/team/40x40/57.webp" alt="" /></div>
                                  <div class="flex-1 me-sm-3">
                                    <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                        class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span
                                        class="ms-2 text-400 fw-bold fs--2"></span></p>
                                    <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span
                                        class="fw-bold">9:11 AM </span>August 7,2021</p>
                                  </div>
                                </div>
                                <div class="font-sans-serif d-none d-sm-block"><button
                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                    aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span
                                      class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                  <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                      href="#!">Mark as unread</a></div>
                                </div>
                              </div>
                            </div>
                            <div
                              class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                              <div class="d-flex align-items-center justify-content-between position-relative">
                                <div class="d-flex">
                                  <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                      src="../../../assets/img/team/40x40/59.webp" alt="" /></div>
                                  <div class="flex-1 me-sm-3">
                                    <h4 class="fs--1 text-black">Herman Carter</h4>
                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                        class='me-1 fs--2'>👤</span>Tagged you in a comment.<span
                                        class="ms-2 text-400 fw-bold fs--2"></span></p>
                                    <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span
                                        class="fw-bold">10:58 PM </span>August 7,2021</p>
                                  </div>
                                </div>
                                <div class="font-sans-serif d-none d-sm-block"><button
                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                    aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span
                                      class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                  <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                      href="#!">Mark as unread</a></div>
                                </div>
                              </div>
                            </div>
                            <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                              <div class="d-flex align-items-center justify-content-between position-relative">
                                <div class="d-flex">
                                  <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                      src="../../../assets/img/team/40x40/58.webp" alt="" /></div>
                                  <div class="flex-1 me-sm-3">
                                    <h4 class="fs--1 text-black">Benjamin Button</h4>
                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                        class='me-1 fs--2'>👍</span>Liked your comment.<span
                                        class="ms-2 text-400 fw-bold fs--2"></span></p>
                                    <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span
                                        class="fw-bold">10:18 AM </span>August 7,2021</p>
                                  </div>
                                </div>
                                <div class="font-sans-serif d-none d-sm-block"><button
                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                    aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span
                                      class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                  <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item"
                                      href="#!">Mark as unread</a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer p-0 border-top border-0">
                        <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder"
                            href="../../../pages/notifications.html">Notification history</a></div>
                      </div>
                    </div>
                  </div>
                </li> --}}
                                <li class="nav-item dropdown"><a class="nav-link px-2" id="navbarDropdownUser"
                                        href="#" role="button" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                                            class="text-700" data-feather="user"
                                            style="height:20px;width:20px;"></span></a>
                                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300 mt-2"
                                        aria-labelledby="navbarDropdownUser">
                                        <div class="card position-relative border-0">
                                            <div class="card-body p-0">
                                                <div class="text-center pt-4 pb-3">
                                                    <div class="avatar avatar-xl ">
                                                        @if ($user->profile)
                                                            <img class="rounded-circle" id="avatarPreview"
                                                                src="{{ asset('storage/' . $user->profile) }}"
                                                                alt="" />
                                                        @else
                                                            <!-- Tampilkan foto default jika tidak ada foto profil -->
                                                            <img class="rounded-circle" id="avatarPreview"
                                                                src="{{ asset('assets/storage/apple.jpg') }}"
                                                                alt="Default Avatar" />
                                                        @endif
                                                    </div>
                                                    <h6 class="mt-2 text-black">{{ Auth::user()->name }}</h6>
                                                </div>

                                            </div>
                                            <div class="overflow-auto scrollbar" style="height: 2rem;">
                                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                                <li class="nav-item"><a class="nav-link px-3"
                                                        href="{{ route('profil') }}"> <span class="me-2 text-900"
                                                            data-feather="user" style="margin-right: 100px;"></span><span>Profile</span></a></li>
                                            </ul>
                                            </div>

                                            <hr>
                                            <div class="px-3"> <a
                                                    class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                                    href="/logout"><span class="me-2" data-feather="log-out">
                                                    </span>Sign out</a></div>
                                            <div class="my-2 text-center fw-bold fs--2 text-600"><a
                                                    class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a
                                                    class="text-600 mx-1" href="#!">Terms</a>&bull;<a
                                                    class="text-600 ms-1" href="#!">Cookies</a></div>
                                        </div>
                                    </div>
                        </div>
                        </li>
                        </ul>
                    </div>
                    {{-- <div class="col-12 col-md-6">
              <div class="search-box ecommerce-search-box w-100">
                <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                    class="form-control search-input search form-control-sm" type="search" placeholder="Search"
                    aria-label="Search" />
                  <span class="fas fa-search search-box-icon"></span>
                </form>
              </div>
            </div> --}}
            </div>
            </nav>
        </div>
        </div><!-- end of .container-->
    </section>
    <nav class="ecommerce-navbar navbar-expand navbar-light bg-white justify-content-center h-3"
        style="height: 35px; position: relative; z-index: 100;">
        <div class="container-small d-flex flex-between-center pt-2 text-center" data-navbar="data-navbar">
            <ul class="navbar-nav mx-auto justify-content-end align-items-center">
                <li class="nav-item" data-nav-item="data-nav-item"><a
                        class="nav-link {{ request()->routeIs('homeuser') ? 'active' : '' }}"
                        href="{{ route('homeuser') }}">Home</a></li>
                <li class="nav-item" data-nav-item="data-nav-item"><a
                        class="nav-link {{ request()->routeIs('#') ? 'active' : '' }}"
                        href="{{ route('usermenu') }}">Rooms</a></li>
                {{-- <li class="nav-item" data-nav-item="data-nav-item"><a
                        class="nav-link {{ request()->routeIs('wishlist') ? 'active' : '' }}""
                        href="{{ route('wishlist') }}">Wishlist</a></li>
                <li class="nav-item" data-nav-item="data-nav-item"><a
                        class="nav-link {{ request()->routeIs('checkout') ? 'active' : '' }}""
                        href="{{ route('checkout') }}">Checkout</a>
                </li> --}}
            </ul>
        </div>
    </nav>


    <main class="main" id="top">
        @yield('content')
    </main>
    <div class="ecommerce-homepage pt-5">
        <section class="bg-100 dark__bg-1100 py-9">
            <div class="container-small">
                <div class="row justify-content-between gy-4">
                    <div class="col-12 col-lg-4">
                        <div class="d-flex align-items-center mb-3"><img src="{{ asset('assets/img/hotel10.png') }}"
                                alt="phoenix" width="27" />
                            <p class="logo-text ms-2">Small</p>
                        </div>
                        <p class="text-700 mb-1 fw-semi-bold lh-sm fs--1">
                            Small Hotel is a leading hospitality provider in Indonesia, offering a variety of modern
                            facilities and high-quality services. Guests can explore a range of innovative
                            accommodations and luxurious amenities. Small Hotel is dedicated to ensuring guest
                            satisfaction by providing personalized experiences and the best customer support from
                            experienced professionals.</p>
                    </div>
                    <div class="col-6 col-md-auto">
                        <h5 class="fw-bolder mb-3">About Small Hotel</h5>
                        <div class="d-flex flex-column"><a class="text-700 fw-semi-bold fs--1 mb-1"
                                href="#!">Career </a><a class="text-700 fw-semi-bold fs--1 mb-1"
                                href="#!">Personal policy</a><a class="text-700 fw-semi-bold fs--1 mb-1"
                                href="#!">Terms & conditions</a><a class="text-700 fw-semi-bold fs--1 mb-1"></a></div>
                    </div>
                    <div class="col-6 col-md-auto">
                        <h5 class="fw-bolder mb-3">Stay Connected</h5>
                        <div class="d-flex flex-column"><a class="text-700 fw-semi-bold fs--1 mb-1"
                                href="#!">Jalan Ijen
                                No.
                                123 Kota Tuban, Indonesia</a><a class="mb-1 fw-semi-bold fs--1 d-flex"
                                href="#!"><span class="fas fa-phone text-primary me-2 fs-0"></span><span
                                    class="text-800">+62
                                    889-8908-7546</span></a><a class="mb-1 fw-semi-bold fs--1 d-flex"
                                href="#!"><span class="fas fa-envelope text-info me-2 fs-0"></span><span
                                    class="text-800">Email :
                                    info@smallhotel.com</span></a></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="../../../vendors/popper/popper.min.js"></script>
    <script src="../../../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../../../vendors/anchorjs/anchor.min.js"></script>
    <script src="../../../vendors/is/is.min.js"></script>
    <script src="../../../vendors/fontawesome/all.min.js"></script>
    <script src="../../../vendors/lodash/lodash.min.js"></script>
    <script src="../../../../../../polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
    <script src="../../../vendors/list.js/list.min.js"></script>
    <script src="../../../vendors/feather-icons/feather.min.js"></script>
    <script src="../../../vendors/dayjs/dayjs.min.js"></script>
    <script src="../../../assets/js/phoenix.js"></script>
    <script src="../../../vendors/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            // Temukan semua tombol wishlist menggunakan class selector
            var wishlistButtons = document.querySelectorAll('.btn-wish');

            // Ambil daftar ID produk dari localStorage (jika ada)
            var wishlistItems;
            // console.log(wishlistItems);

            $.ajax({
                type: 'POST',
                url: '/wishlist/products',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Tambahkan logika atau respons setelah berhasil ditambahkan ke wishlist
                    // wishlistItems = JSON.parse(response);
                    wishlistItems = response;
                    console.log(wishlistItems);
                    wishlistButtons.forEach(function(wishlistButton) {
                        var productId = wishlistButton.getAttribute('data-product-id');

                        // Tambahkan pesan konsol untuk memeriksa nilai productId
                        console.log('Product ID:', productId);

                        console.log((wishlistItems.includes(productId)));
                        if (wishlistItems.includes(productId)) {
                            wishlistButton.classList.add('active');
                        }

                        wishlistButton.addEventListener('click', function() {
                            // Dapatkan ID produk dari data attribute
                            var productId = wishlistButton.getAttribute(
                                'data-product-id');

                            // Tambahkan pesan konsol untuk memeriksa nilai productId setelah tombol diklik
                            console.log('Clicked Product ID:', productId);

                            // Toggle class 'active' pada tombol wishlist
                            wishlistButton.classList.toggle('active');

                            // Tambahkan atau hapus ID produk dari wishlistItems
                            if (wishlistItems.includes(productId)) {
                                // Kirim permintaan AJAX untuk menghapus produk ke wishlist
                                $.ajax({
                                    type: 'DELETE',
                                    url: '/wishlist/delete/product/' +
                                        productId,
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        // Tambahkan logika atau respons setelah berhasil ditambahkan ke wishlist
                                        if (response.remove) remove(
                                            'Product removed from wishlist successfully'
                                        );
                                        console.log(
                                            'Product removed from wishlist successfully'
                                        );
                                    },
                                    error: function(error) {
                                        console.error(
                                            'Failed to add product to wishlist'
                                        );
                                    }
                                });
                                wishlistItems = wishlistItems.filter(item => item !==
                                    productId);
                            } else {
                                // Kirim permintaan AJAX untuk menambahkan produk ke wishlist
                                $.ajax({
                                    type: 'POST',
                                    url: '/wishlist/add/' + productId,
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        // Tambahkan logika atau respons setelah berhasil ditambahkan ke wishlist
                                        if (response.success) remove(
                                            'Product added to wishlist successfully'
                                        );
                                        console.log(
                                            'Product added to wishlist successfully'
                                        );
                                    },
                                    error: function(error) {
                                        console.error(
                                            'Failed to add product to wishlist'
                                        );
                                    }
                                });
                                wishlistItems.push(productId);
                            }

                            // Simpan wishlistItems ke localStorage
                            localStorage.setItem('wishlist', JSON.stringify(
                                wishlistItems));
                        });
                    });
                },
                error: function(error) {
                    console.error('Failed to add product to wishlist');
                }
            });

            // Tandai tombol wishlist yang sudah ada di wishlistItems
        });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-cS5Z0YPGE0GolGoVr6lM5pwpWz5jkp/k1yMWql4crVZaj/bdJPkDff53IJYwjdQr5I6BTgGLW5o5lG7icoy2QQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>

</html>
