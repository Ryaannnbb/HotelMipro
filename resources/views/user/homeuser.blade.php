@extends('layout_user.app')
@section('content')
    @include('sweetalert.sweetalert')
    <section class="py-0 px-xl-3">
        <div class="container px-xl-0 px-xxl-3">
            <div class="row g-3 mb-9">
                <style>
                    .whooping-banner {
                        position: relative;
                        overflow: hidden;
                    }

                    .whooping-banner::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: rgba(0, 0, 0, 0.5);
                        z-index: 1;
                    }

                    .banner-text {
                        position: absolute;
                        top: 50%;
                        left: 0;
                        transform: translateY(-50%);
                        z-index: 2;
                        padding: 0 20px;
                    }

                    .banner-text h2 {
                        color: #ffcc00;
                        font-size: 24px;
                        font-family: 'Poppins', sans-serif;
                        margin-top: 50px;
                        text-shadow: none;
                        /* Tidak ada bayangan pada judul */
                    }

                    .banner-text .fasilitas {
                        color: #ffffff;
                        font-size: 20px;
                        font-weight: bold;
                        margin-bottom: 10px;
                        text-shadow: none;
                        /* Tidak ada bayangan pada fasilitas */
                    }

                    .banner-text p {
                        color: #ffffff;
                        font-size: 18px;
                        font-family: 'Poppins', sans-serif;
                        margin-bottom: 10px;
                        text-shadow: none;
                        /* Tidak ada bayangan pada deskripsi */
                    }
                </style>


                @include('sweetalert.sweetalert')
                <section class="py-0 px-xl-3">
                    <div class="container px-xl-0 px-xxl-3">
                        <div class="row g-3 mb-9">
                            <div class="swiper-theme-container">
                                <div class="swiper-container theme-slider"
                                    data-swiper='{"autoplay":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"slideToClickedSlide":true}'>
                                    <div class="swiper-wrapper">
                                        @foreach ($sliders as $slider)
                                            <div class="swiper-slide">
                                                <div class="whooping-banner w-100 rounded-3 overflow-hidden single-banner"
                                                    style="background-image: url('{{ asset('storage/kamar/' . $slider->path_kamar) }}'); background-size: cover; background-position: center; height: 400px; width: 100%; filter: brightness(0.7);">
                                                    <div class="banner-text light text-left">
                                                        <h2 class="text-warning-300 fw-bolder fs-lg-5 fs-xxl-6 mb-3">
                                                            {{ $slider->judul }}
                                                            <span class="gradient-text"></span>
                                                        </h2>
                                                        <h2 class="text-white fw-bolder">
                                                            Mulai dari harga Rp
                                                            {{ number_format($slider->harga, 0, ',', '.') }}
                                                            <span class="gradient-text"></span>
                                                        </h2>
                                                        </h2>
                                                        @if (!empty($slider->fasilitas))
                                                            <p class="fasilitas">
                                                                Fasilitas Terbaru: {{ $slider->fasilitas }}
                                                            </p>
                                                        @endif
                                                        @if (!empty($slider->diskon))
                                                            <p class="text-white ">
                                                                Diskon: {{ $slider->diskon }}%
                                                            </p>
                                                        @endif
                                                        <p class="text-white ">
                                                            {!! $slider->deskripsi !!}
                                                        </p>
                                                        <div>
                                                            <a href="{{ route('usermenu') }}"
                                                                class="btn btn-lg btn-primary rounded-pill banner-button stretched-link">Booking
                                                                Sekarang</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



                {{-- Tampilkan "Small Hotel" jika tidak ada slider --}}
                @if ($sliders->isEmpty())
                    <div class="swiper-slide">
                        <div class="whooping-banner w-100 rounded-3 overflow-hidden single-banner"
                            style="background-image: url('/asset/img/1.jpg'); background-size: cover; background-position: center;">
                            <div class="bg-holder z-index--1 product-bg"></div>
                            <!--/.bg-holder-->
                            <div class="bg-holder z-index--1 shape-bg"></div>
                            <!--/.bg-holder-->
                            <div class="banner-text light">
                                <h2 class="text-warning-300 fw-bolder fs-lg-5 fs-xxl-6"
                                    style="font-family: 'Poppins', sans-serif;">
                                    Small Hotel<span class="gradient-text"></span></h2>
                            </div>
                            <a href="{{ route('usermenu') }}"
                                class="btn btn-lg btn-primary rounded-pill banner-button stretched-link">Booking
                                Sekarang</a>
                        </div>
                    </div>
                @endif
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
                                        <img class="img-fluid" src="{{ asset('storage/kamar/' . $product->path_kamar) }}"
                                            alt="" />
                                    </div>
                                    <a class="stretched-link" href="{{ route('detailkamar', $product->id) }}">
                                        <h6 class="mb-2 lh-sm product-name"
                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            {{ $product->deskripsi }}</h6>
                                    </a>
                                    <p class="fs--1">
                                        @if ($totalUlasans[$product->id] > 0)
                                            @php
                                                $rating = $ratings[$product->id];
                                                $whole = floor($rating); // Bagian integer dari rating
                                                $fraction = $rating - $whole; // Bagian desimal dari rating
                                            @endphp

                                            @for ($i = 0; $i < $whole; $i++)
                                                <span class="fa fa-star text-warning"></span>
                                            @endfor

                                            @if ($fraction >= 0.25 && $fraction < 0.75)
                                                <span class="fa fa-star-half text-warning"></span>
                                            @endif

                                            <span class="text-primary fw-semi-bold mb-2">
                                                ({{ $totalUlasans[$product->id] }} orang memberi rating)
                                            </span>
                                        @else
                                            @for ($i = 0; $i < 5; $i++)
                                                <span class="fa fa-star text-secondary"></span>
                                            @endfor

                                            <span class="text-secondary fw-semi-bold mb-2">
                                                (Tidak Ada Ulasan)
                                            </span>
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
                                            <span class="text-body-quaternary text-decoration-line-through fs-0 me-1"
                                                style="opacity: 0.5;">
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
