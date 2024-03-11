@extends('layout_user.app')
@section('content')
    @include('sweetalert.sweetalert')
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <section class="py-0">
        <div class="container-small">
            <div class="row g-5 mb-5 mb-lg-8        " data-product-details="data-product-details">
                <div class="col-12 col-lg-6">
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-2 col-lg-12 col-xl-2">
                            <div class="swiper-products-thumb swiper swiper-container theme-slider overflow-visible"
                                id="swiper-products-thumb">
                            </div>
                        </div>
                        <div class="col-12 col-md-10 col-lg-12 col-xl-10" style="margin-top: 35px;">
                            <div class="d-flex align-items-center border rounded-3 text-center p-5 h-100">
                                <div style="position: relative; width: 100%; height: 100%;">
                                    <img src="{{ asset('storage/kamar/' . $kamar->path_kamar) }}" alt=""
                                        style="object-fit: cover; width: 100%; height: 100%; position: absolute; top: 0; left: 0;" />
                                </div>
                                <div class="swiper swiper-container theme-slider" data-thumb-target="swiper-products-thumb"
                                    data-products-swiper='{"slidesPerView":1,"spaceBetween":16,"thumbsEl":".swiper-products-thumb"}'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol "Add Comment" -->
                    <div class="d-flex">
                        <button class="btn btn-lg btn-outline-primary rounded-pill w-100 me-3 px-2 px-sm-4 fs--1 fs-sm-0"
                            data-bs-toggle="modal" data-bs-target="#commentModal">
                            <span class="me-2 far fa-comment"></span>Add comment
                        </button>
                    </div>

                    <!-- Modal "Add Comment" -->
                    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="commentModalLabel">Add Comment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form untuk menambahkan komentar -->
                                    <form method="POST" action="{{ route('ulasankamar.store') }}">
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
                                            <script>
                                                const ratingInputs = document.querySelectorAll('.rating input');
                                                ratingInputs.forEach(input => {
                                                    input.addEventListener('change', (event) => );
                                                });
                                            </script>
                                            <div>
                                                <label for="commentInput" class="">Your Comment</label>
                                                <textarea class="form-control" id="commentInput" rows="3" name="ulasan"></textarea>
                                                <input type="hidden" name="id" value="{{ $kamar->id }}">
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Upload Image:</label>
                                                <input type="file" class="form-control-file" id="image" name="image">
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div>
                            <div style="margin-top: 20px;">
                                <div
                                    style="border: 1px solid #ccc; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-height: 486px; overflow-y: auto;">
                                    <div style="padding: 20px;">
                                        <h3 style="margin-top: 0;">Ulasan</h3>
                                        <hr>
                                        @if ($ulasan_kamars->count() < 1)
                                            <h4 class="text-center">There are no reviews</h4>
                                        @endif
                                        @foreach ($ulasan_kamars as $u)
                                            <div style="color: #666;">
                                                <h4 style="margin-top: 0;">{{ $u->name }}</h4>
                                                <div style="display: flex; align-items: center;">
                                                    @for ($i = 1; $i <= $u->rating; $i++)
                                                        <span style="color: #ffd700;">★</span>
                                                    @endfor
                                                </div>
                                                <span style="margin-right: 5px;">{{ $u->ulasan }}</span>
                                                <hr>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div><a href="{{ route('detailkamar', $kamar->id) }}" class="btn btn-lg btn-primary w-100 fs--1 fs-sm-0" ><span
                                    class="fas fa-arrow-left me-2"></span>Kembali</a>
                            <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div><!-- end of .container-->
    </section>
@endsection
