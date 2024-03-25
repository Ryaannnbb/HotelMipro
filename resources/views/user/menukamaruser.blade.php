@extends('layout_user.app')
@section('content')
    {{-- @include('sweetalert.sweetalert') --}}
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}"
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}"
            });
        </script>
    @endif
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            appearance: textfield;
        }

        .btn-transparent {
            background-color: transparent;
            border-color: transparent;
        }
    </style>
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-5 pb-9">
        <div class="product-filter-container"><button class="btn btn-sm btn-phoenix-secondary text-700 mb-5 d-lg-none"
                data-phoenix-toggle="offcanvas" data-phoenix-target="#productFilterColumn"> <span
                    class="fa-solid fa-filter me-2"></span>Filter</button>
            <div class="row">
                <div class="col-lg-3 col-xxl-2 ps-2 ps-xxl-3">
                    <form action="">
                        <div class="product-filter-offcanvas bg-soft scrollbar phoenix-offcanvas phoenix-offcanvas-fixed"
                            id="productFilterColumn">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="mb-0">Filter</h3><button class="btn d-lg-none p-0"
                                    data-phoenix-dismiss="offcanvas"><span class="uil uil-times fs-0"></span></button>
                            </div><a class="btn px-0 d-block collapse-indicator" data-bs-toggle="collapse"
                                href="#collapseDevice" role="button" aria-expanded="true" aria-controls="collapseDevice">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div class="fs-0 text-1000">Kategori</div><span
                                        class="fa-solid fa-angle-down toggle-icon text-500"></span>
                                </div>
                            </a>
                            <div class="collapse show" id="collapseDevice">
                                <div class="mb-2">
                                    @foreach ($kategori as $kategoris)
                                        <div class="form-check mb-0">
                                            <input class="form-check-input mt-0" id="kategori{{ $kategoris->id }}"
                                                type="checkbox" name="kategori[]" value="{{ $kategoris->id }}"
                                                onchange="showSelectedCategories()"
                                                {{ is_array($selectedCategories) && in_array($kategoris->id, $selectedCategories) ? 'checked' : '' }}>
                                            <label class="form-check-label d-block lh-sm fs-0 text-900 fw-normal mb-0"
                                                for="kategori{{ $kategoris->id }}">
                                                {{ $kategoris->nama_kategori }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <a class="btn px-0 y-4 d-block collapse-indicator" data-bs-toggle="collapse"
                                href="#collapseRating" role="button" aria-expanded="true" aria-controls="collapseRating">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div class="fs-0 text-1000">Rating</div><span
                                        class="fa-solid fa-angle-down toggle-icon text-500"></span>
                                </div>
                            </a>
                            <div class="collapse show" id="collapseRating">
                               <!-- Radio button 1 -->
<div class="d-flex align-items-center mb-1">
    <input class="form-check-input me-3 rating-radio" id="flexRadio5" type="radio" name="flexRadio"
           value="5" data-rating="5" {{ session('selectedRating') == '5' ? 'checked' : '' }}>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
</div>

<!-- Radio button 2 -->
<div class="d-flex align-items-center mb-1">
    <input class="form-check-input me-3 rating-radio" id="flexRadio4" type="radio" name="flexRadio"
           value="4" data-rating="4" {{ session('selectedRating') == '4' ? 'checked' : '' }}>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa-regular fa-star text-warning-300 fs--1 me-1"></span>
    {{-- <p class="ms-1 mb-0">&amp; above</p> --}}
</div>

<!-- Radio button 3 -->
<div class="d-flex align-items-center mb-1">
    <input class="form-check-input me-3 rating-radio" id="flexRadio3" type="radio" name="flexRadio"
           value="3" data-rating="3" {{ session('selectedRating') == '3' ? 'checked' : '' }}>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa-regular fa-star text-warning-300 fs--1 me-1"></span>
    <span class="fa-regular fa-star text-warning-300 fs--1 me-1"></span>
    {{-- <p class="ms-1 mb-0">&amp; above</p> --}}
</div>

<!-- Radio button 4 -->
<div class="d-flex align-items-center mb-1">
    <input class="form-check-input me-3 rating-radio" id="flexRadio2" type="radio" name="flexRadio"
           value="2" data-rating="2" {{ session('selectedRating') == '2' ? 'checked' : '' }}>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa-regular fa-star text-warning-300 fs--1 me-1"></span>
    <span class="fa-regular fa-star text-warning-300 fs--1 me-1"></span>
    <span class="fa-regular fa-star text-warning-300 fs--1 me-1"></span>
    {{-- <p class="ms-1 mb-0">&amp; above</p> --}}
</div>

<!-- Radio button 5 -->
<div class="d-flex align-items-center mb-3">
    <input class="form-check-input me-3 rating-radio" id="flexRadio1" type="radio" name="flexRadio"
           value="1" data-rating="1" {{ session('selectedRating') == '1' ? 'checked' : '' }}>
    <span class="fa fa-star text-warning fs--1 me-1"></span>
    <span class="fa-regular fa-star text-warning-300 fs--1 me-1"></span>
    <span class="fa-regular fa-star text-warning-300 fs--1 me-1"></span>
    <span class="fa-regular fa-star text-warning-300 fs--1 me-1"></span>
    <span class="fa-regular fa-star text-warning-300 fs--1 me-1"></span>
    {{-- <p class="ms-1 mb-0">&amp; above</p> --}}
</div>

                            <a class="btn px-0 d-block collapse-indicator" data-bs-toggle="collapse"
                                href="#collapsePriceRange" role="button" aria-expanded="true"
                                aria-controls="collapsePriceRange">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div class="fs-0 text-1000">Rentang Harga</div>
                                    <span class="fa-solid fa-angle-down toggle-icon text-500"></span>
                                </div>
                            </a>
                            <div class="collapse show" id="collapsePriceRange">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="input-group me-2">
                                        <input class="form-control" type="number" aria-label="First name" placeholder="Min"
                                            name="min" value="{{ old('min', $minPrice) }}">
                                        <input class="form-control" type="number" aria-label="Last name" placeholder="Max"
                                            name="max" value="{{ old('max', $maxPrice) }}">
                                    </div>
                                    <button class="btn btn-phoenix-primary border-300 px-3" type="submit">Go</button>
                                </div>
                            </div>

                            {{-- </div> --}}
                            </div>
                        </div>
                        <div class="phoenix-offcanvas-backdrop d-lg-none" data-phoenix-backdrop></div>
                    </form>
                </div>
                <div class="col-lg-9 col-xxl-10">
                    <div class="row">
                        @if ($kamars->count() > 0)
                        @foreach ($kamars as $kamar)
                        <div class="col-12 col-sm-6 col-md-4 col-xxl-3 mb-5"> <!-- Ubah ukuran kolom -->
                            <div class="product-card-container h-100">
                                <div class="position-relative text-decoration-none product-card h-100">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <div>
                                            <div class="border border-1 rounded-3 position-relative mb-3">
                                                <img class="img-fluid" src="{{ asset('storage/kamar/' . $kamar->path_kamar) }}" alt="" />
                                                @if ($kamar->status == 'available')
                                                    <span class="badge bg-success fs--2 product-verified-badge">{{ $kamar->status }}
                                                        <span class="fas fa-check ms-1"></span>
                                                    </span>
                                                @endif
                                            </div>
                                            <a class="stretched-link" href="{{ route('detailkamar', $kamar->id) }}">
                                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">{{ $kamar->nama_kamar }}</h6>
                                                <div class="fasilitas-container"> <!-- Tambahkan kontainer fasilitas -->
                                                    @foreach ($fasilitas->take(2) as $fasili)
                                                        <span class="fasilitas-item">{{ $fasili->nama_fasilitas }}</span>, <!-- Tambahkan koma di sini -->
                                                    @endforeach
                                                    @if ($fasilitas->count() > 2)
                                                        <div class="hidden-fasilitas" style="display: none;">
                                                            @foreach ($fasilitas->slice(2) as $fasili)
                                                                <span class="fasilitas-item">{{ $fasili->nama_fasilitas }}</span>, <!-- Tambahkan koma di sini -->
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </a>

                                            <p class="fs--1">
                                                @if ($totalUlasans[$kamar->id] > 0)
                                                    @php
                                                        $rating = $ratings[$kamar->id];
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
                                                    <span class="text-primary fw-semi-bold mb-2"> ({{ $totalUlasans[$kamar->id] }} orang memberi rating)</span>
                                                @else
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <span class="fa fa-star text-secondary"></span>
                                                    @endfor
                                                    <span class="text-secondary fw-semi-bold mb-2"> (Tidak Ada Ulasan)</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col">
                                            @php
                                                $diskon_tersedia = false;
                                                $harga_awal = $kamar->harga;
                                                $harga_setelah_diskon = $harga_awal; // Inisialisasi harga setelah diskon sama dengan harga awal
                                                $diskon = null; // Menetapkan nilai awal $diskon
                                            @endphp

                                            @foreach ($diskons as $diskon_item)
                                                @if ($diskon_item->kategori_id === $kamar->kategori_id)
                                                    @php
                                                        $diskon = $diskon_item;
                                                        $diskon_tersedia = true;

                                                        if ($diskon->jenis == 'percentage') {
                                                            // Hitung diskon berdasarkan persentase diskon
                                                            $diskon->diskon = ($harga_awal * $diskon->potongan_harga) / 100;
                                                            // Hitung harga setelah diskon
                                                            $harga_setelah_diskon = $harga_awal - $diskon->diskon;
                                                        } else {
                                                            // Jika jenis diskon bukan persentase, maka potongan harga adalah nominal potongan yang diberikan
                                                            $harga_setelah_diskon = $harga_awal - $diskon->potongan_harga;
                                                        }
                                                    @endphp
                                                    {{-- Keluar dari loop karena sudah menemukan diskon yang sesuai --}}
                                                    @break
                                                @endif
                                            @endforeach

                                            <h3 class="text-1100 mb-0" style="display: flex; align-items: center;">
                                                @if ($diskon_tersedia && \Carbon\Carbon::now() <= \Carbon\Carbon::parse($diskon->akhir_berlaku))
                                                    <span style="display: flex; align-items: center;">
                                                        <span style="margin-right: 5px;">Rp.{{ number_format($harga_setelah_diskon, 0, ',', '.') }}</span>
                                                        <span class="text-body-quaternary text-decoration-line-through fs-0 mb-0 me-3" style="opacity: 0.2;">Rp.{{ number_format($harga_awal, 0, ',', '.') }}</span>
                                                    </span>
                                                @else
                                                    <span style="margin-right: 5px;">Rp.{{ number_format($harga_awal, 0, ',', '.') }}</span>
                                                @endif
                                                @if ($diskon && property_exists($diskon, 'potongan_harga') && $diskon->kategori_id == $kamar->kategori_id)
                                                    @if ($diskon->potongan_harga > 100)
                                                        {{-- Rp.{{ number_format($diskon->potongan_harga, 0, ',', '.') }} --}}
                                                    @else
                                                        <span class="text-warning small" style="font-size: 0.9rem;">{{ $diskon->potongan_harga }}%</span>
                                                    @endif
                                                @endif
                                            </h3>
                                        </div>
                                        <div class="col flex-grow-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                        @else
                            <div class="col-12">
                                <div
                                    style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 70%;">
                                    <img src="{{ asset('assets/img/No data-amico.svg') }}" alt=""
                                        style="width: 300px; height: auto; max-width: 100%; display: block; margin: 0 auto;">
                                    <h3 class="mb-3">Tidak Ada Kamar Yang Tersedia.</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>
    {{-- <script>
        const radioButtons = document.querySelectorAll('.rating-radio');
        const kamars = document.querySelectorAll('.kamar');

        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', function() {
                const selectedRating = this.dataset.rating;

                kamars.forEach(kamar => {
                    const rating = kamar.dataset.rating;
                    if (rating >= selectedRating) {
                        kamar.style.display = 'block';
                    } else {
                        kamar.style.display = 'none';
                    }
                });
            });
        });
    </script> --}}
    <script>
        document.getElementById('showMoreBtn').addEventListener('click', function() {
            document.getElementById('hiddenFasilitas').style.display = 'block';
            this.style.display = 'none';
        });
    </script>
@endsection
