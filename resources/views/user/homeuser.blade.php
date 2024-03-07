@extends('layout_user.app')
@section('content')
    @include('sweetalert.sweetalert')
    <section class="py-0 px-xl-3">
        <div class="container px-xl-0 px-xxl-3">
            <div class="row g-3 mb-9">
                <div class="col-12 mt-4">
                    <div class="whooping-banner w-100 rounded-3 overflow-hidden">
                        <div class="bg-holder z-index--1 product-bg"
                            style="background-image:url(assets/img/banner.png);"></div>
                        <!--/.bg-holder-->
                        <div class="bg-holder z-index--1 shape-bg"
                            style="background-image:url(assets/img/banner.png);"></div>
                        <!--/.bg-holder-->
                        <div class="banner-text light">
                            <h2 class="text-warning-300 fw-bolder fs-lg-5 fs-xxl-6">MacBook Pro M2 <span
                                    class="gradient-text"></span></h2>
                            <h3 class="fw-bolder fs-lg-3 fs-xxl-5 text-white light">
                                <strike>Rp 13.000.000</strike>
                                <span class="small-text" style="color: red;"> (10.000.000)</span>
                            </h3>
                        </div><a class="btn btn-lg btn-primary rounded-pill banner-button" href="#!">Shop Now</a>
                    </div>
                </div>
                <!-- Kategori di bawah gambar MacBook Pro M2 -->
                <div class="row g-4 mb-6">
                    <div class="col-12 col-lg-9 col-xxl-10">
                        <div class="d-flex flex-between-center mb-3">

                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- @php
                        $inwsihlist = [];
                    @endphp
                    @if(count($produk) > 0)
                    @php
                        foreach ($wishlist as $value) {
                            array_push($inwsihlist, $value->product_id);
                        }
                    @endphp --}}
                    {{-- <div class="row gx-3 gy-3" style="margin-left: -45px; margin-top:-20px;"> --}}
                        <div class="row">
                            @foreach ($Kamars as $kamar)
                            <div class="col-12 col-sm-6 col-md-4 col-xxl-3 mb-3">
                                <div class="product-card-container h-100">
                                    <div class="position-relative text-decoration-none product-card h-100">
                                        <div class="card mb-3" style="width: 100%;">
                                            <div class="position-relative text-decoration-none product-card d-flex justify-content-center align-items-center">
                                                <button data-product-id="{{ $kamar->id }}"
                                                    class="btn rounded-circle p-0 d-flex flex-center btn-wish z-index-2 d-toggle-container btn-outline-primary"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist">
                                                    <span class="fas fa-heart d-block-hover"></span>
                                                    <span class="far fa-heart d-none-hover"></span>
                                                </button>
                                                <div class="border border-1 rounded-3 d-flex justify-content-center align-items-center"
                                                    style="width: 100%; height: 200px;">
                                                    <img class="img-fluid rounded-3"
                                                        src="{{ asset('storage/kamar/' . $kamar->path_kamar) }}"
                                                        style="max-width: 80%; object-fit: cover; height: auto;" />
                                                </div>
                                            </div>
                                            <div class="card-body  mt-3">
                                                {{-- <a href="{{ route('detail.kamar', $kamar->id) }}" class="stretched-link"> --}}
                                                <h6 class="card-title mb-0 lh-sm line-clamp-3 product-name"
                                                    style="font-weight: bold; font-family: 'Nunito Sans', sans-serif;">
                                                    {{ $kamar->nama_kamar }}
                                                </h6>
                                                <h3 class="text-900 mb-0" style="font-size: 1rem; margin-top: 20px;">
                                                    Rp.{{ number_format($kamar->harga, 0, ',', ',') }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
    </section>
@endsection
