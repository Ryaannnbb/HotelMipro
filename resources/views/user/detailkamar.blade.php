@extends('layout_user.app')
@php
    use Carbon\Carbon;
@endphp
@section('content')
    <style>
        .rating {
            display: inline-block;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 24px;
            color: #ddd;
            cursor: pointer;
        }

        .rating label:hover,
        .rating label:hover~label,
        .rating input:checked~label {
            color: #ffcc00;
        }

        .nav-tabs .nav-link {
            margin-right: 20px;
            /* Atur jarak kanan antara tab */
            margin-bottom: 10px;
            /* Atur jarak bawah antara tab */
        }
    </style>
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../../../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../../../vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../../../vendors/simplebar/simplebar.min.js"></script>
    <script src="../../../assets/js/config.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="../../../vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../../../vendors/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="../../../vendors/glightbox/glightbox.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="../../../vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../../../../unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="../../../assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="../../../assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="../../../assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="../../../assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
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
    </head>

    <body>
        <!-- ===============================================-->
        <!--    Main Content-->
        <!-- ===============================================-->
        <main class="main" id="top">

            <!-- ============================================-->
            <!-- <section> begin ============================-->
            <section class="py-0">
                <div class="container-small">
                    <div class="ecommerce-topbar">
                        <nav class="navbar navbar-expand-lg navbar-light px-0">
                            {{-- <div class="row gx-0 gy-2 w-100 flex-between-center">
                <div class="col-auto"><a class="text-decoration-none" href="../../../index.html">
                    <div class="d-flex align-items-center"><img src="../../../assets/img/icons/logo.png" alt="phoenix" width="27" />
                      <p class="logo-text ms-2">phoenix</p>
                    </div>
                  </a></div>
                <div class="col-auto order-md-1">
                  <ul class="navbar-nav navbar-nav-icons flex-row me-n2">
                    <li class="nav-item d-flex align-items-center">
                      <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="moon"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label></div>
                    </li>
                    <li class="nav-item"><a class="nav-link px-2 icon-indicator icon-indicator-primary" href="cart.html" role="button"><span class="text-700" data-feather="shopping-cart" style="height:20px;width:20px;"></span><span class="icon-indicator-number">3</span></a></li>
                    <li class="nav-item dropdown"><a class="nav-link px-2 icon-indicator icon-indicator-sm icon-indicator-danger" id="navbarTopDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="text-700" data-feather="bell" style="height:20px;width:20px;"></span></a>
                      <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret mt-2" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                        <div class="card position-relative border-0">
                          <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                              <h5 class="text-black mb-0">Notificatons</h5><button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                            </div>
                          </div>
                          <div class="card-body p-0">
                            <div class="scrollbar-overlay" style="height: 27rem;">
                              <div class="border-300">
                                <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                                  <div class="d-flex align-items-center justify-content-between position-relative">
                                    <div class="d-flex">
                                      <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../../assets/img/team/40x40/30.webp" alt="" /></div>
                                      <div class="flex-1 me-sm-3">
                                        <h4 class="fs--1 text-black">Jessie Samson</h4>
                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                                        <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM </span>August 7,2021</p>
                                      </div>
                                    </div>
                                    <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                      <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                  <div class="d-flex align-items-center justify-content-between position-relative">
                                    <div class="d-flex">
                                      <div class="avatar avatar-m status-online me-3">
                                        <div class="avatar-name rounded-circle"><span>J</span></div>
                                      </div>
                                      <div class="flex-1 me-sm-3">
                                        <h4 class="fs--1 text-black">Jane Foster</h4>
                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>📅</span>Created an event.<span class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                        <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:20 AM </span>August 7,2021</p>
                                      </div>
                                    </div>
                                    <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                      <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                  <div class="d-flex align-items-center justify-content-between position-relative">
                                    <div class="d-flex">
                                      <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder" src="../../../assets/img/team/40x40/avatar.webp" alt="" /></div>
                                      <div class="flex-1 me-sm-3">
                                        <h4 class="fs--1 text-black">Jessie Samson</h4>
                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                                        <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:30 AM </span>August 7,2021</p>
                                      </div>
                                    </div>
                                    <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                      <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="border-300">
                                <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                  <div class="d-flex align-items-center justify-content-between position-relative">
                                    <div class="d-flex">
                                      <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../../assets/img/team/40x40/57.webp" alt="" /></div>
                                      <div class="flex-1 me-sm-3">
                                        <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                        <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:11 AM </span>August 7,2021</p>
                                      </div>
                                    </div>
                                    <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                      <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                  <div class="d-flex align-items-center justify-content-between position-relative">
                                    <div class="d-flex">
                                      <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../../assets/img/team/40x40/59.webp" alt="" /></div>
                                      <div class="flex-1 me-sm-3">
                                        <h4 class="fs--1 text-black">Herman Carter</h4>
                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👤</span>Tagged you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                        <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:58 PM </span>August 7,2021</p>
                                      </div>
                                    </div>
                                    <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                      <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                                  <div class="d-flex align-items-center justify-content-between position-relative">
                                    <div class="d-flex">
                                      <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../../assets/img/team/40x40/58.webp" alt="" /></div>
                                      <div class="flex-1 me-sm-3">
                                        <h4 class="fs--1 text-black">Benjamin Button</h4>
                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                        <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:18 AM </span>August 7,2021</p>
                                      </div>
                                    </div>
                                    <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                      <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer p-0 border-top border-0">
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="../../../pages/notifications.html">Notification history</a></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link px-2" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="text-700" data-feather="user" style="height:20px;width:20px;"></span></a>
                      <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300 mt-2" aria-labelledby="navbarDropdownUser">
                        <div class="card position-relative border-0">
                          <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                              <div class="avatar avatar-xl ">
                                <img class="rounded-circle " src="../../../assets/img/team/72x72/57.webp" alt="" />
                              </div>
                              <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                            </div>
                            <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                          </div>
                          <div class="overflow-auto scrollbar" style="height: 10rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                              <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                              <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                              <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                              <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                              <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                              <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                            </ul>
                          </div>
                          <div class="card-footer p-0 border-top">
                            <ul class="nav d-flex flex-column my-3">
                              <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
                            </ul>
                            <hr />
                            <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="col-12 col-md-6">
                  <div class="search-box ecommerce-search-box w-100">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search" />
                      <span class="fas fa-search search-box-icon"></span>
                    </form>
                  </div>
                </div>
              </div> --}}
                        </nav>
                    </div>
                </div><!-- end of .container-->
            </section><!-- <section> close ============================-->
            <!-- ============================================-->

            {{-- <nav class="ecommerce-navbar navbar-expand navbar-light bg-white justify-content-between">
        <div class="container-small d-flex flex-between-center" data-navbar="data-navbar">
          <div class="dropdown"><button class="btn text-900 ps-0 pe-5 text-nowrap dropdown-toggle dropdown-caret-none" data-category-btn="data-category-btn" data-bs-toggle="dropdown"><span class="fas fa-bars me-2"></span>Category</button>
            <div class="dropdown-menu border py-0 category-dropdown-menu">
              <div class="card border-0 scrollbar" style="max-height: 657px;">
                <div class="card-body p-6 pb-3">
                  <div class="row gx-7 gy-5 mb-5">
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="d-flex align-items-center mb-3"><span class="text-primary me-2" data-feather="pocket" style="stroke-width:3;"></span>
                        <h6 class="text-1000 mb-0 text-nowrap">Collectibles &amp; Art</h6>
                      </div>
                      <div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Collectibles</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Antiques</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Sports memorabilia </a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Art</a></div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="d-flex align-items-center mb-3"><span class="text-primary me-2" data-feather="home" style="stroke-width:3;"></span>
                        <h6 class="text-1000 mb-0 text-nowrap">Home &amp; Gardan</h6>
                      </div>
                      <div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Yard, Garden &amp; Outdoor</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Crafts</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Home Improvement</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Pet Supplies</a></div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="d-flex align-items-center mb-3"><span class="text-primary me-2" data-feather="globe" style="stroke-width:3;"></span>
                        <h6 class="text-1000 mb-0 text-nowrap">Sporting Goods</h6>
                      </div>
                      <div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Outdoor Sports</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Team Sports</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Exercise &amp; Fitness</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Golf</a></div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="d-flex align-items-center mb-3"><span class="text-primary me-2" data-feather="monitor" style="stroke-width:3;"></span>
                        <h6 class="text-1000 mb-0 text-nowrap">Electronics</h6>
                      </div>
                      <div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Computers &amp; Tablets</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Camera &amp; Photo</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">TV, Audio &amp; Surveillance</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Cell Ohone &amp; Accessories</a></div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="d-flex align-items-center mb-3"><span class="text-primary me-2" data-feather="truck" style="stroke-width:3;"></span>
                        <h6 class="text-1000 mb-0 text-nowrap">Auto Parts &amp; Accessories</h6>
                      </div>
                      <div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">GPS &amp; Security Devices</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Rader &amp; Laser Detectors</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Care &amp; Detailing</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Scooter Parts &amp; Accessories</a></div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="d-flex align-items-center mb-3"><span class="text-primary me-2" data-feather="codesandbox" style="stroke-width:3;"></span>
                        <h6 class="text-1000 mb-0 text-nowrap">Toys &amp; Hobbies</h6>
                      </div>
                      <div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Radio Control</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Kids Toys</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Action Figures</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Dolls &amp; Bears</a></div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="d-flex align-items-center mb-3"><span class="text-primary me-2" data-feather="watch" style="stroke-width:3;"></span>
                        <h6 class="text-1000 mb-0 text-nowrap">Fashion</h6>
                      </div>
                      <div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Women</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Men</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Jewelry &amp; Watches</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Shoes</a></div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="d-flex align-items-center mb-3"><span class="text-primary me-2" data-feather="music" style="stroke-width:3;"></span>
                        <h6 class="text-1000 mb-0 text-nowrap">Musical Instruments &amp; Gear</h6>
                      </div>
                      <div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Guitar</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Pro Audio Equipment</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">String</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Stage Lighting &amp; Effects</a></div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                      <div class="d-flex align-items-center mb-3"><span class="text-primary me-2" data-feather="grid" style="stroke-width:3;"></span>
                        <h6 class="text-1000 mb-0 text-nowrap">Other Categories</h6>
                      </div>
                      <div class="ms-n2"><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Video Games &amp; Consoles</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Health &amp; Beauty</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Baby</a><a class="text-black d-block mb-1 text-decoration-none hover-bg-100 px-2 py-1 rounded-2" href="#!">Business &amp; Industrial</a></div>
                    </div>
                  </div>
                  <div class="text-center border-top pt-3"><a class="fw-bold" href="#!">See all Categories<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a></div>
                </div>
              </div>
            </div>
          </div>
          <ul class="navbar-nav justify-content-end align-items-center">
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link ps-0" href="homepage.html">Home</a></li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link" href="favourite-stores.html">My Favorites Stores</a></li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link" href="products-filter.html">Products</a></li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link" href="wishlist.html">Wishlist</a></li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link" href="shipping-info.html">Shipping Info</a></li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link" href="../admin/add-product.html">Be a vendor</a></li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link" href="order-tracking.html">Track order</a></li>
            <li class="nav-item" data-nav-item="data-nav-item"><a class="nav-link pe-0" href="checkout.html">Checkout</a></li>
            <li class="nav-item dropdown" data-nav-item="data-nav-item" data-more-item="data-more-item"><a class="nav-link dropdown-toggle dropdown-caret-none fw-bold pe-0" href="javascript: void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-boundary="window" data-bs-reference="parent"> More<span class="fas fa-angle-down ms-2"></span></a>
              <div class="dropdown-menu dropdown-menu-end category-list" aria-labelledby="navbarDropdown" data-category-list="data-category-list"></div>
            </li>
          </ul>
        </div>
      </nav> --}}
            @foreach ($kamars as $detail)
                <div class="pt-5 pb-9">

                    <!-- ============================================-->
                    <!-- <section> begin ============================-->
                    <section class="py-0">
                        <div class="container-small">
                            {{-- <nav class="mb-3" aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Fashion</a></li>
                <li class="breadcrumb-item"><a href="#">Womens fashion</a></li>
                <li class="breadcrumb-item"><a href="#">Footwear</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hills</li>
              </ol>
            </nav> --}}
                            <div class="row g-5 mb-5 mb-lg-8" data-product-details="data-product-details">
                                <div class="col-12 col-lg-6">
                                    <div class="row g-3 mb-3">
                                        <div class="col-12 col-md-2 col-lg-12 col-xl-2">
                                            <div class="swiper-products-thumb swiper swiper-container theme-slider overflow-visible"
                                                id="swiper-products-thumb">
                                                {{-- <div class="swiper-slide"><img src="{{ asset('assets/img/brand2/asus-rog.png') }}" alt="Gambar 1"></div>
                        <div class="swiper-slide"><img src="{{ asset('assets/img/brand2/asus-rog.png') }}" alt="Gambar 2"></div>
                        <div class="swiper-slide"><img src="{{ asset('assets/img/brand2/asus-rog.png') }}" alt="Gambar 3"></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-10 col-lg-12 col-xl-10">
                                            <div class="d-flex align-items-center border rounded-3 text-center p-5 h-fit">
                                                <div class="swiper swiper-container theme-slider"
                                                    data-thumb-target="swiper-products-thumb"
                                                    data-products-swiper='{"slidesPerView":1,"spaceBetween":16,"thumbsEl":".swiper-products-thumb"}'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex"> --}}
                                    <a href="{{ route('pesanan', ['id' => $detail->id]) }}"
                                        class="btn btn-lg btn-warning rounded-pill  fs--1 fs-sm-0" style="margin-top: -120px; width: 500px; margin-left: 80px">
                                        <span class="fas fa-check-circle me-2"></span>Pesan Sekarang
                                    </a>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <div>
                                            <div class="d-flex flex-wrap align-items-center">
                                                <div class="me-2">
                                                    @if ($totalUlasan > 0)
                                                        @php
                                                            $rating = $totalRating;
                                                        @endphp
                                                        @if ($rating - floor($rating) < 0.5)
                                                            @for ($i = 0; $i < floor($rating); $i++)
                                                                <span class="fa fa-star text-warning"></span>
                                                            @endfor
                                                        @else
                                                            @for ($i = 0; $i < ceil($rating); $i++)
                                                                <span class="fa fa-star text-warning"></span>
                                                            @endfor
                                                        @endif
                                                    @else
                                                        <!-- Jika tidak ada ulasan, tampilkan bintang abu-abu -->
                                                        <span class="fa fa-star text-secondary"></span>
                                                        <span class="fa fa-star text-secondary"></span>
                                                        <span class="fa fa-star text-secondary"></span>
                                                        <span class="fa fa-star text-secondary"></span>
                                                        <span class="fa fa-star text-secondary"></span>
                                                    @endif
                                                    <span class="text-primary fw-semi-bold mb-2">
                                                        @if ($totalUlasan > 0)
                                                            ({{ $totalUlasan }} orang memberi ulasan)
                                                        @else
                                                            Tidak Ada Ulasan
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <h3 class="mb-3 lh-sm">{{ $detail->nama_kamar }}</h3>
                                            {{-- <div class="d-flex flex-wrap align-items-start mb-3"><span class="badge bg-success fs--1 rounded-pill me-2 fw-semi-bold"># Best seller</span><a class="fw-semi-bold" href="#!">in Phoenix sell analytics 2021</a></div> --}}
                                            {{-- @foreach ($kamars as $detail) --}}
                                            <div class="d-flex flex-wrap align-items-center">
                                                @php
                                                    $diskon = null; // Menetapkan nilai awal $diskon
                                                @endphp
                                                @php
                                                    $harga_awal = $detail->harga;
                                                    $diskon_tersedia = false;
                                                    $harga_setelah_diskon = $harga_awal; // Inisialisasi harga setelah diskon sama dengan harga awal

                                                    foreach ($diskons as $diskon) {
                                                        if ($diskon->kategori_id === $detail->kategori_id) {
                                                            if ($diskon->jenis == 'percentage') {
                                                                // Hitung diskon berdasarkan persentase diskon
                                                                $diskon->diskon =
                                                                    ($harga_awal * $diskon->potongan_harga) / 100;
                                                                // Hitung harga setelah diskon
                                                                $harga_setelah_diskon = $harga_awal - $diskon->diskon;
                                                            } else {
                                                                // Jika jenis diskon bukan persentase, maka potongan harga adalah nominal potongan yang diberikan
                                                                $harga_setelah_diskon =
                                                                    $harga_awal - $diskon->potongan_harga;
                                                            }
                                                            // Jika menemukan diskon yang sesuai, set diskon_tersedia ke true
                                                            $diskon_tersedia = true;
                                                            // Keluar dari loop karena sudah menemukan diskon yang sesuai
                                                            break;
                                                        }
                                                    }
                                                @endphp

                                                <div class="d-flex flex-wrap align-items-center">
                                                    <h1 style="font-size: 21px;">
                                                        @if ($diskon_tersedia && \Carbon\Carbon::now() <= \Carbon\Carbon::parse($diskon->akhir_berlaku))
                                                            Rp.{{ number_format($harga_setelah_diskon, 0, ',', '.') }}
                                                            <span
                                                                class="text-body-quaternary text-decoration-line-through fs-0 mb-0 me-3"
                                                                style="opacity: 0.2;">
                                                                Rp.{{ number_format($harga_awal, 0, ',', '.') }}
                                                            </span>
                                                        @else
                                                            Rp.{{ number_format($harga_awal, 0, ',', '.') }}
                                                        @endif
                                                        @if ($diskon && property_exists($diskon, 'potongan_harga') && $diskon->kategori_id == $kamars->first()->kategori_id)
                                                            @if ($diskon->potongan_harga > 100)
                                                                {{-- Rp.{{ number_format($diskon->potongan_harga, 0, ',', '.') }} --}}
                                                            @else
                                                                <span class="text-warning">
                                                                    {{ $diskon->potongan_harga }}%
                                                                </span>
                                                            @endif
                                                        @endif
                                                    </h1>
                                                </div>
                                                {{-- <p class="text-success font-size: 24px;">{{ ucfirst($detail->status) }}</p>
                    <p class="mb-2 text-body-secondary"><strong class="text-body-highlight"
                            style="font-size: 14px;">{{ $detail->deskripsi }}</strong></p> --}}

                                                {{-- @endforeach --}}
                                                {{-- <p class="text-success font-size: 24px;">{{ $detail->status }}</p>
                <p class="mb-2 text-body-secondary"><strong class="text-body-highlight"
                        style="font-size: 14px;">{{ $detail->deskripsi }}</strong></p>
                        <p class="text-danger-dark fw-bold mb-5 mb-lg-0">
                            Discount expires
                            {{ \Carbon\Carbon::parse($diskon->akhir_berlaku)->diffForHumans(\Carbon\Carbon::now(), true) }}
                        </p>                                                     --}}
                                            </div>
                                            <p class="text-success fw-semi-bold fs-1 mb-2">{{ ucfirst($detail->status) }}
                                            </p>
                                            <p class="mb-2 text-800"><strong
                                                    class="text-1000">{{ $detail->deskripsi }}</strong></p>
                                            <p class="text-danger fw-bold mb-5 mb-lg-0">
                                                @if ($diskon_tersedia && \Carbon\Carbon::now() <= \Carbon\Carbon::parse($diskon->akhir_berlaku))
                                                    Diskon Berakhir
                                                    {{ \Carbon\Carbon::parse($diskon->akhir_berlaku)->diffForHumans(\Carbon\Carbon::now(), true) }}
                                                @endif
                                            </p>
                                        </div>
                                        <div>

                                            <div class="mb-3">
                                                {{-- <p class="fw-semi-bold mb-2 text-900">Color : <span class="text-1100" data-product-color="data-product-color">Blue</span></p> --}}
                                                <div class="d-flex product-color-variants"
                                                    data-product-color-variants="data-product-color-variants">
                                                    <div class="rounded-1 border me-2 active" data-variant="Blue"
                                                        data-products-images='["{{ asset('storage/kamar/' . $detail->path_kamar) }}","{{ asset('storage/kamar/' . $detail->path_kamar1) }}","{{ asset('storage/kamar/' . $detail->path_kamar2) }}"]'>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row g-3 g-sm-5 align-items-end">
                      <div class="col-12 col-sm-auto">
                        <p class="fw-semi-bold mb-2 text-900">Size : </p>
                        <div class="d-flex align-items-center"><select class="form-select w-auto">
                            <option value="44">44</option>
                            <option value="22">22</option>
                            <option value="18">18</option>
                          </select><a class="ms-2 fs--1 fw-semi-bold" href="#!">Size chart</a></div>
                      </div>
                      <div class="col-12 col-sm">
                        <p class="fw-semi-bold mb-2 text-900">Quantity : </p>
                        <div class="d-flex justify-content-between align-items-end">
                          <div class="d-flex flex-between-center" data-quantity="data-quantity"><button class="btn btn-phoenix-primary px-3" data-type="minus"><span class="fas fa-minus"></span></button><input class="form-control text-center input-spin-none bg-transparent border-0 outline-none" style="width:50px;" type="number" min="1" value="2" /><button class="btn btn-phoenix-primary px-3" data-type="plus"><span class="fas fa-plus"></span></button></div><button class="btn btn-phoenix-primary px-3 border-0"><span class="fas fa-share-alt fs-1"></span></button>
                        </div>
                      </div>
                    </div> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
            @endforeach
            <!-- end of .container-->
            </section><!-- <section> close ============================-->
            <!-- ============================================-->



            <!-- ============================================-->
            <!-- <section> begin ============================-->
            <section class="py-0">
                <section class="py-0">
                    <div class="container-small">
                        <ul class="nav nav-underline mb-4" id="productTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    href="#tab-description" role="tab" aria-controls="tab-description"
                                    aria-selected="true"></a></li>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="specification-tab" data-bs-toggle="tab"
                                        href="#tab-specification" role="tab" aria-controls="tab-specification"
                                        aria-selected="true">Fasilitas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#tab-reviews"
                                        role="tab" aria-controls="tab-reviews" aria-selected="false">Ratings &
                                        reviews</a>
                                </li>
                            </ul>
                        </ul>
                        <div class="row gx-3 gy-7">
                            <div class="col-12 col-lg-7 col-xl-8">
                                <div class="tab-content" id="productTabContent">
                                    <div class="tab-pane pe-lg-6 pe-xl-12 fade show active text-1100" id="tab-description"
                                        role="tabpanel" aria-labelledby="description-tab">
                                        <!-- Konten Deskripsi -->
                                    </div>
                                    <div class="tab-content" id="productTabContent">
                                        <div class="tab-pane fade show active" id="tab-specification" role="tabpanel"
                                            aria-labelledby="specification-tab">
                                            <h3 class="mb-0 ms-4 fw-bold">Fasilitas</h3>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 40%"> </th>
                                                        <th style="width: 60%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($fasilitas as $fasili)
                                                        <tr>
                                                            <td class="bg-100 align-middle">
                                                                <h6
                                                                    class="mb-0 text-900 text-uppercase fw-bolder px-4 fs--1 lh-sm">
                                                                    {{ $fasili['nama_fasilitas'] }}</h6>
                                                            </td>
                                                            <td class="px-5 mb-0">{{ $fasili['harga_satuan'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab-reviews" role="tabpanel"
                                            aria-labelledby="reviews-tab">
                                            {{-- <h3 class="mb-0 ms-4 fw-bold">Ratings & reviews</h3> --}}
                                            <div class="bg-white rounded-3 p-4 border border-200" style="width: 1100px;">
                                                <div class="row g-3 justify-content-between mb-4">
                                                    <div class="col-auto">
                                                        <div class="col-auto">
                                                            @if ($totalUlasan > 0)
                                                                @php
                                                                    $rating = $totalRating;
                                                                @endphp
                                                                @if ($rating - floor($rating) < 0.5)
                                                                    @for ($i = 0; $i < floor($rating); $i++)
                                                                        <span class="fa fa-star text-warning"></span>
                                                                    @endfor
                                                                @else
                                                                    @for ($i = 0; $i < ceil($rating); $i++)
                                                                        <span class="fa fa-star text-warning"></span>
                                                                    @endfor
                                                                @endif
                                                                <span class="text-primary fw-semi-bold mb-2">
                                                                    ({{ $totalUlasan }} people
                                                                    rated)</span>
                                                            @else
                                                                <h3 class="me-n2">Tidak Ada Ulasan</h3>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-auto"><button class="btn btn-primary rounded-pill"
                                                            data-bs-toggle="modal" data-bs-target="#reviewModal">Rating
                                                            Kamar</button>
                                                        <div class="modal fade" id="reviewModal" tabindex="-1"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content p-4">
                                                                    <div class="d-flex flex-between-center mb-2">
                                                                        <h5 class="modal-title fs-0 mb-0">Rating</h5>
                                                                        {{-- <button></button> <!-- Perlu tag penutup yang sesuai untuk button --> --}}
                                                                    </div>
                                                                    <form method="POST"
                                                                        action="{{ route('detailkamar.store') }} "
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <div class="rating"
                                                                                style="transform: rotate(180deg)">
                                                                                <input type="radio" name="rating"
                                                                                    id="star5" value="5">
                                                                                <label for="star5"
                                                                                    style="rotate: 35deg">&#9733;</label>
                                                                                <input type="radio" name="rating"
                                                                                    id="star4" value="4">
                                                                                <label for="star4"
                                                                                    style="rotate: 35deg">&#9733;</label>
                                                                                <input type="radio" name="rating"
                                                                                    id="star3" value="3">
                                                                                <label for="star3"
                                                                                    style="rotate: 35deg">&#9733;</label>
                                                                                <input type="radio" name="rating"
                                                                                    id="star2" value="2">
                                                                                <label for="star2"
                                                                                    style="rotate: 35deg">&#9733;</label>
                                                                                <input type="radio" name="rating"
                                                                                    id="star1" value="1">
                                                                                <label for="star1"
                                                                                    style="rotate: 35deg">&#9733;</label>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="commentInput"
                                                                                    class="">Ulasan</label>
                                                                                <textarea class="form-control" id="commentInput" rows="3" name="ulasan"></textarea>
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $kamars->first()->id }}">
                                                                                <input type="hidden" name="user_id"
                                                                                    value="{{ $user->id }}">
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="image">Unggah Foto:</label>
                                                                                <input type="file" class="form-control"
                                                                                    id="foto" name="foto">
                                                                            </div>
                                                                        </div>
                                                                        {{-- <div class="d-sm-flex flex-between-center">
                                                                        <div class="form-check flex-1">
                                                                            <input class="form-check-input" id="reviewAnonymously" type="checkbox" value="" checked>
                                                                            <label class="form-check-label mb-0 text-1100 fw-semi-bold" for="reviewAnonymously">Review anonymously</label>
                                                                        </div> --}}
                                                                        <button class="btn ps-0"
                                                                            data-bs-dismiss="modal">Tutup</button>
                                                                        <button
                                                                            class="btn btn-primary rounded-pill">Kirim</button>
                                                                </div>
                                                                </form>
                                                            </div> <!-- Penutup tag modal-content -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4 hover-actions-trigger btn-reveal-trigger">
                                                    @foreach ($detailkamars as $u)
                                                        <div class="d-flex justify-content-between">
                                                            <div style="color: #666;">
                                                                <div style="display: flex; align-items: center;">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($i <= $u->rating)
                                                                            <span class="fa fa-star text-warning"></span>
                                                                        @else
                                                                            <span class="fa fa-star"></span>
                                                                        @endif
                                                                    @endfor
                                                                    <span class="text-800 ms-1"
                                                                        style="margin-left: 10px; margin-top: 3px;  font-weight: bold;">By</span>
                                                                    <!-- Tampilkan nama pengguna -->
                                                                    <h5 class="lh-sm text-800 d-flex align-items-center"
                                                                        style="margin-left: 10px; margin-top: 6px; font-weight: bold;">
                                                                        {{ $u->user->name }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="ml-auto">
                                                                    <div
                                                                        class="font-sans-serif btn-reveal-trigger position-static">
                                                                        <button
                                                                            class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal"
                                                                            type="button" data-bs-toggle="dropdown"
                                                                            data-boundary="window" aria-haspopup="true"
                                                                            aria-expanded="false"
                                                                            data-bs-reference="parent">
                                                                            <span class="fas fa-ellipsis-h fs--2"></span>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-end py-2">
                                                                            {{-- <div class="dropdown-divider"></div> --}}
                                                                            <form
                                                                                action="{{ route('detailkamar.delete', $u->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="dropdown-item text-danger hapus">Hapus</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="text-700 fs--1 mb-1">
                                                            {{ Carbon::parse($u->created_at)->diffForHumans(null, true) }}
                                                            Yang Lalu
                                                        </p>
                                                        <div class="text-1000 mb-3">
                                                            <span style="margin-right: 5px;">{{ $u->ulasan }}</span>
                                                        </div>
                                                        <div class="row g-2 mb-2">
                                                            <div class="col-auto">
                                                                @if ($u->foto !== null)
                                                                    <img class="card-img-top"
                                                                        src="{{ asset('storage/kamar/' . $u->foto) }}"
                                                                        alt="{{ $u->nama_kamar }}"
                                                                        style="object-fit: cover; height: 200px;">
                                                                    {{-- @else
                                                            <img class="card-img-top" src="{{ asset('path/ke/gambar/default.jpg') }}" alt="Default Image" style="object-fit: cover; height: 200px;"> --}}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <!-- ===============================================-->
                                                    <!--    JavaScripts-->
                                                    <!-- ===============================================-->
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
                                                    <script src="../../../vendors/swiper/swiper-bundle.min.js"></script>
                                                    <script src="../../../vendors/dropzone/dropzone.min.js"></script>
                                                    <script src="../../../vendors/rater-js/index.js"></script>
                                                    <script src="../../../vendors/glightbox/glightbox.min.js"></script>
                                                    <script src="../../../assets/js/phoenix.js"></script>
    </body>
@endsection


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/apps/e-commerce/landing/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 12:14:07 GMT -->

</html>
