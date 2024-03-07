@extends('layout_user.app')
@section('content')
    @include('sweetalert.sweetalert')
    <section class="py-0 px-xl-3">
        <div class="container px-xl-0 px-xxl-3">
            <div class="row g-3 mb-9">
                <div class="col-12 mt-4">
                    <div class="whooping-banner w-100 rounded-3 overflow-hidden">
                        <div class="bg-holder z-index--1 product-bg"
                            style="background-image:url(assets/img/benner4.png);background-position: bottom right;"></div>
                        <!--/.bg-holder-->
                        <div class="bg-holder z-index--1 shape-bg"
                            style="background-image:url(assets/img/benner4.png);background-position: bottom left;"></div>
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
                    @php
                        $inwsihlist = [];
                    @endphp
                    @if(count($kamar) > 0)
                    {{-- @php
                        foreach ($wishlist as $value) {
                            array_push($inwsihlist, $value->product_id);
                        }
                    @endphp --}}
                        @foreach ($kamar as $product)
                            <div class="col-12 col-sm-6 col-md-4 col-xxl-2">
                                <div class="product-card-container h-100">
                                    <div class="position-relative text-decoration-none product-card h-100">
                                        <div class="card mb-3" style="width: 300px; height: 470px;">
                                            <div class="position-relative text-decoration-none product-card">
                                                <div class="border border-1 rounded-3 position-relative">
                                                    {{-- @if(!in_array($product->id, $inwsihlist)) --}}
                                                        {{-- <button data-product-id="{{ $product->id }}"
                                                            class="btn rounded-circle p-0 d-flex flex-center btn-wish z-index-2 d-toggle-container btn-outline-primary"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to wishlist">
                                                            <span class="fas fa-heart d-block-hover"></span>
                                                            <span class="far fa-heart d-none-hover"></span>
                                                        </button> --}}
                                                    {{-- @endif --}}
                                                    <img class=""
                                                        src="{{ asset('storage/kamar/' . $product->path_kamar) }}"
                                                        alt="{{ $product->nama_kamar }}"
                                                        style="width: 298px; height: 200px; border-radius: 6px; object-fit: cover" />
                                                </div>
                                                <div class="card-body">
                                                    <a href="#" class="stretched-link">
                                                        <h6 class="card-title mb-2 lh-sm line-clamp-3 product-name">
                                                            {{ $product->nama_kamar }}</h6>
                                                    </a>
                                                    <p class="fs--1 text-1000 fw-bold ">Stock {{ $product->stok }}</p>
                                                    <p class="fs--1">
                                                        @if (!is_null($product->rating))
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
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="d-flex align-items-center mb-1">
                                                        <h3 class="text-1100 mb-0">
                                                            Rp.{{ number_format($product->harga, 0, ',', '.') }}</h3>
                                                        <div class="flex-grow-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 70%;">
                                    <img src="{{ asset('assets/img/No data-amico.svg') }}" alt="" style="width: 300px; height: auto; max-width: 100%; display: block; margin: 0 auto;">
                                    <h3 class="mb-3">There are no products added by admin yet. Please check back later.</h3>
                                </div>
                            </td>
                        </tr>
                    @endif
                </div>
                @if(count($kamar) > 0)
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-lg btn-primary rounded-pill">View All Rooms</a>
                    </div>
                @endif
    </section>
@endsection
