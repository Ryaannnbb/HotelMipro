@extends('layout_admin.app')

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
                                aria-label="Close"></button></div>
                        <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                            <div class="scrollbar-overlay" style="max-height: 30rem;">
                                <div class="list pb-3">
                                    <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span
                                            class="text-500">results</span></h6>
                                    <hr class="text-200 my-0" />
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently
                                        Searched </h6>
                                    <div class="py-2"><a class="dropdown-item" href="../landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-solid fa-clock-rotate-left"
                                                        data-fa-transform="shrink-2"></span> Store Macbook</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="../landing/product-details.html">
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
                                            href="../landing/product-details.html">
                                            <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3"
                                                    src="../../../assets/img/products/60x60/3.png" alt="" /></div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                                                <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB
                                                        Memory - 1.6GHz - 128GB Storage</span></p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item py-2 d-flex align-items-center"
                                            href="../landing/product-details.html">
                                            <div class="file-thumbnail me-2"><img class="img-fluid"
                                                    src="../../../assets/img/products/60x60/3.png" alt="" /></div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                                                <p class="fs--2 mb-0 d-flex text-700"><span
                                                        class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="text-200 my-0" />
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick
                                        Links</h6>
                                    <div class="py-2"><a class="dropdown-item" href="../landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-solid fa-link text-900"
                                                        data-fa-transform="shrink-2"></span> Support MacBook House</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="../landing/product-details.html">
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
                                    <div class="py-2"><a class="dropdown-item" href="../landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-solid fa-file-zipper text-900"
                                                        data-fa-transform="shrink-2"></span> Library MacBook folder.rar
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="../landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"> <span
                                                        class="fa-solid fa-file-lines text-900"
                                                        data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="../landing/product-details.html">
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
                                            href="../../../pages/members.html">
                                            <div class="avatar avatar-l status-online  me-2 text-900">
                                                <img class="rounded-circle " src="../../../assets/img/team/40x40/10.webp"
                                                    alt="" />
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                                                <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item py-2 d-flex align-items-center"
                                            href="../../../pages/members.html">
                                            <div class="avatar avatar-l  me-2 text-900">
                                                <img class="rounded-circle " src="../../../assets/img/team/40x40/12.webp"
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
                                    <div class="py-2"><a class="dropdown-item" href="../landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-brands fa-firefox-browser text-900"
                                                        data-fa-transform="shrink-2"></span> Search in the Web MacBook
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="../landing/product-details.html">
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
    <script>
        var navbarTopShape = window.config.config.phoenixNavbarTopShape;
        var navbarPosition = window.config.config.phoenixNavbarPosition;
        var body = document.querySelector('body');
        var navbarDefault = document.querySelector('#navbarDefault');
        var navbarTop = document.querySelector('#navbarTop');
        var topNavSlim = document.querySelector('#topNavSlim');
        var navbarTopSlim = document.querySelector('#navbarTopSlim');
        var navbarCombo = document.querySelector('#navbarCombo');
        var navbarComboSlim = document.querySelector('#navbarComboSlim');
        var dualNav = document.querySelector('#dualNav');

        var documentElement = document.documentElement;
        var navbarVertical = document.querySelector('.navbar-vertical');

        if (navbarPosition === 'dual-nav') {
            topNavSlim.remove();
            navbarTop.remove();
            navbarVertical.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarDefault.remove();
            dualNav.removeAttribute('style');
            documentElement.classList.add('dual-nav');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
            navbarDefault.remove();
            navbarTop.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            topNavSlim.style.display = 'block';
            navbarVertical.style.display = 'inline-block';
            body.classList.add('nav-slim');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
            navbarDefault.remove();
            navbarVertical.remove();
            navbarTop.remove();
            topNavSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarTopSlim.removeAttribute('style');
            body.classList.add('nav-slim');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'combo') {
            navbarDefault.remove();
            //- navbarVertical.remove();
            navbarTop.remove();
            topNavSlim.remove();
            navbarCombo.remove();
            navbarTopSlim.remove();
            navbarComboSlim.removeAttribute('style');
            navbarVertical.removeAttribute('style');
            body.classList.add('nav-slim');
        } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
            navbarDefault.remove();
            topNavSlim.remove();
            navbarVertical.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarTop.removeAttribute('style');
            documentElement.classList.add('navbar-horizontal');
        } else if (navbarTopShape === 'default' && navbarPosition === 'combo') {
            topNavSlim.remove();
            navbarTop.remove();
            navbarTopSlim.remove();
            navbarDefault.remove();
            navbarComboSlim.remove();
            navbarCombo.removeAttribute('style');
            navbarVertical.removeAttribute('style');
            documentElement.classList.add('navbar-combo')

        } else {
            topNavSlim.remove();
            navbarTop.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarDefault.removeAttribute('style');
            navbarVertical.removeAttribute('style');
        }

        var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
        var navbarTop = document.querySelector('.navbar-top');
        if (navbarTopStyle === 'darker') {
            navbarTop.classList.add('navbar-darker');
        }

        var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
        var navbarVertical = document.querySelector('.navbar-vertical');
        if (navbarVerticalStyle === 'darker') {
            navbarVertical.classList.add('navbar-darker');
        }
    </script>
    <div class="content">
        <nav class="mb-2" aria-label="breadcrumb">
        </nav>
        <nav class="mb-2" aria-label="breadcrumb">
        </nav>
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Pesanan</h2>
                </div>
            </div>
            <div id="products"
                data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                                    class="form-control search-input search" type="search" placeholder="Search customer"
                                    aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="scrollbar overflow-hidden-y">
                            <div class="btn-group position-static" role="group">
                                {{-- <div class="ms-xxl-auto">
                                    <button class="btn btn-link text-900 me-4 px-0"></button>
                                    <a href="{{ route('tambah.produk') }}" class="btn btn-primary" id="addBtn">
                                        <span class="fas fa-plus me-2"></span>Add order
                                    </a>
                                </div> --}}
                            </div>
                        </div>

                        {{-- {{ TABLE }} --}}
                        <div class="table-responsive scrollbar mx-n1 px-1">
                            <table class="table fs--1 mb-0">
                                <thead>
                                    <tr class="">
                                        <th class="sort white-space-nowrap align-middle text-center  "
                                            scope="col" style="width:15%; min-width:120px">NO</th>
                                        <th class="sort white-space-nowrap align-middle text-center  "
                                            scope="col" style="width:15%; min-width:140px">BUKTI</th>
                                        <th class="sort white-space-nowrap align-middle text-center  "
                                            scope="col" style="width:15%; min-width:140px">NAMA PENGGUNA</th>
                                        <th class="sort white-space-nowrap align-middle text-center  "
                                            scope="col" style="width:15%; min-width:140px">NAMA KAMAR</th>
                                        <th class="sort align-middle  text-center" scope="col"
                                            style="width:15%; min-width:180px">METODE PEMBAYARAN</th>
                                            <th class="sort align-middle  text-center" scope="col"
                                            style="width:15%; min-width:160px">TANGGAL AWAL PESAN</th>
                                            <th class="sort align-middle  text-center" scope="col"
                                            style="width:15%; min-width:160px">TANGGAL AKHIR PESAN</th>
                                            <th class="sort align-middle text-center" scope="col"
                                            style="width:15%; min-width:160px">TOTAL</th>
                                            <th class="sort align-middle text-center" scope="col"
                                                style="width:20%; min-width:160px">STATUS</th>
                                        <th class="align-middle text-center" scope="col"
                                            style="width:15%;">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="profile-order-table-body text-center">
                                    @if ($pesanan->count() > 0)
                                        {{-- @php
                                            $checkout_id = 0;
                                            $no = 0;
                                            $totalproduktiappesanan = [];
                                        @endphp --}}
                                        @foreach ($pesanan as $orders)
                                            {{-- @if ($orders->id != $checkout_id)
                                                @php
                                                    $checkout_id = $orders->id;
                                                    $no += 1;
                                                    $totalproduktiappesanan[$orders->id] = 1;
                                                @endphp --}}
                                    <tr class="position-static text-center">
                                        <td class="align-middle review fs-0 mx-auto text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="align-middle review fs-0 text-center ps-4">
                                            <img src="{{ asset('storage/kamar/' . $orders->invoice) }}"
                                                alt="" width="50%" height="50"
                                                style="object-fit: cover; min-width: 50px;" class="mx-auto" />
                                        </td>
                                        <td class="category align-middle review fs-0 text-center mx-auto">
                                            <span class="fw-semi-bold fs--1 line-clamp-3 mb-0">
                                                {{ $orders->name }}
                                            </span>
                                        </td>
                                        <td class="align-middle review fs-0 text-center mx-auto">
                                            {{-- <button type="button" class="btn btn-link primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#productDetailModal
                                                            {{ $orders->id }}
                                                            ">
                                                Detail
                                            </button> --}}
                                            <span class="fw-semi-bold fs--1 line-clamp-3 mb-0">
                                                {{ $orders->nama_kamar }}
                                            </span>
                                        </td>
                                        <td class="align-middle white-space-nowrap py-0">
                                            <span class="badge-phoenix-success">{{ $orders->metode_pembayaran }}</span>
                                            <td>
                                                <span class="badge badge-phoenix fs--2
                                                    @if ($orders->status == 'pending') badge-phoenix-warning
                                                    @elseif($orders->status == 'approve') badge-phoenix-info
                                                    {{-- @elseif($orders->status == 'delivered') badge-phoenix-success --}}
                                                     {{-- @elseif($orders->status == 'completed') badge-phoenix-success --}}
                                                    @elseif($orders->status == 'reject') badge-phoenix-danger
                                                    @endif">
                                                    @if ($orders->status == 'pending') Pending
                                                    @elseif($orders->status == 'approve') Approve
                                                     {{-- @elseif($orders->status == 'delivered') Delivered
                                                    @elseif($orders->status == 'completed') Completed --}}
                                                    @elseif($orders->status == 'reject') Rejected
                                                    @endif
                                                </span>
                                                @if ($orders->status == 'pending')
                                                    <form action="{{ route('rejectOrder', $orders->id) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        <form action="{{ route('rejectOrder', $orders->id) }}" method="POST" style="display:inline">
                                                            @csrf
                                                                Rejected
                                                            </button>
                                                            <!-- Modal -->
                                                                <!-- Isi Modal -->
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <!-- Isi Modal -->
                                                                        <div class="modal-body">
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-danger">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {{-- </form> --}}

                                                    </form>
                                                    <form action="{{ route('approveOrder', $orders->id) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Approve</button>
                                                    </form>
                                                @endif
                                            </td>
                                        {{-- <td class="align-middle white-space-nowrap py-0">
                                            <span class="fw-semi-bold fs--1 line-clamp-3 mb-0">
                                                {{ $orders->metode_pengiriman }}
                                                Shopee Express
                                            </span>
                                        </td> --}}
                                        <td class="produks align-middle ps-4">
                                            <span class="fw-semi-bold fs--1 line-clamp-3 mb-0">
                                                {{ is_null($orders->tanggal_awal) ? '-' : date('d F Y', strtotime($orders->tanggal_awal)) }}
                                            </span>
                                        </td>
                                        <td class="produks align-middle ps-4">
                                            <span class="fw-semi-bold fs--1 line-clamp-3 mb-0">
                                                {{ is_null($orders->tanggal_akhir) ? '-' : date('d F Y', strtotime($orders->tanggal_akhir)) }}
                                            </span>
                                        </td>
                                        <td class="produks align-middle">
                                            <span class="fw-semi-bold fs--1 line-clamp-3 mb-0">Rp.
                                                {{ number_format($orders->harga_pesanan, 0, ',', '.') }}
                                            </span>
                                        </td>

                                        <td class="align-middle text-center">
                                            @if ($orders->status == 'reject')
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alasanPembatalanModal{{ $orders->id }}">
                                                    Lihat Alasan
                                                </button>
                                            @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="alasanPembatalanModal{{ $orders->id }}" tabindex="-1" aria-labelledby="alasanPembatalanModalLabel{{ $orders->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="alasanPembatalanModalLabel{{ $orders->id }}">Alasan Pembatalan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ $orders->alasan_pembatalan }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- <td class="produks align-middle ">
                                            @if ($orders->status == 'shipped')
                                            <form action="{{ route('diterima', $orders->id) }}">
                                                                @csrf
                                                                @method('put')
                                                                <input type="hidden" name="status" value="{{ $orders->status }}">
                                                                <button type="submit"
                                                                    class="btn btn-link dropdown-item text-primary">
                                                                    Diterima
                                                                </button>
                                                            </form>
                                            <a class="btn btn-link dropdown-item text-primary"
                                                href="#">Accepted</a>
                                            @elseif ($orders->status == 'reject')
                                            <button type="button" class="btn btn-link"
                                                data-bs-toggle="modal"
                                                data-bs-target="#show-reject-message
                                                                {{ $orders->id }}
                                                                ">Reject
                                                Message</button>
                                            <div class="modal fade"
                                                id="show-reject-message
                                                                {{ $orders->id }}
                                                                "
                                                tabindex="-1" aria-labelledby="rejectMessageModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="rejectMessageModalLabel">Reject Message
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="w-100 fs-2">
                                                                <p style="overflow-wrap: break-word;">
                                                                    {{ $orders->reject_message }}
                                                                    soasik
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <!-- Tambahkan tombol untuk menolak pesan di sini jika diperlukan -->
                                                            <!-- <button type="button" class="btn btn-danger">Reject</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </td> --}}
                                    </tr>
                                    {{-- @else --}}
                                            {{-- @php
                                                $totalproduktiappesanan[$orders->id] += 1;
                                            @endphp --}}
                                            {{-- @endif --}}
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{-- @php
                                $detail = '';
                                $counter = 1;
                            @endphp

                            @foreach ($order as $orders)
                                @if ($counter < $totalproduktiappesanan[$orders->id])
                                    @php
                                        $detail .=
                                            '<tr><td class="text-center product align-middle ps-4">' .
                                            $counter .
                                            '</td><td class="text-center product align-middle ps-4">' .
                                            '<img src="' .
                                            asset('storage/Product/' . $orders->path_produk) .
                                            '"
                                                                alt="" width="50%" height="50%"
                                                                style="object-fit: cover" class="mx-auto" />' .
                                            '</td><td class="text-center product align-middle ps-4">' .
                                            $orders->nama_produk .
                                            '</td><td class="text-center product align-middle ps-4">' .
                                            $orders->jumlah .
                                            '</td><td class="text-center product align-middle ps-4">' .
                                            'Rp. ' . number_format($orders->detail_total, 0, ',', '.') .
                                            '</td></tr>';
                                        $counter += 1;
                                    @endphp
                                @else
                                    @php
                                        $detail .=
                                            '<tr><td class="text-center product align-middle ps-4">' .
                                            $counter .
                                            '</td><td class="text-center product align-middle ps-4">' .
                                            '<img src="' .
                                            asset('storage/Product/' . $orders->path_produk) .
                                            '"
                                                                alt="" width="50%" height="50%"
                                                                style="object-fit: cover" class="mx-auto" />' .
                                            '</td><td class="text-center product align-middle ps-4">' .
                                            $orders->nama_produk .
                                            '</td><td class="text-center product align-middle ps-4">' .
                                            $orders->jumlah .
                                            '</td><td class="text-center product align-middle ps-4">' .
                                            'Rp. ' . number_format($orders->detail_total, 0, ',', '.') .
                                            '</td></tr>';
                                        $counter = 1;
                                    @endphp

                                    <!-- Modal -->
                                    <div class="modal fade" id="productDetailModal{{ $orders->id }}" tabindex="-1"
                                        aria-labelledby="productDetailModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="productDetailModalLabel">
                                                        Product Detail</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <table class="table fs--1 mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                        style="width: 250px">
                                                                        <span>NO</span>
                                                                    </th>
                                                                    <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                        scope="col" style="width:350px;">
                                                                    </th>
                                                                    <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                        scope="col" style="width:350px;">
                                                                        PRODUCT NAME</th>
                                                                    <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                        scope="col" style="width:250px;">
                                                                        JUMLAH</th>
                                                                    <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                        scope="col" style="width:350px;">
                                                                        TOTAL HARGA</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="list" id="products-table-body">
                                                                @php
                                                                    echo $detail;
                                                                @endphp
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <!-- Jika diperlukan, tambahkan tombol lain di sini -->
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- @php
                                        $detail = '';
                                    @endphp
                                @endif
                            @endforeach

                            @php
                                $user_id = 0;
                            @endphp
                            @foreach ($order as $orders)
                                @if ($orders->user_id != $user_id)
                                    @php
                                        $user_id = $orders->user_id;
                                    @endphp
                                    <div class="modal fade" id="useridModal{{ $orders->user_id }}" tabindex="-1"
                                        aria-labelledby="useridModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="useridModalLabel">
                                                        Customer Detail</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <table class="table fs--1 mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                        scope="col" style="width:350px;">
                                                                        CUSTOMER NAME
                                                                    </th>
                                                                    <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                        scope="col" style="width:350px;">
                                                                        EMAIL</th>
                                                                    <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                        scope="col" style="width:250px;">
                                                                        ADDRESS</th>
                                                                    <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                        scope="col" style="width:350px;">
                                                                        PHONE NUMBER</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="list" id="products-table-body">
                                                                <tr>
                                                                    <td class="text-center product align-middle ps-4">
                                                                        {{ $orders->name }}</td>
                                                                    <td class="text-center product align-middle ps-4">
                                                                        {{ $orders->email }}</td>
                                                                    <td class="text-center product align-middle ps-4">
                                                                        {{ $orders->address }}</td>
                                                                    <td class="text-center product align-middle ps-4">
                                                                        {{ $orders->telp }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <!-- Jika diperlukan, tambahkan tombol lain di sini -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @endif --}}
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                        <div class="col-auto d-flex">
                            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900"
                                data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!"
                                data-list-view="*">View all<span class="fas fa-angle-right ms-1"
                                    data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none"
                                href="#!" data-list-view="less">View Less<span
                                    class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                        <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span
                                    class="fas fa-chevron-left"></span></button>
                            <ul class="mb-0 pagination"></ul><button class="page-link pe-0"
                                data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                        </div>
                    </div>
                    <hr class="hr">
                    <style>
                        .hr {
                            margin-top: -2px;
                        }
                    </style>

                    <script>
                        document.querySelectorAll('.form-check-input').forEach(function(starInput) {
                            starInput.addEventListener('change', function() {
                                // Ambil nilai rating yang dipilih
                                let rating = this.value;

                                // Lakukan sesuatu dengan nilai rating, misalnya kirim ke controller menggunakan AJAX
                                console.log('Rating yang dipilih:', rating);

                                // Selain console.log di atas, Anda bisa melakukan sesuatu yang sesuai dengan kebutuhan aplikasi Anda
                            });
                        });
                    </script>

                @endsection
