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
                    <h2 class="mb-0">Rooms</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item">
                    <p class="nav-link active my-n2" aria-current="page"><span>All </span><span class="text-700 fw-semi-bold" >
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
                        <div class="row">
                            @foreach ($kamar as $kamars)
                                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 mb-4">
                                    <div class="card">
                                        <img src="{{ asset('storage/kamar/' . $kamars->path_kamar) }}" class="card-img-top" alt="Room Image">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ Str::limit($kamars->nama_kamar, 20, '...') }}</h5>
                                            <p class="card-text fs-6">Price: <span class="fw-bold">{{ 'Rp ' . number_format($kamars->harga, 0, ',', '.') }}</span></p>
                                            <p class="card-text">Category: {{ $kamars->kategori ? $kamars->kategori->nama_kategori : 'Tidak Ada Kategori' }}</p>
                                            <p class="card-text"><span class="badge badge-success">{{ $kamars->status }}</span></p>
                                            <p class="card-text">{{ strip_tags(Str::limit($kamars->deskripsi, 50)) }}</p>
                                            <div class="btn-group">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{ route('kamar.edit', $kamars->id) }}">Edit</a></li>
                                                    <li>
                                                        <form action="{{ route('kamar.destroy', $kamars->id) }}" method="POST" class="hapus-form">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item text-danger">Remove</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                                </tbody>
                            </table>
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
                        </div>
                    </div>
                </div>
            </div>

                    <footer class="footer position-absolute">
        <div class="row g-0 justify-content-between align-items-center h-100">
          <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 mt-2 mt-sm-0 text-900">Copyright © Small<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2024</p>
          </div>
          <div class="col-12 col-sm-auto text-center">
          </div>
        </div>
      </footer>
    </div>

@endsection
