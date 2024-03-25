@extends('layout_user.app')
@section('content')
    @include('sweetalert.sweetalert')
    <section class="py-0 px-xl-3">
        <div class="container px-xl-0 px-xxl-3">
            <div class="row g-3 mb-9">
                <div>
                    <div class="swiper-theme-container">
                        <div class="swiper-container theme-slider" data-swiper='{"autoplay":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"slideToClickedSlide":true}'>
                            <div class="swiper-wrapper">
                                {{-- Tampilkan kamar dengan diskon --}}
                                @foreach ($kamars as $kamar)
                                    @if ($kamar->kategori->diskons->isNotEmpty())
                                        @foreach ($kamar->kategori->diskons as $diskon)
                                            <div class="swiper-slide">
                                                <div class="whooping-banner w-100 rounded-3 overflow-hidden single-banner"
                                                    style="background-image: url({{ asset('storage/kamar/' . $kamar->path_kamar) }}); background-size: cover; background-position: center; object-fit: cover;">
                                                    <div class="bg-holder z-index--1 product-bg"></div>
                                                    <!--/.bg-holder-->
                                                    <div class="bg-holder z-index--1 shape-bg"></div>
                                                    <!--/.bg-holder-->
                                                    <div class="banner-text light">
                                                        <h2 class="text-warning-300 fw-bolder fs-lg-5 fs-xxl-6"
                                                            style="font-family: 'Poppins', sans-serif;">
                                                            {{ $kamar->kategori->nama }}
                                                            <span class="gradient-text"></span>
                                                        </h2>
                                                        <div class="kamar-info">
                                                            <p style="font-family: 'Poppins', sans-serif; font-size: 50px; font-weight: bold; color: #ffffff;">
                                                                <strong>{{ $kamar->nama_kamar }}</strong>
                                                            </p>
                                                        </div>
                                                        <h3 class="fw-bolder fs-lg-3 fs-xxl-5 text-white light">
                                                            <strike>{{ 'Rp. ' . number_format($kamar->harga, 0, ',', '.') }}</strike>
                                                            @php
                                                                $harga_setelah_diskon = $kamar->harga;
                                                                if ($diskon->jenis == 'percentage') {
                                                                    $diskon_harga = ($kamar->harga * $diskon->potongan_harga) / 100;
                                                                    $harga_setelah_diskon -= $diskon_harga;
                                                                    $diskon_label = $diskon->potongan_harga . '% Off';
                                                                } else {
                                                                    $harga_setelah_diskon -= $diskon->potongan_harga;
                                                                    $diskon_label = 'Rp. ' . number_format($diskon->potongan_harga, 0, ',', '.') . ' Off';
                                                                }
                                                            @endphp
                                                            <span class="small-text"
                                                                style="color: red; font-size: 18px;">{{ $diskon_label }}</span>
                                                        </h3>
                                                        <span class="small-text"
                                                            style="color: red; font-size: 30px; font-weight: bold;"> {{ 'Rp. ' . number_format($harga_setelah_diskon, 0, ',', '.') }}</span>
                                                    </div>
                                                    <a href="{{ route('detailkamar', $kamar->id) }}"
                                                        class="btn btn-lg btn-primary rounded-pill banner-button stretched-link">Booking
                                                        Sekarang</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
               <!-- Kategori di bawah gambar MacBook Pro M2 -->
        <div class="row gx-3 gy-6 mb-8">
            @foreach ($kamars as $product)
                <div class="col-12 col-sm-6 col-md-4 col-xxl-2">
                    <div class="product-card-container h-100">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div>
                                    <div class="border border-1 rounded-3 position-relative mb-3">
                                        {{-- <button class="btn rounded-circle p-0 d-flex flex-center btn-wish z-index-2 d-toggle-container btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist">
                                            <span class="fas fa-heart d-block-hover"></span>
                                            <span class="far fa-heart d-none-hover"></span>
                                        </button> --}}
                                        <img class="img-fluid" src="{{ asset('storage/kamar/' . $product->path_kamar) }}" alt="" />
                                    </div>
                                    <a class="stretched-link" href="{{ route('detailkamar', $product->id) }}">
                                        <h6 class="mb-2 lh-sm product-name" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->deskripsi }}</h6>
                                    </a>
                                    <p class="fs--1">
                                        @if ($totalUlasans[$product->id] > 0)
                                        @php
                                            $rating = $ratings[$product->id];
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
                                        <span class="text-primary fw-semi-bold mb-2"> ({{ $totalUlasans[$product->id] }} orang memberi rating)</span>
                                    @else
                                        @for ($i = 0; $i < 5; $i++)
                                            <span class="fa fa-star text-secondary"></span>
                                        @endfor
                                        <span class="text-secondary fw-semi-bold mb-2">(Tidak Ada Ulasan)</span>
                                    @endif
                                    </p>
                                </div>
                                {{-- <div>
                                    <p class="fs--1 text-700 mb-2">dbrand skin available</p>
                                    <div class="d-flex align-items-center mb-1">
                                        <p class="me-2 text-900 text-decoration-line-through mb-0">$125.00</p>
                                        <h3 class="text-1100 mb-0">Rp.{{ number_format($product->harga, 0, ',', '.') }}</h3>
                                    </div>
                                    <p class="text-700 fw-semi-bold fs--1 lh-1 mb-0">2 colors</p>
                                </div> --}}
                                <div class="row align-items-center">
                                    <div class="col">
                                        @php
                                            $diskon_tersedia = false;
                                            $harga_awal = $product->harga; // Mengambil harga dari setiap item kamar
                                            $harga_setelah_diskon = $harga_awal;
                                            $diskon = null;
                                        @endphp
                                        @foreach ($diskons as $diskon_item)
                                            @if ($diskon_item->kategori_id === $product->kategori_id)
                                                @php
                                                    $diskon = $diskon_item;
                                                    $diskon_tersedia = true;
                                                    if ($diskon->jenis == 'percentage') {
                                                        $diskon->diskon = ($harga_awal * $diskon->potongan_harga) / 100;
                                                        $harga_setelah_diskon = $harga_awal - $diskon->diskon;
                                                    } else {
                                                        $harga_setelah_diskon = $harga_awal - $diskon->potongan_harga;
                                                    }
                                                @endphp
                                                @break
                                            @endif
                                        @endforeach
                                        <div class="d-flex align-items-center">
                                            @if ($diskon_tersedia && \Carbon\Carbon::now() <= \Carbon\Carbon::parse($diskon->akhir_berlaku))
                                                <span class="text-body-quaternary text-decoration-line-through fs-0 me-1" style="opacity: 0.5;">
                                                    Rp.{{ number_format($harga_awal, 0, ',', '.') }}
                                                </span>
                                            @endif
                                            <h3 class="text-1100 mb-0 me-3">
                                                Rp.{{ number_format($harga_setelah_diskon, 0, ',', '.') }}
                                            </h3>
                                            @if ($diskon && property_exists($diskon, 'potongan_harga') && $diskon->kategori_id == $product->kategori_id)
                                                <div class="text-warning">
                                                    @if ($diskon->potongan_harga > 100)
                                                        {{-- Rp.{{ number_format($diskon->potongan_harga, 0, ',', '.') }} --}}
                                                    @else
                                                        {{ $diskon->potongan_harga }}%
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col flex-grow-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
