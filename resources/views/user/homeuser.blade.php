@extends('layout_user.app')
@section('content')
    @include('sweetalert.sweetalert')
    <section class="py-0 px-xl-3">
        <div class="container px-xl-0 px-xxl-3">
            <div class="row g-3 mb-9">
                <div class="col-12 mt-4">
                    <div>
                        <img src="assets/img/banner.png" alt="Banner Image" class="rounded-3"  width="1205" height="320" margin-left: 100px;>
                        {{-- <div class="bg-holder product-bg" style="background-image:url(assets/img/banner.png);"></div>
                        <!--/.bg-holder-->
                        <div class="bg-holder shape-bg" style="background-image:url(assets/img/banner.png);"></div>
                        <!--/.bg-holder--> --}}
                        <div class="banner-text light">
                            {{-- <h2 class="text-warning-300 fw-bolder fs-lg-5 fs-xxl-6">MacBook Pro M2 <span class="gradient-text"></span></h2>
                            <h3 class="fw-bolder fs-lg-3 fs-xxl-5 text-white light">
                                <strike>Rp 13.000.000</strike>
                                <span class="small-text" style="color: red;"> (10.000.000)</span>
                            </h3> --}}
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
                    <div class="row" style="margin-left: 10px;">
                        @foreach ($kamar as $product)
                        <div class="col-12 col-sm-6 col-md-4 col-xxl-2">
                            <div class="card mb-3">
                                <a href="{{ route('detailkamar', $product->id) }}" class="text-decoration-none">
                                    <div class="position-relative">
                                        <img class="card-img-top" src="{{ asset('storage/kamar/' . $product->path_kamar) }}" alt="{{ $product->nama_kamar }}" style="object-fit: cover; height: 200px;">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title mb-2 lh-sm line-clamp-3 product-name">{{ $product->nama_kamar }}</h6>
                                        <p class="fs--1 text-1000 fw-bold">Stock {{ $product->stok }}</p>
                                        <p class="fs--1">
                                            @if (!is_null($product->rating))
                                            @if ($product->rating - floor($product->rating) < 0.5)
                                            @for ($i = 1; $i <= $product->rating; $i++)
                                            <span style="color: #ffd700;">★</span>
                                        @endfor
                                            @else
                                            @for ($i = 0; $i < ceil($product->rating); $i++)
                                            <span class="fa fa-star text-warning"></span>
                                            @endfor
                                            @endif
                                            <span class="text-500 fw-semi-bold ms-1">({{ $product->detailkamar }} people rated)</span>
                                            @else
                                            <p>There are no reviews</p>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center mb-1">
                                            <h3 class="text-1100 mb-0">Rp.{{ number_format($product->harga, 0, ',', '.') }}</h3>
                                            <div class="flex-grow-1"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
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
                        <a href="{{route('usermenu')}}" class="btn btn-lg btn-primary rounded-pill">View All Rooms</a>
                    </div>
                @endif
    </section>
@endsection
