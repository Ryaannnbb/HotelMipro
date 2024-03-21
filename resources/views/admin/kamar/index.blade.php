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
                    <h2 class="mb-0">Kamar</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item">
                    <p class="nav-link active my-n2" aria-current="page"><span>Semua </span><span
                            class="text-700 fw-semi-bold">
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
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input search" type="search" placeholder="Search rooms"
                                    aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="scrollbar overflow-hidden-y">
                            <div class="btn-group position-static" role="group">
                                <div class="ms-xxl-auto">
                                    <button class="btn btn-link text-900 me-4 px-0"></button>
                                    <a href="{{ route('kamar.create') }}" class="btn btn-primary" id="addBtn">
                                        <span class="fas fa-plus me-2"></span>Tambah Kamar
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- {{ TABLE }} --}}
                        {{-- <div
                        class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
                        <div class="table-responsive scrollbar mx-n1 px-1">
                            <table class="table fs--1 mb-0">
                                <thead>

                                    <tr align="center">
                                        <th class=" ps-0" style="width: 10% "[.[.[.[p/]]]]>
                                            <span>NO</span>
                                        </th>
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
                                    </tr> --}}
                                </thead>
                            </table>
                        </div>
                        </div>

                        </thead>
                        {{-- <tbody class="list" id="products-table-body text-center"> --}}

                        <div class="row">
                            @foreach ($kamar as $kamars)
                            <div class="col-12 col-sm-6 col-md-4 col-xxl-2 room">
                                    <div class="card mb-3">
                                        <div class="position-relative">
                                            <div class="position-absolute top-0 end-0 m-2">
                                                <div class="font-sans-serif btn-reveal-trigger position-static">
                                                    <button
                                                        class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent">
                                                        <span class="fas fa-ellipsis-h fs--2 text-white"></span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                                        <a class="dropdown-item"
                                                            href="{{ route('kamar.edit', $kamars->id) }}">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('kamar.destroy', $kamars->id) }}"
                                                            method="POST" class="hapus-form">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button"
                                                                class="dropdown-item text-danger hapus">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal{{ $kamars->id }}">
                                            <img class="card-img-top"
                                                src="{{ asset('storage/kamar/' . $kamars->path_kamar) }}"
                                                style="object-fit: cover; height: 200px;">
                                        </a>
                                        <div class="card-body">
                                            <h6 class="card-title room-name">{{ $kamars->nama_kamar }}</h6>

                                            <span
                                                class="badge badge-phoenix fs-10 badge-phoenix-success">{{ $kamars->status }}</span>
                                            <p class="fs--1">
                                                {{-- @if (!is_null($product->rating))
                                            @if ($product->rating - floor($product->rating) < 0.5)
                                            @for ($i = 0; $i < floor($product->rating); $i++)
                                            <span class="fa fa-star text-warning"></span>
                                            @endfor
                                            @else
                                            @for ($i = 0; $i < ceil($product->rating); $i++)
                                            <span class="fa fa-star text-warning"></span>
                                            @endfor
                                            @endif
                                            <span class="text-500 fw-semi-bold ms-1">({{ $product->totalulasan }} people rated)</span>
                                            @else
                                            <p>There are no reviews</p>
                                            @endif --}}
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex align-items-center mb-1">
                                                <h3 class="text-1100 mb-0">
                                                    {{ 'Rp ' . number_format($kamars->harga, 0, ',', '.') }}</h3>
                                                <div class="flex-grow-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modal{{ $kamars->id }}" tabindex="-1"
                                    aria-labelledby="modal{{ $kamars->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal{{ $kamars->id }}Label">
                                                    {{ $kamars->nama_kamar }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Kategori:
                                                    {{ $kamars->kategori ? $kamars->kategori->nama_kategori : 'Tidak Ada Kategori' }}
                                                </p>
                                                <p>Deskripsi:
                                                    {{ strip_tags(Str::limit($kamars->deskripsi, 10, $end = '...')) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var searchInput = document.querySelector('.search-input');
                                searchInput.addEventListener('input', function() {
                                    var searchTerm = this.value.trim().toLowerCase();
                                    var rooms = document.querySelectorAll('.room');

                                    rooms.forEach(function(room) {
                                        var roomName = room.querySelector('.room-name').textContent.trim()
                                            .toLowerCase();

                                        if (roomName.includes(searchTerm)) {
                                            room.style.display =
                                                'block';
                                        } else {
                                            room.style.display =
                                                'none';
                                        }
                                    });

                                    if (searchTerm === '') {
                                        rooms.forEach(function(room) {
                                            room.style.display = 'block';
                                        });
                                    }
                                });
                            });
                        </script>

                        </tbody>
                        </table>
                    </div>

                    {{-- <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                        <div class="col-auto d-flex">
                            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info">
                            </p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span
                                    class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a
                                class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span
                                    class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                        <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span
                                    class="fas fa-chevron-left"></span></button>
                            <ul class="mb-0 pagination"></ul><button class="page-link pe-0"
                                data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                        </div>
                    </div> --}}
                    {{-- <hr class="hr"> --}}

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

                        .room {
                            transition: opacity 0.3s ease;
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
                </div>
            </div>
        </div>
    </div>

    <footer class="footer position-absolute">
        <div class="row g-0 justify-content-between align-items-center h-100">
            <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 mt-2 mt-sm-0 text-900">Copyright © Small<span class="d-none d-sm-inline-block"></span><span
                        class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2024</p>
            </div>
            <div class="col-12 col-sm-auto text-center">
            </div>
        </div>
    </footer>
    </div>
@endsection
