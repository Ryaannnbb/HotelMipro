@extends('layout_admin.app')

@section('content')
    @include('sweetalert.sweetalert')
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
        <style>
            #imagePreview {
                text-align: center;
            }

            #imagePreview img {
                max-width: 100%;
                max-height: 200px;
                /* Atur tinggi maksimum sesuai kebutuhan */
                object-fit: contain;
                margin-top: 10px;
            }

            .card {
                height: 100%;
            }
        </style>

        <form class="mb-9" action="{{ route('diskon.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 flex-between-end mb-5">
                <div class="col-auto">
                    <h2 class="mb-2">Add a rooms</h2>
                    <h5 class="text-700 fw-semi-bold">Orders placed across your store</h5>
                </div>
                <div class="col-auto">
                    <a class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" href="{{ route('diskon') }}">Discard</a>
                    <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Publish Rooms</button>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-12 col-xl-8">
                    <!-- Konten form di sini -->
                    <h4 class="mb-3">Discount Title</h4>
                    <input class="form-control mb-2 @error('nama_diskon') is-invalid @enderror" type="text"
                        name="nama_diskon" value="{{ old('nama_diskon') }}" placeholder="Write title here..." />

                    @error('nama_diskon')
                        <strong class="invalid-feedback">
                            {{ $message }}
                        </strong>
                    @enderror

                    <div class="mb-6">
                        <h4 class="mb-3">Discount Description</h4>
                        <textarea class="tinymce @error('deskripsi') is-invalid @enderror" name="deskripsi"
                            data-tinymce='{"height":"15rem","placeholder":"Write a description here...","plugins": "nonbreaking"}'>
                            {{ old('deskripsi') }}
                        </textarea>

                        @error('deskripsi')
                            <strong class="invalid-feedback">
                                {{ $message }}
                            </strong>
                        @enderror
                    </div>

                    <h4 class="mb-3">Display images</h4>
                    <div class="mb-3">
                        <div id="imagePreview" class="mt-2"></div>
                        <div class="d-flex align-items-center flex-column">
                            <input type="file" name="gambar" id="formFile"
                                class="form-control   @error('gambar') is-invalid @enderror" value="{{ old('gambar') }}">
                            <img class="mt-2" id="image-preview" src="#" alt="Preview"
                                style="display: none; width: 50%; height: auto; border-radius: 5px">
                        </div>
                    </div>
                    @error('gambar')
                        <strong class="invalid-feedback">
                            {{ $message }}
                        </strong>
                    @enderror
                    <script>
                        document.getElementById('formFile').addEventListener('change', function(e) {
                            const file = e.target.files[0];
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('image-preview').src = e.target.result;
                                document.getElementById('image-preview').style.display = 'block';
                            }
                            reader.readAsDataURL(file);
                        });
                    </script>
                </div>

                <div class="col-12 col-xl-4" style="margin-top: 70px;">
                    <div class="row g-2 order-xl-last">
                        <div class="col-12 col-xl-12 order-xl-first">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Organize</h4>
                                    <div class="row gx-3">
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-4">
                                                <div class="d-flex flex-wrap mb-2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-3">
                                                <h5 class="mb-2 text-1000">Type</h5>
                                                <select class="form-select @error('jenis') is-invalid @enderror" id="organizerSingle" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}' name="jenis">
                                                    <option value="">Select organizer...</option>
                                                    <option value="nominal" @selected(old('jenis') == 'nominal')>Nominal
                                                    </option>
                                                    <option value="percentage" @selected(old('jenis') == 'percentage')>Percentage
                                                    </option>
                                                </select>
                                                @error('jenis')
                                                    <strong class="invalid-feedback">
                                                        {{ $message }}
                                                    </strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-4">
                                                <h5 class="mb-2 text-1000">Discount</h5>
                                                <input
                                                    class="form-control mb-xl-3 @error('potongan_harga') is-invalid @enderror"
                                                    type="number" name="potongan_harga"
                                                    value="{{ old('potongan_harga') }}" placeholder="Best price" />
                                                @error('potongan_harga')
                                                    <strong class="invalid-feedback">
                                                        {{ $message }}
                                                    </strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-4">
                                                <h5 class="mb-2 text-1000">Start Effects</h5>
                                                <input class="form-control datetimepicker start-date @error('awal_berlaku') is-invalid @enderror" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true,"dateFormat":"d-m-Y"}' name="awal_berlaku" />
                                                @error('awal_berlaku')
                                                    <strong class="invalid-feedback">
                                                        {{ $message }}
                                                    </strong>
                                                @enderror
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var datepickers = document.querySelectorAll('.start-date');
                                                        var oldValue = '{{ old("awal_berlaku") }}';

                                                        if (oldValue) {
                                                            datepickers.forEach(function(datepicker) {
                                                                datepicker.value = oldValue;
                                                            });
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-4">
                                                <h5 class="mb-2 text-1000">End Effects</h5>
                                                <input class="form-control datetimepicker end-date @error('akhir_berlaku') is-invalid @enderror" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true,"dateFormat":"d-m-Y"}' name="akhir_berlaku"  />
                                                @error('akhir_berlaku')
                                                    <strong class="invalid-feedback">
                                                        {{ $message }}
                                                    </strong>
                                                @enderror
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var datepickers = document.querySelectorAll('.end-date');
                                                        var oldValue = '{{ old("akhir_berlaku") }}';

                                                        if (oldValue) {
                                                            datepickers.forEach(function(datepicker) {
                                                                datepicker.value = oldValue;
                                                            });
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-xl-12">
                                            <div class="mb-4">
                                                <h5 class="mb-2 text-1000">Add Categori discount</h5>
                                                <select class="form-select @error('nama_kategori') is-invalid @enderror" id="organizerMultiple" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}' name="nama_kategori[]">
                                                <option value="">Select kategori...</option>
                                                @foreach ($kategori as $kategoris)
                                                <option value="{{ $kategoris->id }}" {{ !is_null(old('nama_kategori')) && in_array($kategoris->id, old('nama_kategori')) ? 'selected' : '' }}>
                                                    {{ $kategoris->nama_kategori }}
                                                </option>
                                                @endforeach
                                                </select>
                                                @error('nama_kategori')
                                                    <strong class="invalid-feedback">
                                                        {{ $message }}
                                                    </strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="products"
                data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":5 ,"pagination":true}'>
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            {{-- <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                                    class="form-control search-input search" type="search" placeholder="Search rooms"
                                    aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form> --}}
                        </div>
                    </div>
                </div>
                <div
                    class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
                    <div class="table-responsive scrollbar mx-n1 px-1">
                        <table class="table fs--1 mb-0">
                            <thead>
                                <tr>
                                    <th class="white-space-nowrap text-start align-middle ps-4 fs--1 text-dark"
                                        data-sort="text start">NO</th>
                                    <th class="white-space-nowrap text-center align-middle ps-4 fs--1 text-dark"
                                        data-sort="path_produk">IMAGE</th>
                                    <th class="white-space-nowrap text-center align-middle ps-4 fs--1 text-dark"
                                        data-sort="path_nama">DISCOUNT NAME</th>
                                    <th class="white-space-nowrap align-middle text-center fs--1 ps-4 text-dark"
                                        data-sort="harga">DISCOUNT</th>
                                    <th class="white-space-nowrap text-center align-middle fs--1 ps-4 text-dark"
                                        data-sort="categori">TYPE</th>
                                    <th class="white-space-nowrap text-center align-middle fs--1 ps-4 text-dark"
                                        data-sort="categori">DESCRIPTION</th>
                                    <th class="white-space-nowrap text-center align-middle fs--1 ps-4 text-dark"
                                        data-sort="stok">START EFFECTS</th>
                                    <th class="white-space-nowrap text-center align-middle fs--1 ps-4 text-dark"
                                        data-sort="deskripsi">END EFFECTS</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="products-table-body text-center">
                                @foreach ($diskon as $diskons)
                                    <tr class="position-static">
                                        <td class="align-middle review fs-0 text-start ps-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="align-middle white-space-nowrap mx-auto text-center py-0">
                                            <img src="{{ asset('storage/kamar/' . $diskons->gambar) }}"
                                                alt="" width="50%" height="50" style="object-fit: cover;"
                                                class="mx-auto rounded-3" />
                                        </td>
                                        <td class="category text-center ellipsis-text col-1">
                                            <p class="fw-semi-bold fs--1 line-clamp-3 mb-0">
                                                {{ Str::limit($diskons->nama_diskon, 10, $end = '...') }}</p>
                                        </td>
                                        <td
                                            class="price text-center white-space-nowrap fw-bold fs--1  text-700 ps-4">
                                            {{ 'Rp ' . number_format($diskons->potongan_harga, 0, ',', '.') }}</td>
                                        <td class="tags text-center review pb-2 ps-3 fs--1 ">
                                            {{ $diskons->jenis }}
                                        </td>
                                        <td class="ellipsis-text text-center col-1">
                                            {{ strip_tags(Str::limit($diskons->deskripsi, 10, $end = '...')) }}</td>
                                                                        <td class="produks text-center ps-4">
                                                                            <span
                                                                                class="fw-semi-bold fs--1 line-clamp-3 mb-0">{{ is_null($diskons->awal_berlaku) ? '-' : date('d F Y', strtotime($diskons->awal_berlaku)) }}</span>
                                                                        </td>
                                                                        <td class="produks text-center ps-4">
                                                                            <span
                                                                                class="fw-semi-bold fs--1 line-clamp-3 mb-0">{{ is_null($diskons->akhir_berlaku) ? '-' : date('d F Y', strtotime($diskons->akhir_berlaku)) }}</span>
                                                                        </td>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
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
            </div>
            </div>
            </div>
        </form>
    @endsection
