@extends('layout_user.app')
@section('content')
    @include('sweetalert.sweetalert')
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
    <form action="{{ route('profil.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="pt-5 pb-9">
            <div class="container-small">
                @if (is_null($user->address) and is_null($user->telp))
                    <h3 class="text-danger">Please fill in your personal information first</h3>
                @endif
                <div class="row align-items-center justify-content-between g-3 mb-4">
                    <div class="col-auto">
                        <h2 class="mb-0">Profile</h2>
                    </div>
                </div>
                <div class="row g-3 mb-5">
                    <div class="col-12 col-lg-8">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="border-bottom border-dashed border-300 pb-4">
                                    <div class="row align-items-center g-3 g-sm-5 text-center text-sm-start">

                                        <div class="col-12 col-sm-auto">
                                            <input class="d-none" id="avatarFile" type="file" name="profile"
                                                accept="image/*" onchange="previewImage()" />
                                            <label class="cursor-pointer avatar avatar-5xl" for="avatarFile">
                                                @if ($user->profile)
                                                    <img class="rounded-circle" id="avatarprofilPreview"
                                                        src="{{ asset('storage/' . $user->profile) }}" alt="" />
                                                @else
                                                    <!-- Tampilkan foto default jika tidak ada foto profil -->
                                                    <img class="rounded-circle" id="avatarprofilPreview"
                                                        src="{{ asset('assets/storage/apple.jpg') }}"
                                                        alt="Default Avatar" />
                                                @endif
                                            </label>
                                        </div>
                                        <div class="col-12 col-sm-auto flex-1">
                                            <h3>{{ Auth::user()->name }}</h3>
                                            <p>
                                                @if (Auth::check())
                                                    Joined {{ Carbon\Carbon::now()->diffInDays(Auth::user()->created_at) }}
                                                    Days
                                                    Ago
                                                @else
                                                    <p></p>
                                                @endif
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="d-flex flex-between-center pt-4">
                                    <div>
                                        <h6 class="mb-2 text-800">Total Spent</h6>
                                        <h4 class="fs-1 text-1000 mb-0">Rp.
                                            {{-- {{ number_format($totalpembayaran[0]->total, 0, ',', '.') }} --}}
                                            20.000.000.000
                                        </h4>
                                    </div>
                                    @php
                                        use Carbon\Carbon;
                                    @endphp
                                    <div class="text-end">
                                        <h6 class="mb-2 text-800 text-center">Last Order</h6>
                                        <h4 class="fs-1 text-1000 mb-0 text-center">
                                            {{-- @if ($lastorder->count() > 0)
                                                {{ Carbon::now()->diffInDays($lastorder[0]->created_at) }} Days Ago --}}
                                                6 Days Ago
                                        </h4>
                                    {{-- @else
                                        <h4 class="fs-1 text-1000 mb-0">User has never placed an order.</h4>
                                        @endif --}}
                                    </div>
                                    <div class="text-end">
                                        <h6 class="mb-2 text-800">Total Orders</h6>
                                        <h4 class="fs-1 text-1000 mb-2">
                                            {{-- {{ $totalorder }} --}}
                                            98
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="border-bottom border-dashed border-300">
                                    <h4 class="mb-3 lh-sm lh-xl-1">Default Address<span
                                            class="fas fa-edit fs--1 ms-3 text-500"></span>
                                    </h4>
                                </div>
                                <div class="pt-4 mb-7 mb-lg-4 mb-xl-7">
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <h5 class="text-1000">Address</h5>
                                        </div>
                                        <div class="col-auto">
                                            <p class="text-800">{{ $user->address }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top border-dashed border-300 pt-4">
                                    <div class="row flex-between-center mb-2">
                                        <div class="col-auto">
                                            <h5 class="text-1000 mb-0">Email</h5>
                                        </div>
                                        <div class="col-auto"><a class="lh-1"
                                                href="mailto:{{ $user->email }}">{{ $user->email }}</a></div>
                                    </div>
                                    <div class="row flex-between-center">
                                        <div class="col-auto">
                                            <h5 class="text-1000 mb-0">Phone</h5>
                                        </div>
                                        <div class="col-auto"><a
                                                href="https://wa.me/{{ $user->telp }}/">+{{ $user->telp }}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="scrollbar">
                            <ul class="nav nav-underline flex-nowrap mb-3 pb-1" id="myTab" role="tablist">
                                <li class="nav-item me-3"><a class="nav-link text-nowrap active" id="orders-tab"
                                        data-bs-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders"
                                        aria-selected="true"><span class="fas fa-shopping-cart me-2"></span>Orders <span
                                            class="text-700 fw-normal">
                                            {{-- ({{ $totalorder }}) --}}
                                            67
                                        </span></a></li>
                                <li class="nav-item"><a class="nav-link text-nowrap" id="personal-info-tab"
                                        data-bs-toggle="tab" href="#tab-personal-info" role="tab"
                                        aria-controls="tab-personal-info" aria-selected="true"><span
                                            class="fas fa-user me-2"></span>Personal info</a></li>
                            </ul>
                        </div>
                        <div class="tab-content" id="profileTabContent">
                            <div class="tab-pane fade show active" id="tab-orders" role="tabpanel"
                                aria-labelledby="orders-tab">
                                <div class="border-top border-bottom border-200" id="profileOrdersTable"
                                    data-list='{"valueNames":["order","status","delivery","date","total"],"page":5,"pagination":true}'>
                                    <div class="table-responsive scrollbar">
                                        <table class="table fs--1 mb-0">
                                            <thead>
                                                <tr class="">
                                                    <th class="sort white-space-nowrap align-middle text-center  "
                                                        scope="col" style="width:15%; min-width:120px">NO</th>
                                                    <th class="sort white-space-nowrap align-middle text-center  "
                                                        scope="col" style="width:15%; min-width:140px">MY ORDER</th>
                                                    <th class="sort align-middle  text-center" scope="col"
                                                        style="width:15%; min-width:180px">STATUS</th>
                                                    <th class="sort align-middle text-center" scope="col"
                                                        style="width:20%; min-width:160px">DELIVERY METHOD</th>
                                                    <th class="sort align-middle  text-center" scope="col"
                                                        style="width:15%; min-width:160px">SHIPPED DATE</th>
                                                    <th class="sort align-middle  text-center" scope="col"
                                                        style="width:15%; min-width:160px">RECEIVED DATE</th>
                                                    <th class="sort align-middle text-center" scope="col"
                                                        style="width:15%; min-width:160px">TOTAL</th>
                                                    <th class="align-middle text-center" scope="col"
                                                        style="width:15%;">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list" id="profile-order-table-body text-center">
                                                {{-- @if ($order->count() > 0)
                                                    @php
                                                        $checkout_id = 0;
                                                        $no = 0;
                                                        $totalproduktiappesanan = [];
                                                    @endphp
                                                    @foreach ($order as $orders)
                                                        @if ($orders->id != $checkout_id)
                                                            @php
                                                                $checkout_id = $orders->id;
                                                                $no += 1;
                                                                $totalproduktiappesanan[$orders->id] = 1;
                                                            @endphp --}}
                                                            <tr class="position-static text-center">
                                                                <td class="align-middle review fs-0 mx-auto text-center">
                                                                    {{-- {{ $no }} --}}
                                                                </td>
                                                                <td class="align-middle review fs-0 text-center mx-auto">
                                                                    <button type="button" class="btn btn-link primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#productDetailModal
                                                                        {{-- {{ $orders->id }} --}}
                                                                        ">
                                                                        Detail
                                                                    </button>
                                                                </td>
                                                                <td class="align-middle white-space-nowrap py-0">
                                                                    <span class="badge-phoenix-success">Available</span>
                                                                    {{-- <span
                                                                        class="badge badge-phoenix fs--2
                                                                @if ($orders->status == 'pending') badge-phoenix-warning
                                                                @elseif($orders->status == 'shipped')
                                                                    badge-phoenix-info
                                                                @elseif($orders->status == 'delivered')
                                                                    badge-phoenix-success
                                                                @elseif($orders->status == 'completed')
                                                                badge-phoenix-success
                                                                @elseif($orders->status == 'reject')
                                                                badge-phoenix-danger @endif
                                                                ">
                                                                        {{ $orders->status }}
                                                                    </span> --}}
                                                                </td>
                                                                <td class="align-middle white-space-nowrap py-0">
                                                                    <span
                                                                        class="fw-semi-bold fs--1 line-clamp-3 mb-0">
                                                                        {{-- {{ $orders->metode_pengiriman }} --}}
                                                                        Shopee Express
                                                                    </span>
                                                                </td>
                                                                <td class="produks align-middle ps-4">
                                                                    <span
                                                                        class="fw-semi-bold fs--1 line-clamp-3 mb-0">
                                                                        {{-- {{ is_null($orders->tanggal_pengiriman) ? '-' : date('d F Y', strtotime($orders->tanggal_pengiriman)) }} --}}
                                                                    </span>
                                                                </td>
                                                                <td class="produks align-middle ps-4">
                                                                    <span
                                                                        class="fw-semi-bold fs--1 line-clamp-3 mb-0">
                                                                        {{-- {{ is_null($orders->tanggal_menerima) ? '-' : date('d F Y', strtotime($orders->tanggal_menerima)) }} --}}
                                                                        25 - January - 2020
                                                                    </span>
                                                                </td>
                                                                <td class="produks align-middle">
                                                                    <span class="fw-semi-bold fs--1 line-clamp-3 mb-0">Rp.
                                                                        {{-- {{ number_format($orders->total, 0, ',', '.') }} --}}
                                                                        Rp. 30.500.000
                                                                    </span>
                                                                </td>
                                                                <td class="produks align-middle ">
                                                                    {{-- @if ($orders->status == 'shipped') --}}
                                                                        {{-- <form action="{{ route('diterima', $orders->id) }}">
                                                                            @csrf
                                                                            @method('put')
                                                                            <input type="hidden" name="status" value="{{ $orders->status }}">
                                                                            <button type="submit"
                                                                                class="btn btn-link dropdown-item text-primary">
                                                                                Diterima
                                                                            </button>
                                                                        </form> --}}
                                                                        <a class="btn btn-link dropdown-item text-primary"
                                                                            href="#">Accepted</a>
                                                                            {{-- @elseif ($orders->status == 'reject') --}}
                                                                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#show-reject-message
                                                                            {{-- {{ $orders->id }} --}}
                                                                            ">Reject Message</button>
                                                                            <div class="modal fade" id="show-reject-message
                                                                            {{-- {{ $orders->id }} --}}
                                                                            " tabindex="-1" aria-labelledby="rejectMessageModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-centered">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="rejectMessageModalLabel">Reject Message</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="w-100 fs-2"><p style="overflow-wrap: break-word;">
                                                                                                {{-- {{ $orders->reject_message }} --}}
                                                                                                soasik
                                                                                            </p></div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                            <!-- Tambahkan tombol untuk menolak pesan di sini jika diperlukan -->
                                                                                            <!-- <button type="button" class="btn btn-danger">Reject</button> -->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    {{-- @endif --}}
                                                                </td>
                                                            </tr>
                                                        {{-- @else
                                                        @php
                                                            $totalproduktiappesanan[$orders->id] += 1;
                                                        @endphp
                                                        @endif
                                                    @endforeach
                                                @endif --}}
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                                        <div class="col-auto d-flex">
                                            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900"
                                                data-list-info="data-list-info"></p><a class="fw-semi-bold"
                                                href="#!" data-list-view="*">View all<span
                                                    class="fas fa-angle-right ms-1"
                                                    data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none"
                                                href="#!" data-list-view="less">View Less<span
                                                    class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                                        </div>
                                        <div class="col-auto d-flex"><button class="page-link"
                                                data-list-pagination="prev"><span
                                                    class="fas fa-chevron-left"></span></button>
                                            <ul class="mb-0 pagination"></ul><button class="page-link pe-0"
                                                data-list-pagination="next"><span
                                                    class="fas fa-chevron-right"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @php
                            $detail = '';
                            $counter = 1;
                            // print_r($totalproduktiappesanan);
                        @endphp

                        @foreach ($order as $orders)
                            @if ($counter < $totalproduktiappesanan[$orders->id])
                                @php
                                    $detail .=
                                        '<tr><td class="text-center product align-middle ps-4">' .
                                        $counter .
                                        '</td><td class="text-center product align-middle ps-4">' .
                                        '<img src="' .
                                        asset('storage/Product/' . $orders->path_produk) .
                                        '"
                                                            alt="" width="50%" height="50%"
                                                            style="object-fit: cover" class="mx-auto" />' .
                                        '</td><td class="text-center product align-middle ps-4">' .
                                        $orders->nama_produk .
                                        '</td><td class="text-center product align-middle ps-4">' .
                                        $orders->jumlah .
                                        '</td><td class="text-center product align-middle ps-4">' .
                                        'Rp. ' . number_format($orders->detail_total, 0, ',', '.') .
                                        '</td></tr>';
                                    $counter += 1;
                                @endphp
                            @else
                                @php
                                    $detail .=
                                        '<tr><td class="text-center product align-middle ps-4">' .
                                        $counter .
                                        '</td><td class="text-center product align-middle ps-4">' .
                                        '<img src="' .
                                        asset('storage/Product/' . $orders->path_produk) .
                                        '"
                                                            alt="" width="50%" height="50%"
                                                            style="object-fit: cover" class="mx-auto" />' .
                                        '</td><td class="text-center product align-middle ps-4">' .
                                        $orders->nama_produk .
                                        '</td><td class="text-center product align-middle ps-4">' .
                                        $orders->jumlah .
                                        '</td><td class="text-center product align-middle ps-4">' .
                                        'Rp. ' . number_format($orders->detail_total, 0, ',', '.') .
                                        '</td></tr>';
                                    $counter = 1;
                                @endphp --}}

                                <!-- Modal -->
                                <div class="modal fade" id="productDetailModal
                                {{-- {{ $orders->id }} --}}
                                " tabindex="-1"
                                    aria-labelledby="productDetailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="productDetailModalLabel">
                                                    Product Detail</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <table class="table fs--1 mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                    style="width: 250px">
                                                                    <span>NO</span>
                                                                </th>
                                                                <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                    scope="col" style="width:350px;">
                                                                </th>
                                                                <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                    scope="col" style="width:350px;">
                                                                    PRODUCT NAME</th>
                                                                <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                    scope="col" style="width:250px;">
                                                                    JUMLAH</th>
                                                                <th class="sort text-center white-space-nowrap align-middle ps-4"
                                                                    scope="col" style="width:350px;">
                                                                    TOTAL HARGA</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="list" id="products-table-body">
                                                            {{-- @php
                                                                echo $detail;
                                                            @endphp --}}
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <!-- Jika diperlukan, tambahkan tombol lain di sini -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @php
                                    $detail = '';
                                @endphp
                            @endif
                        @endforeach --}}
                            <div class="tab-pane fade" id="tab-personal-info" role="tabpanel"
                                aria-labelledby="personal-info-tab">
                                <div class="row g-3 mb-5">
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label text-1000 fs-0 ps-0 text-capitalize lh-sm"
                                            for="name">Name</label>
                                        <input class="form-control" id="name" name="name" type="text"
                                            placeholder="Full name" value="{{ old('name', $user->name) }}" />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label text-1000 fw-bold fs-0 ps-0 text-capitalize lh-sm"
                                            for="telp">Phone</label>
                                        <input class="form-control" id="telp" name="telp" type="number"
                                            placeholder="Phone" value="{{ old('name', $user->telp) }}" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label text-1000 fs-0 ps-0 text-capitalize lh-sm"
                                            for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" placeholder="Address">{{ old('description', $user->address) }}</textarea>
                                    </div>
                                </div>
                                <div class="text-end"><button type="submit" class="btn btn-primary px-7">Save
                                        changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->
        </section>
    </form><!-- <section> close ============================-->
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
@endsection

<script>
    function previewImage() {
        var input = document.getElementById('avatarFile');
        var preview = document.getElementById('avatarPreview');
        var avatarpreview = document.getElementById('avatarprofilPreview');

        if (input.files.length > 0) {
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                avatarpreview.src = reader.result;
            }

            reader.readAsDataURL(file);

        } else {
            // Jika tidak ada file yang dipilih, tampilkan gambar placeholder atau default
            preview.src = '{{ asset('assets/img/gallery/profil.jpg') }}';
        }
    }
</script>
