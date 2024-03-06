@extends('layout_user.app')
@section('content')
    @include('sweetalert.sweetalert')
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @foreach ($Kamars as $detail)
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
                        {{-- <div class="d-flex">
                            <form action="{{ route('shop.order', $detail->id) }}" method="POST" class="d-flex"
                                style="margin-left: 160px">
                                @csrf
                                <div class="d-flex flex-between-center" data-quantity="data-quantity">
                                    <button type="button" class="btn btn-phoenix-primary px-3" data-type="minus"><span
                                            class="fas fa-minus"></span></button>
                                    <input
                                        class="form-control text-center input-spin-none bg-transparent border-0 outline-none"
                                        style="width:50px;" type="number" name="jumlah" value="1" id="quantityInput"
                                        onkeyup="addToCart()" />
                                    <button type="button" class="btn btn-phoenix-primary px-3" data-type="plus"><span
                                            class="fas fa-plus"></span></button>
                                </div>
                                <button class="btn btn-lg btn-primary rounded-pill w-100 fs--1 fs-sm-0 ms-5"
                                    @if ($detail->stok <= 0) disabled=true @endif>
                                    <span class="fas fa-shopping-cart me-2"></span>Add to Cart
                                </button>

                            </form>
                        </div>
                    </div> --}}
                    {{-- <div class="col-12 col-lg-6">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <div class="">
                                <div class="d-flex flex-wrap">
                                    <div class="me-2">
                                        @if (!is_null($detail->rating))
                                            @if ($detail->rating - floor($detail->rating) < 0.5)
                                                @for ($i = 0; $i < floor($detail->rating); $i++)
                                                    <span class="fa fa-star text-warning"></span>
                                                @endfor
                                            @else
                                                @for ($i = 0; $i < ceil($detail->rating); $i++)
                                                    <span class="fa fa-star text-warning"></span>
                                                @endfor
                                            @endif
                                            <span class="text-primary fw-semi-bold mb-2"> ({{ $detail->totalulasan }} people
                                                rated)</span>
                                        @else
                                            <h3 class="me-n2">There are no reviews</h3>
                                        @endif
                                    </div>
                                </div> --}}
                                <h3 style="display: block; overflow-wrap: break-word; word-wrap: break-word;"
                                    class="mb-3 lh-sm">
                                    <h3 style="display: block; overflow-wrap: break-word; word-wrap: break-word; text-align: right; margin-top: -10px;" class="mb-3 lh-sm">{{ ucfirst($detail->nama_kamar) }}</h3>
                                <div class="d-flex flex-wrap align-items-center">
                                    <h1>Rp.{{ number_format($detail->harga, 0, ',', '.') }}</h1>
                                </div>
                                {{-- <p
                                    class="@if ($detail->stok <= 0) text-danger fw-semi-bold fs-1 mb-2 @elseif ($detail->stok <= 10) text-warning fw-semi-bold fs-1 mb-2 @else text-success fw-semi-bold fs-1 mb-2 @endif">
                                    Stock {{ $detail->stok }}
                                </p> --}}
                                <p class="mb-2 text-800"><strong class="text-1000">Description:</strong>
                                <p class="mb-2 text-800">
                                    <strong class="text-1000"
                                        style="display: block; overflow-wrap: break-word; word-wrap: break-word;">
                                        {{ strip_tags($detail->deskripsi) }}
                                    </strong>
                                </p>
                                </p>
                                {{-- <a class="fw-bold" href="{{ route('ulasanproduk', $detail->id) }}">Ulasan-></a> --}}
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            {{-- <script>
                function addToCart() {
                    var quantityInput = document.getElementById('quantityInput');
                    var maxStock = {{ $detail->stok }};
                    var currentQuantity = parseInt(quantityInput.value);

                    if (currentQuantity <= 0) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Quantity must be greater than 0",
                        });
                        // Set input value to 1
                        quantityInput.value = 1;
                    } else if (currentQuantity >= maxStock) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "You cannot add more items than the available stock",
                        });
                        quantityInput.value = 1;
                    } else {
                    }
                }
            </script>
            <script>
                function increaseQuantity() {
                    var quantityInput = document.getElementById('quantityInput');
                    var maxStock = {{ $detail->stok }};
                    var currentQuantity = parseInt(quantityInput.value);

                    // Periksa apakah nilai melebihi batas stok
                    if (currentQuantity >= maxStock) {
                        // Reset nilai ke 1
                        quantityInput.value = 0;
                    } else {
                        // Tambahkan nilai jika masih dalam batas stok
                        quantityInput.value = currentQuantity + 0;
                    }
                }
            </script> --}}
            @endforeach
        @endsection
        </section>
