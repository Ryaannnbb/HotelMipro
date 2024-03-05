@extends('layout_admin.app')

@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}"
            });
        </script>
    @endif

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
                    <h2 class="mb-0">Products</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item">
                    <p class="nav-link active my-n2" aria-current="page"><span>All </span><span class="text-700 fw-semi-bold">
                            @if ($kamar->count() > 0)
                                <span>({{ $kamar->count() }})</span>
                            @endif
                        </span></p>
                </li>
            </ul>
            <div id="products"
                data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":5,"pagination":true}'>
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                                    class="form-control search-input search" type="search" placeholder="Search rooms"
                                    aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="scrollbar overflow-hidden-y">
                            <div class="btn-group position-static" role="group">
                                <div class="ms-xxl-auto">
                                    <button class="btn btn-link text-900 me-4 px-0"></button>
                                    <a href="{{ route('kamar.create') }}" class="btn btn-primary" id="addBtn">
                                        <span class="fas fa-plus me-2"></span>Add room
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- {{ TABLE }} --}}
                        <div class="table-responsive scrollbar mx-n1 px-1">
                            <table class="table fs-1 mb-0">
                                <thead>
                                    <tr class="text-center">

                                        <th class="white-space-nowrap align-middle ps-4 fs--1 text-dark"
                                            style="width:350px;" data-sort="no">NO</th>
                                        <th class="white-space-nowrap align-middle ps-4 fs--1 text-dark"
                                            style="width:350px;" data-sort="path_produk">IMAGE</th>
                                        <th class="white-space-nowrap align-middle ps-4 fs--1 text-dark"
                                            style="width:350px;" data-sort="path_nama">ROOMS NAME</th>
                                        <th class="white-space-nowrap align-middle text-center fs--1 ps-4 text-dark"
                                            style="width:150px;" data-sort="harga">PRICE</th>
                                        <th class="white-space-nowrap align-middle fs--1 ps-4 text-dark"
                                            style="width:150px;" data-sort="categori">CATEGORY</th>
                                        <th class="white-space-nowrap align-middle fs--1 ps-4 text-dark"
                                            style="width:200px;" data-sort="stok">STATUS</th>
                                        <th class="white-space-nowrap align-middle fs--1 ps-4 text-dark" style="width:10px;"
                                            data-sort="deskripsi">ROOMS DESCRIPTION</th>
                                        <th class="white-space-nowrap align-middle fs--1 ps-4 text-dark" style="width:50px;"
                                            data-sort="ACTION">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="products-table-body text-center">
                                    @foreach ($kamar as $kamars)
                                        <tr class="position-static text-center">
                                            <td class="align-middle review fs-0 text-center ps-4">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="align-middle white-space-nowrap mx-auto text-center py-0">
                                                <img src="{{ asset('storage/kamar/' . $kamars->path_kamar) }}"
                                                    alt="" width="50%" height="50" style="object-fit: cover; min-width: 50px;"
                                                    class="mx-auto rounded-3" />
                                            </td>
                                            <td class="category ellipsis-text col-1">
                                                <p class="fw-semi-bold fs--1 line-clamp-3 mb-0">
                                                    {{ Str::limit($kamars->nama_kamar, 10, $end = '...') }}</p>
                                            </td>
                                            <td
                                                class="price align-middle white-space-nowrap text-end fw-bold fs--1  text-700 ps-4">
                                                {{ 'Rp ' . number_format($kamars->harga, 0, ',', '.') }}</td>

                                            <td
                                                class="align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold">
                                                {{ $kamars->kategori ? $kamars->kategori->nama_kategori : 'Tidak Ada Kategori' }}
                                            </td>
                                            <td class="tags align-middle review pb-2 ps-3 fs--1 " style="width:200px;">
                                                {{ $kamars->status }}
                                            </td>

                                            <td class="ellipsis-text col-1">
                                                {{ strip_tags(Str::limit($kamars->deskripsi, 10, $end = '...')) }}</td>
                                            <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                                <div class="font-sans-serif btn-reveal-trigger position-static">
                                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                        <span class="fas fa-ellipsis-h fs--2"></span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                                        <a class="dropdown-item" href="{{ route('kamar.edit', $kamars->id) }}">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('kamar.destroy', $kamars->id) }}" method="POST" class="hapus-form">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" class="dropdown-item text-danger hapus">Remove</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                        <div class="col-auto d-flex">
                            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a
                            class="fw-semi-bold" href="#!" data-list-view="*">View all<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a
                            class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                        <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span
                                    class="fas fa-chevron-left"></span></button>
                                    <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span
                                        class="fas fa-chevron-right"></span></button>
                                    </div>
                                </div>
                                <hr class="hr">

                    <style>
                        .hr {
                            margin-top: -2px;
                        }
                        .ellipsis-text {
                            max-width: 200px;
                            /* Sesuaikan dengan lebar maksimum yang diinginkan */
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            font-size: 14px;
                            /* Sesuaikan dengan ukuran font yang diinginkan */
                        }
                    </style>
                    {{-- {{ END }} --}}
                    <script>
                        $('.hapus').click(function() {
                            var form = $(this).closest('form');

                            Swal.fire({
                                title: "Are you sure?",
                                text: "You will delete this product. This action cannot be undone!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Yes, accept!"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit();
                                }
                            });
                        });
                    </script>

@endsection
