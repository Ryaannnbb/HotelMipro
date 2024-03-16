@extends('layout_admin.app')

@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}"
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ session('error') }}",
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

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
    <div class="content">
        <div class="mb-9">
            <div class="row g-3 mb-4">
                <div class="col-auto">
                    <h2 class="mb-0">Discount</h2>
                </div>
            </div>
            <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
                <li class="nav-item">
                    <p class="nav-link active my-n2" aria-current="page"><span>All </span><span
                            class="text-700 fw-semi-bold">
                            @if ($diskon->count() > 0)
                                <span>({{ $diskon->count() }})</span>
                            @endif
                        </span></p>
                </li>
            </ul>
            <div id="products"
                data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":5 ,"pagination":true}'>
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-3">
                        <div class="search-box">
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input search" type="search"
                                    placeholder="Search diskon" aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="ms-xxl-auto"><a href="{{ route('diskon.create') }}"><button class="btn btn-primary"
                                    id="addBtn"><span class="fas fa-plus me-2"></span>Add Discount</button></a></div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($diskon as $diskons)
                        <div class="col-12 col-sm-6 col-md-4 col-xxl-2 diskon">
                            <div class="card mb-3">
                                <div class="position-relative">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <div class="font-sans-serif btn-reveal-trigger position-static">
                                            <button
                                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                <span class="fas fa-ellipsis-h fs--2 text-white"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">
                                                <a class="dropdown-item"
                                                    href="{{ route('diskon.edit', $diskons->id) }}">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <form action="{{ route('kamar.destroy', $diskons->id) }}" method="POST"
                                                    class="hapus-form">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button"
                                                        class="dropdown-item text-danger hapus">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal{{ $diskons->id }}">
                                    <img class="card-img-top" src="{{ asset('storage/kamar/' . $diskons->gambar) }}"
                                        style="object-fit: cover; height: 200px;">
                                </a>
                                <div class="card-body">
                                    <h6 class="card-title diskon-name">{{ $diskons->nama_diskon }}</h6>
                                    <span
                                        class="fw-semi-bold fs--1 line-clamp-3 mb-0">{{ is_null($diskons->awal_berlaku) ? '-' : date('d F Y', strtotime($diskons->awal_berlaku)) }}</span>
                                    <span
                                        class="fw-semi-bold fs--1 line-clamp-3 mb-0">{{ is_null($diskons->akhir_berlaku) ? '-' : date('d F Y', strtotime($diskons->akhir_berlaku)) }}</span>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center mb-1">
                                        @if ($diskons->potongan_harga > 100)
                                            {{ 'Rp ' . number_format($diskons->potongan_harga, 0, ',', '.') }}
                                        @else
                                            {{ $diskons->potongan_harga }}%
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modal{{ $diskons->id }}" tabindex="-1"
                            aria-labelledby="modal{{ $diskons->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        {{-- <h5 class="modal-title" id="modal{{$diskons->id}}Label">{{ $diskons->nama_diskon }}</h5> --}}
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="tags text-center review pb-2 ps-3 fs--1">Jenis: {{ $diskons->jenis }}
                                        </p>
                                        <p class="ellipsis-text col-12">
                                            {{ strip_tags(Str::limit($diskons->deskripsi, 100, $end = '...')) }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var searchInput = document.querySelector('.search-input');
                        searchInput.addEventListener('input', function() {
                            var searchTerm = this.value.trim().toLowerCase();
                            var discounts = document.querySelectorAll('.diskon');

                            discounts.forEach(function(discount) {
                                var discountName = discount.querySelector('.diskon-name').textContent.trim().toLowerCase();
                                if (discountName.includes(searchTerm)) {
                                    discount.style.display = 'block';
                                } else {
                                    discount.style.display = 'none';
                                }
                            });
                        });
                    });
                </script>

                </tbody>
                </table>
            </div>
        </div>
          <script>
        $('.hapus').click(function() {
            var form = $(this).closest('form');

            Swal.fire({
                title: "Are you sure?",
                text: "You will delete this product. This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, accept!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
