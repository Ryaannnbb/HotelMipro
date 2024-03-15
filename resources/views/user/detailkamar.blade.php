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
</style>
<div class="pt-5 pb-9">
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-0">
        <div class="container-small">
            @foreach ($kamar as $detail)
            <section class="py-0 mt-5">
                <div class="container-small">
                    <div class="row g-5 mb-5 mb-lg-8" data-product-details="data-product-details">
                        <div class="col-12 col-lg-6">
                            <div class="row g-3 mb-3">
                                <div class="col-12 col-md-2 col-lg-12 col-xl-2">
                                    <div class="swiper-products-thumb swiper swiper-container theme-slider overflow-visible"
                                        id="swiper-products-thumb"></div>
                                </div>
                                <div class="col-12 col-md-10 col-lg-12 col-xl-10">
                                    <div class="d-flex align-items-center border rounded-3 text-center p-5 h-100">
                                        <div style="position: relative; width: 100%; height: 100%;">
                                            <img src="{{ asset('storage/kamar/' . $detail->path_kamar) }}" alt=""
                                                style="object-fit: cover; width: 100%; height: 100%; position: absolute; top: 0; left: 0;" />
                                        </div>
                                                <div class="swiper swiper-container theme-slider"
                                                    data-thumb-target="swiper-products-thumb"
                                                    data-products-swiper='{"slidesPerView":1,"spaceBetween":16,"thumbsEl":".swiper-products-thumb"}'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <div class="">
                                            <h3 style="display: block; overflow-wrap: break-word; word-wrap: break-word;"
                                                class="mb-3 lh-sm text-right">{{ ucfirst($detail->nama_kamar) }}</h3>
                                            <div class="d-flex flex-wrap align-items-center justify-content-end">
                                                <h1>Rp.{{ number_format($detail->harga, 0, ',', '.') }}</h1>
                                            </div>
                                            <p class="mb-2 text-800 text-right"><strong class="text-1000">Description:</strong>
                                            <p class="mb-2 text-800 text-right">
                                                <strong class="text-1000"
                                                    style="display: block; overflow-wrap: break-word; word-wrap: break-word;">
                                                    {{ strip_tags($detail->deskripsi) }}
                                                </strong>
                                            </p>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                <div class="d-flex">
                    <a href="{{ route('pesanan', ['id' => $id]) }}"
                        class="btn btn-lg btn-warning rounded-pill w-50 fs--1 fs-sm-0">
                        <span class="fas fa-shopping-cart me-2"></span>Checkout
                    </a>
                </div>


    <!-- ============================================-->

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-0">
        <div class="container-small">
            <ul class="nav nav-underline mb-4" id="productTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="reviews-tab" data-bs-toggle="tab" href="#tab-reviews"
                        role="tab" aria-controls="tab-reviews" aria-selected="false">Ratings reviews</a>
                </li>
                {{-- <li class="nav-item"><a class="nav-link active" id="description-tab" data-bs-toggle="tab"
                        href="#tab-description" role="tab" aria-controls="tab-description"
                        aria-selected="true">Description</a></li> --}}
                {{-- <li class="nav-item"><a class="nav-link" id="specification-tab" data-bs-toggle="tab"
                        href="#tab-specification" role="tab" aria-controls="tab-specification"
                        aria-selected="false">Specification</a></li> --}}
            </ul>

                        <div class="tab-pane pe-lg-6 pe-xl-12 fade show active text-1100" id="reviews-tab">
                        {{-- <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="reviews-tab"> --}}
                            <div class="bg-white rounded-3 p-4 border border-200">
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
                                                <span class="text-primary fw-semi-bold mb-2"> ({{ $totalUlasan }} people rated)</span>
                                            @else
                                                <h3 class="me-n2">There are no reviews</h3>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-auto"><button class="btn btn-primary rounded-pill"
                                            data-bs-toggle="modal" data-bs-target="#reviewModal">Rate this
                                            product</button>
                                            <div class="modal fade" id="reviewModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content p-4">
                                                        <div class="d-flex flex-between-center mb-2">
                                                            <h5 class="modal-title fs-0 mb-0">Your rating</h5>
                                                            {{-- <button></button> <!-- Perlu tag penutup yang sesuai untuk button --> --}}
                                                        </div>
                                                        <form method="POST" action="{{ route('detailkamar.store') }} " enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <div class="rating" style="transform: rotate(180deg)">
                                                                    <input type="radio" name="rating" id="star5" value="5">
                                                                    <label for="star5" style="rotate: 35deg">&#9733;</label>
                                                                    <input type="radio" name="rating" id="star4" value="4">
                                                                    <label for="star4" style="rotate: 35deg">&#9733;</label>
                                                                    <input type="radio" name="rating" id="star3" value="3">
                                                                    <label for="star3" style="rotate: 35deg">&#9733;</label>
                                                                    <input type="radio" name="rating" id="star2" value="2">
                                                                    <label for="star2" style="rotate: 35deg">&#9733;</label>
                                                                    <input type="radio" name="rating" id="star1" value="1">
                                                                    <label for="star1" style="rotate: 35deg">&#9733;</label>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="commentInput" class="">Your Comment</label>
                                                                    <textarea class="form-control" id="commentInput" rows="3" name="ulasan"></textarea>
                                                                    <input type="hidden" name="id" value="{{ $kamar->first()->id }}">
                                                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="image">Upload Image:</label>
                                                                    <input type="file" class="form-control-file" id="foto" name="foto">
                                                                </div>
                                                            </div>
                                                            {{-- <div class="d-sm-flex flex-between-center">
                                                                <div class="form-check flex-1">
                                                                    <input class="form-check-input" id="reviewAnonymously" type="checkbox" value="" checked>
                                                                    <label class="form-check-label mb-0 text-1100 fw-semi-bold" for="reviewAnonymously">Review anonymously</label>
                                                                </div> --}}
                                                                <button class="btn ps-0" data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary rounded-pill">Submit</button>
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
                                                    <span class="text-800 ms-1" style="margin-left: 10px; margin-top: 3px;  font-weight: bold;">By</span>
                                                    <!-- Tampilkan nama pengguna -->
                                                    <h5 class="lh-sm text-800 d-flex align-items-center" style="margin-left: 10px; margin-top: 6px; font-weight: bold;">{{ $u->user->name }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="ml-auto">
                                                    <div class="font-sans-serif btn-reveal-trigger position-static">
                                                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal"
                                                                type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                                                aria-expanded="false" data-bs-reference="parent">
                                                            <span class="fas fa-ellipsis-h fs--2"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2">
                                                            {{-- <div class="dropdown-divider"></div> --}}
                                                            <form action="{{ route('detailkamar.delete', $u->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                class="dropdown-item text-danger hapus">Remove</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-700 fs--1 mb-1">
                                            {{ Carbon::parse($u->created_at)->diffForHumans(null, true) }} ago
                                        </p>
                                        <div class="text-1000 mb-3">
                                            <span style="margin-right: 5px;">{{ $u->ulasan }}</span>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-auto">
                                                @if ($u->foto !== null)
                                                    <img class="card-img-top" src="{{ asset('storage/kamar/' . $u->foto) }}" alt="{{ $u->nama_kamar }}" style="object-fit: cover; height: 200px;">
                                                {{-- @else
                                                    <img class="card-img-top" src="{{ asset('path/ke/gambar/default.jpg') }}" alt="Default Image" style="object-fit: cover; height: 200px;"> --}}
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>


@endforeach
@endsection
