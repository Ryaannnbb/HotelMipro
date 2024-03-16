@extends('layout_admin.app')
@section('js')
    <script src="{{ $chart1->cdn() }}"></script>
    {{ $chart1->script() }}

    <script src="{{ $chart2->cdn() }}"></script>
    {{ $chart2->script() }}

    <script src="{{ $chart3->cdn() }}"></script>
    {{ $chart3->script() }}
@endsection

@section('content')
    @include('sweetalert.sweetalert')
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            appearance: textfield;
        }

        ::-webkit-scrollbar {
        display: none;

        scrollbar-width: none;
        -ms-overflow-style: none;
        }
    </style>
    <div class="modal fade" id="searchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true"
        data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
        <div class="modal-dialog">
            <div class="modal-content mt-15 rounded-pill">
                <div class="modal-body p-0">
                    <div class="search-box navbar-top-search-box" data-list='{"valueNames":["title"]}' style="width: auto;">
                        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                                class="form-control search-input fuzzy-search rounded-pill form-control-lg" type="search"
                                placeholder="Search..." aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                        <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none"
                            data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0"
                                aria-label="Close"></button>
                        </div>
                        <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                            <div class="scrollbar-overlay" style="max-height: 30rem;">
                                <div class="list pb-3">
                                    <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span
                                            class="text-500">results</span></h6>
                                    <hr class="text-200 my-0" />
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently
                                        Searched </h6>
                                    <div class="py-2"><a class="dropdown-item"
                                            href="apps/e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-solid fa-clock-rotate-left"
                                                        data-fa-transform="shrink-2"></span> Store Macbook</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"> <span
                                                        class="fa-solid fa-clock-rotate-left"
                                                        data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="text-200 my-0" />
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Products
                                    </h6>
                                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                            href="apps/e-commerce/landing/product-details.html">
                                            <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3"
                                                    src="assets/img/products/60x60/3.png" alt="" /></div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                                                <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB
                                                        Memory - 1.6GHz - 128GB
                                                        Storage</span></p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item py-2 d-flex align-items-center"
                                            href="apps/e-commerce/landing/product-details.html">
                                            <div class="file-thumbnail me-2"><img class="img-fluid"
                                                    src="assets/img/products/60x60/3.png" alt="" /></div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                                                <p class="fs--2 mb-0 d-flex text-700"><span
                                                        class="fw-medium text-600 ms-2">30 Sep at 12:30
                                                        PM</span></p>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="text-200 my-0" />
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick
                                        Links</h6>
                                    <div class="py-2"><a class="dropdown-item"
                                            href="apps/e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-solid fa-link text-900"
                                                        data-fa-transform="shrink-2"></span> Support MacBook House</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"> <span
                                                        class="fa-solid fa-link text-900"
                                                        data-fa-transform="shrink-2"></span> Store MacBook″</div>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="text-200 my-0" />
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Files
                                    </h6>
                                    <div class="py-2"><a class="dropdown-item"
                                            href="apps/e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-solid fa-file-zipper text-900"
                                                        data-fa-transform="shrink-2"></span> Library MacBook folder.rar
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"> <span
                                                        class="fa-solid fa-file-lines text-900"
                                                        data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"> <span
                                                        class="fa-solid fa-image text-900"
                                                        data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="text-200 my-0" />
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Members
                                    </h6>
                                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                            href="pages/members.html">
                                            <div class="avatar avatar-l status-online  me-2 text-900">
                                                <img class="rounded-circle " src="assets/img/team/40x40/10.webp"
                                                    alt="" />
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                                                <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item py-2 d-flex align-items-center" href="pages/members.html">
                                            <div class="avatar avatar-l  me-2 text-900">
                                                <img class="rounded-circle " src="assets/img/team/40x40/12.webp"
                                                    alt="" />
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">John Smith</h6>
                                                <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="text-200 my-0" />
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Related
                                        Searches</h6>
                                    <div class="py-2"><a class="dropdown-item"
                                            href="apps/e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-brands fa-firefox-browser text-900"
                                                        data-fa-transform="shrink-2"></span> Search in the Web MacBook
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"> <span
                                                        class="fa-brands fa-chrome text-900"
                                                        data-fa-transform="shrink-2"></span> Store MacBook″</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="pb-5">
            <div class="row g-4">
                <div class="col-12 col-xxl-6">
                    <div class="mb-8">
                        <h2 class="mb-2">Dashboard</h2>
                    </div>
                    <div class="row align-items-center g-4">
                        <div class="col-12 col-md-auto">
                            <div class="d-flex align-items-center"><span class="fa-stack"
                                    style="min-height: 40px; min-width: 40px;"><span
                                        class="fa-solid fa-square fa-stack-2x text-primary-300"
                                        data-fa-transform="down-4 rotate--10 left-4"></span><span
                                        class="fa-solid fa-circle fa-stack-2x stack-circle text-primary-100"
                                        data-fa-transform="up-4 right-3 grow-2"></span><span
                                        class="fa-stack-1x fas fa-bed text-primary"
                                        data-fa-transform="shrink-2 up-8 right-6"></span></span>
                                        <div class="ms-3">
                                            <h4 class="mb-0">Rooms</h4>
                                            <p class="text-800 fs--1 mb-0">Total amount: {{ $rooms ? count($rooms) : 0 }}</p>
                                        </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <div class="d-flex align-items-center">
                                <span class="fa-stack" style="min-height: 40px; min-width: 40px;">
                                    <span class="fa-solid fa-square fa-stack-2x" style="color: rgb(119, 226, 253);" data-fa-transform="down-4 rotate--10 left-4"></span>
                                    <span
                                    class="fa-solid fa-circle fa-stack-2x stack-circle text-primary-100"
                                    data-fa-transform="up-4 right-3 grow-2"></span>
                                    <span class="fa-stack-1x fas fa-user" style="color: rgb(37, 197, 236);" data-fa-transform="shrink-2 up-8 right-6"></span>
                                </span>
                                <div class="ms-3">
                                    <h4 class="mb-0">Users</h4>
                                    <p class="text-800 fs--1 mb-0">Registered users total: {{ $totalUsers }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <div class="d-flex align-items-center">
                                <span class="fa-stack" style="min-height: 40px; min-width: 40px;">
                                    <span class="fa-solid fa-square fa-stack-2x" style="color: rgb(144, 255, 199);" data-fa-transform="down-4 rotate--10 left-4"></span>
                                    <span
                                        class="fa-solid fa-circle fa-stack-2x stack-circle text-primary-100"
                                        data-fa-transform="up-4 right-3 grow-2"></span>
                                    <span class="fa-stack-1x far fa-check-circle" style="color: rgb(111, 175, 142);" data-fa-transform="shrink-2 up-8 right-6"></span>
                                </span>
                                <div class="ms-3">
                                    <h4 class="mb-0">Rooms Active</h4>
                                    <p class="text-800 fs--1 mb-0">Rooms available: {{ $roomsAvailable }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <div class="d-flex align-items-center">
                                <span class="fa-stack" style="min-height: 40px; min-width: 40px;">
                                    <span class="fa-solid fa-square fa-stack-2x" style="color: rgb(250, 115, 115);" data-fa-transform="down-4 rotate--10 left-4"></span>
                                    <span
                                    class="fa-solid fa-circle fa-stack-2x stack-circle text-primary-100"
                                    data-fa-transform="up-4 right-3 grow-2"></span>
                                    <span class="fa-stack-1x fa-regular fa-circle-xmark" style="color: rgb(250, 107, 71);" data-fa-transform="shrink-2 up-8 right-6"></span>
                                </span>
                                <div class="ms-3">
                                    <h4 class="mb-0">Rooms Empty</h4>
                                    <p class="text-800 fs--1 mb-0">Rooms booked: {{ $roomsBooked }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <div class="d-flex align-items-center">
                                <span class="fa-stack" style="min-height: 40px; min-width: 40px;">
                                    <span class="fa-solid fa-square fa-stack-2x" style="color: rgb(252, 190, 109);" data-fa-transform="down-4 rotate--10 left-4"></span>
                                    <span
                                    class="fa-solid fa-circle fa-stack-2x stack-circle text-primary-100"
                                    data-fa-transform="up-4 right-3 grow-2"></span>                                    <span class="fa-stack-1x fas fa-clock" style="color: rgb(255, 140, 0);" data-fa-transform="shrink-2 up-8 right-6"></span>
                                </span>
                                <div class="ms-3">
                                    <h4 class="mb-0">Rooms Pending</h4>
                                    <p class="text-800 fs--1 mb-0">Users order pending</p>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-200 mb-6 mt-4" />
                        <div class="col-xl-6 col-xxl-7"> </div>
                        <div class="card flex-fill w-100">
                            <div class="card-body">
                                {!! $chart1->container() !!}
                            </div>
                        </div>
                        <div class="col-12 col-xxl-6">
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            {!! $chart2->container() !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            {!! $chart3->container() !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">

                                </div>
                                <div class="col-12 col-md-6">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <footer class="footer position-absolute">
                <div class="row g-0 justify-content-between align-items-center h-100">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 mt-2 mt-sm-0 text-900">Copyright © Small<span
                                class="d-none d-sm-inline-block"></span><span
                                class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2024</p>

                    </div>
                    <div class="col-12 col-sm-auto text-center">
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </div>
    </div>
@endsection
