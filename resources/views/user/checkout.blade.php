@extends('layout_user.app')

@section('content')
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-5 pb-9">
        <form action="{{ route('pesanan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-small">
                {{-- <nav class="mb-2" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
                            <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Default</li>
                        </ol>
                    </nav> --}}
                <h2 class="mb-5">Check out</h2>
                <div class="row justify-content-between">
                    <div class="col-lg-7 col-xl-7">
                        <div class="d-flex align-items-end">
                            <h3 class="mb-0 me-3">User Details</h3>
                            {{-- <button class="btn btn-link p-0"
                            type="button">Edit</button> --}}
                        </div>
                        <table class="table table-borderless mt-4">
                            <tbody>
                                <tr>
                                    <td class="py-2 ps-0">
                                        <div class="d-flex"><span class="fs-5 me-2" data-feather="user"
                                                style="height:16px; width:16px;"> </span>
                                            <h5 class="lh-sm me-4">Name</h5>
                                        </div>
                                    </td>
                                    <td class="py-2 fw-bold lh-sm">:</td>
                                    <td class="py-2 px-3">
                                        <h5 class="lh-sm fw-normal text-800">{{ Auth::user()->name }}</h5>
                                    </td>
                                    <input type="hidden" name="username" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                </tr>
                                <tr>
                                    <td class="py-2 ps-0">
                                        <div class="d-flex"><span class="fs-5 me-2" data-feather="home"
                                                style="height:16px; width:16px;"> </span>
                                            <h5 class="lh-sm me-4">Address</h5>
                                        </div>
                                    </td>
                                    <td class="py-2 fw-bold lh-sm">:</td>
                                    <td class="py-2 px-3">
                                        @if (Auth::user()->address)
                                            <h5 class="lh-lg fw-normal text-800">{{ Auth::user()->address }}</h5>
                                        @else
                                            <p>Please fill in your address.</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 ps-0">
                                        <div class="d-flex"><span class="fs-5 me-2" data-feather="phone"
                                                style="height:16px; width:16px;"> </span>
                                            <h5 class="lh-sm me-4">Phone</h5>
                                        </div>
                                    </td>
                                    <td class="py-2 fw-bold lh-sm">: </td>
                                    <td class="py-2 px-3">
                                        @if (Auth::user()->telp)
                                            <h5 class="lh-lg fw-normal text-800">{{ Auth::user()->telp }}</h5>
                                        @else
                                            <p>Please fill in your number phone.</p>
                                        @endif
                                    </td>
                                    <input type="hidden" name="no_tlp" value="{{ auth()->user()->telp }}">
                                </tr>
                            </tbody>
                        </table>
                        <hr class="my-6">
                        <h3 class="mb-5">Payment Proccess</h3>
                        <div class="row g-4 mb-7">
                            <div class="col-12">
                                <div class="row gx-lg-11">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" name="id_kamar" value="{{ $kamars->id }}">
                                <label class="form-label fs-0 text-1000 ps-0 text-none" for="tanggal_awal">Choose payment method</label>
                                <select class="form-select mb-3 @error('metode_pembayaran') is-invalid @enderror"
                                    name="metode_pembayaran" aria-label=".form-select-lg example" id="selectMetode">
                                    <option value="" disabled {{ old('metode_pembayaran') ? '' : 'selected' }}>Select
                                        Payment</option>
                                    <option value="e-wallet" data-target="ewalletInput"
                                        {{ old('metode_pembayaran') == 'e-wallet' ? 'selected' : '' }}>E-Wallet</option>
                                    <option value="bank" data-target="bankInput"
                                        {{ old('metode_pembayaran') == 'bank' ? 'selected' : '' }}>Bank</option>
                                </select>
                                @error('metode_pembayaran')
                                    <strong class="mt-n3 invalid-feedback">
                                        {{ $message }}
                                    </strong>
                                @enderror
                                <div class="mb-3" id="ewalletInput"
                                    style="display: @error('tujuan_ewallet') block @else none @enderror;">
                                    <div>
                                        <label class="form-label fs-0 text-1000 ps-0 text-none">Type QR</label>
                                    </div>
                                    <select name="tujuan_ewallet" id="tujuan_ewallet"
                                        class="form-control @error('tujuan_ewallet') is-invalid @enderror">
                                        <option value="" disabled selected>Choose</option>
                                        @forelse ($wallet as $data)
                                            <option value="{{ $data->tujuan }}" data-foto="{{ $data->keterangan }}">
                                                {{ $data->tujuan }}</option>
                                        @empty
                                            <option value="" disabled selected>No Data E-wallet</option>
                                        @endforelse
                                    </select>
                                    @error('tujuan_ewallet')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror

                                    <div class="mt-3">
                                        <label class="form-label fs-0 text-1000 ps-0 text-none">QR Code</label>
                                    </div>

                                    <p class="" id="keterangan_ewallet">
                                        <a href="#" data-toggle="lightbox">
                                            <img src="" style="width: 150px; height=80px;" id="ewalletImage">
                                        </a>
                                    </p>
                                </div>

                                <div class="mb-3" id="bankInput"
                                    style="display: @error('tujuan_bank') block @else none @enderror;">
                                    <div>
                                        <label class="form-label fs-0 text-1000 ps-0 text-none">Choose Bank</label>
                                    </div>
                                    <select name="tujuan_bank" id="tujuan_bank"
                                        class="form-control @error('tujuan_bank') is-invalid @enderror">
                                        <option value="" disabled selected>Choose</option>
                                        @forelse ($bank as $data)
                                            <option value="{{ $data->tujuan }}" data="{{ $data->keterangan }}">
                                                {{ $data->tujuan }}</option>
                                        @empty
                                            <option value="" disabled selected>No account number available</option>
                                        @endforelse
                                    </select>
                                    @error('tujuan_bank')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                    <div class="mt-3">
                                        <label class="form-label fs-0 text-1000 ps-0 text-none">Account Number</label>
                                    </div>
                                    @foreach ($bank as $data)
                                        <input type="text" name="keterangan_bank" value="{{ $data->keterangan }}"
                                            id="{{ $data->keterangan }}" class="form-control" readonly disabled>
                                    @endforeach
                                </div>
                                <label class="form-label fs-0 text-1000 ps-0 text-none" for="foto">Enter your Proof of
                                    Payment</label>
                                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror mb-3" id="foto">
                                @error('foto')
                                    <strong class="mt-n3 invalid-feedback">
                                        {{ $message }}
                                    </strong>
                                @enderror
                                <div class="d-flex justify-content-between">
                                    <div style="width: 48%;">
                                        <label class="form-label fs-0 text-1000 ps-0 text-none" for="tanggal_awal">Start
                                            date</label>
                                        <input
                                            class="form-control datetimepicker mb-3 start-date  @error('tanggal_awal') is-invalid @enderror"
                                            id="datetimepicker" type="text" placeholder="yyyy-mm-dd hour : minute"
                                            data-options='{"enableTime":true,"dateFormat":"y-m-d H:i","disableMobile":true}'
                                            name="tanggal_awal" />
                                        @error('tanggal_awal')
                                            <strong class="mt-n3 invalid-feedback">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                    <div style="width: 48%;">
                                        <label class="form-label fs-0 text-1000 ps-0 text-none" for="tanggal_akhir">End
                                            date</label>
                                        <input
                                            class="form-control datetimepicker mb-3 start-date  @error('tanggal_akhir') is-invalid @enderror"
                                            id="datetimepicker" type="text" placeholder="yyyy-mm-dd hour : minute"
                                            data-options='{"enableTime":true,"dateFormat":"y-m-d H:i","disableMobile":true}'
                                            name="tanggal_akhir" />
                                        @error('tanggal_akhir')
                                            <strong class="mt-n3 invalid-feedback">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>
                                <label class="form-label fs-0 text-1000 ps-0 text-none" for="organizerMultiple">Select
                                    facility</label>
                                    <select class="form-select @error('nama_fasilitas') is-invalid @enderror" id="selectedFacilities" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}' name="nama_fasilitas[]"
                                    id="organizerMultiple" data-choices="data-choices" multiple="multiple"
                                    data-options='{"removeItemButton":true,"placeholder":true}' name="nama_fasilitas[]">
                                    <option value="fasilitas_id" data-price="harga_numerik">Nama Fasilitas</option>
                                    @foreach ($fasilitas as $fasilitasd)
                                        <option value="{{ $fasilitasd->id }}" @selected(!is_null(@old('nama_fasilitas')) ? in_array($fasilitasd->id, @old('nama_fasilitas')) : '')>
                                            {{ $fasilitasd->nama_fasilitas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nama_fasilitas')
                                    <strong class="mt-n3 invalid-feedback">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-2 mb-5 mb-lg-0">
                            <div class="col-md-8 col-lg-9 d-grid">
                                <button class="btn btn-primary" type="submit">Pay</button>
                            </div>
                            <div class="col-md-4 col-lg-3 d-grid">
                                <button id="updateFacilitiesBtn" class="btn btn-primary">Update</button>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="card mt-3 mt-lg-0">
                            <div class="card-body" id="facilitySummary">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="mb-0">Summary</h3>
                                    {{-- <button class="btn btn-link pe-0" type="button">Edit
                                cart</button> --}}
                                </div>
                                <div class="border-dashed border-bottom mt-4">
                                    <div class="ms-n2">
                                        <div class="row align-items-center mb-2 g-3">
                                            <div class="col-8 col-md-7 col-lg-8">
                                                <div class="d-flex align-items-center"><img class="me-2 ms-1"
                                                        src="{{ asset('storage/kamar/' . $kamars->path_kamar) }}"
                                                        width="40" alt="" />
                                                    <h6 class="fw-semi-bold text-1000 lh-base">
                                                        {{ Str::limit($kamars->nama_kamar, 20, $end = '...') }}
                                                    </h6>
                                                </div>
                                            </div>
                                            {{-- <div class="col-2 col-md-3 col-lg-2">
                                        <h6 class="fs--2 mb-0">x1</h6>
                                    </div>
                                    <div class="col-2 ps-0">
                                        <h5 class="mb-0 fw-semi-bold text-end">$398</h5>
                                    </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="border-dashed border-bottom mt-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h5 class="text-900 fw-semi-bold">Room Price: </h5>
                                        <h5 class="text-900 fw-semi-bold">
                                            {{ 'Rp ' . number_format($kamars->harga, 0, ',', '.') }}</h5>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <h5 class="text-900 fw-semi-bold">Discount: </h5>
                                        <h5 class="text-danger fw-semi-bold">-$59</h5>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2" id="facilitySection">
                                        <h5 class="text-900 fw-semi-bold">Facility: </h5>
                                    </div>
                                </div>
                                @php
                                    $roomPrice = $kamars->harga;
                                    $discount = 50000;
                                    $facility = 100000;
                                    $total = $roomPrice - $discount + $facility;
                                @endphp
                                <div class="d-flex justify-content-between border-dashed-y pt-3">
                                    <h4 class="mb-0">Total :</h4>
                                    <h4 class="mb-0">{{ 'Rp ' . number_format($total) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form><!-- end of .container-->
    </section><!-- <section> close ============================-->
    <!-- ============================================-->

    <div class="support-chat-container">
        <div class="container-fluid support-chat">
            <div class="card bg-white">
                <div class="card-header d-flex flex-between-center px-4 py-3 border-bottom">
                    <h5 class="mb-0 d-flex align-items-center gap-2">Demo widget<span
                            class="fa-solid fa-circle text-success fs--3"></span></h5>
                    <div class="btn-reveal-trigger"><button
                            class="btn btn-link p-0 dropdown-toggle dropdown-caret-none transition-none d-flex"
                            type="button" id="support-chat-dropdown" data-bs-toggle="dropdown" data-boundary="window"
                            aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span
                                class="fas fa-ellipsis-h text-900"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-2" aria-labelledby="support-chat-dropdown"><a
                                class="dropdown-item" href="#!">Request a callback</a><a class="dropdown-item"
                                href="#!">Search in chat</a><a class="dropdown-item" href="#!">Show
                                history</a><a class="dropdown-item" href="#!">Report to Admin</a><a
                                class="dropdown-item btn-support-chat" href="#!">Close Support</a></div>
                    </div>
                </div>
                <div class="card-body chat p-0">
                    <div class="d-flex flex-column-reverse scrollbar h-100 p-3">
                        <div class="text-end mt-6"><a
                                class="mb-2 d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3"
                                href="#!">
                                <p class="mb-0 fw-semi-bold fs--1">I need help with something</p><span
                                    class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
                            </a><a
                                class="mb-2 d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3"
                                href="#!">
                                <p class="mb-0 fw-semi-bold fs--1">I can’t reorder a product I previously ordered</p><span
                                    class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
                            </a><a
                                class="mb-2 d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3"
                                href="#!">
                                <p class="mb-0 fw-semi-bold fs--1">How do I place an order?</p><span
                                    class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
                            </a><a
                                class="false d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3"
                                href="#!">
                                <p class="mb-0 fw-semi-bold fs--1">My payment method not working</p><span
                                    class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
                            </a></div>
                        <div class="text-center mt-auto">
                            <div class="avatar avatar-3xl status-online"><img
                                    class="rounded-circle border border-3 border-white"
                                    src="../../../assets/img/team/30.webp" alt="" /></div>
                            <h5 class="mt-2 mb-3">Eric</h5>
                            <p class="text-center text-black mb-0">Ask us anything – we’ll get back to you here or by email
                                within 24 hours.</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center gap-2 border-top ps-3 pe-4 py-3">
                    <div class="d-flex align-items-center flex-1 gap-3 border rounded-pill px-4"><input
                            class="form-control outline-none border-0 flex-1 fs--1 px-0" type="text"
                            placeholder="Write message" /><label class="btn btn-link d-flex p-0 text-500 fs--1 border-0"
                            for="supportChatPhotos"><span class="fa-solid fa-image"></span></label><input class="d-none"
                            type="file" accept="image/*" id="supportChatPhotos" /><label
                            class="btn btn-link d-flex p-0 text-500 fs--1 border-0" for="supportChatAttachment"> <span
                                class="fa-solid fa-paperclip"></span></label><input class="d-none" type="file"
                            id="supportChatAttachment" /></div><button class="btn p-0 border-0 send-btn"><span
                            class="fa-solid fa-paper-plane fs--1"></span></button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('updateFacilitiesBtn').addEventListener('click', function(event) {
                event.preventDefault();

                var selectedFacilities = Array.from(document.querySelectorAll('#selectedFacilities option:checked'))
                    .map(option => ({ name: option.textContent }));

                var facilitySection = document.getElementById('facilitySection');
                facilitySection.innerHTML = '';

                if (selectedFacilities.length > 0) { // Check if there are selected facilities
                    var facilityHeader = document.createElement('h5');
                    facilityHeader.className = 'text-900 fw-semi-bold';
                    facilityHeader.textContent = 'Facility: ';
                    facilitySection.appendChild(facilityHeader);

                    selectedFacilities.forEach(function(facility) {
                        var facilityName = document.createElement('h5');
                        facilityName.className = 'text-900 fw-semi-bold';
                        facilityName.textContent = facility.name;
                        facilitySection.appendChild(facilityName);
                    });
                } else {
                    // Show a message if no facilities are selected
                    var noFacilitiesMessage = document.createElement('p');
                    noFacilitiesMessage.textContent = 'No facilities selected';
                    facilitySection.appendChild(noFacilitiesMessage);
                }
            });
        });
        </script>

    <script>
        const selectElement = document.querySelector('#selectMetode');
        const ewalletInput = document.querySelector('#ewalletInput');
        const bankInput = document.querySelector('#bankInput');
        const tujuanEwalletSelect = document.querySelector('#tujuan_ewallet');

        selectElement.addEventListener('change', function() {
            const selectedValue = selectElement.value;

            if (selectedValue === 'e-wallet') {
                ewalletInput.style.display = 'block';
                bankInput.style.display = 'none';
            } else if (selectedValue === 'bank') {
                bankInput.style.display = 'block';
                ewalletInput.style.display = 'none';
            } else {
                ewalletInput.style.display = 'none';
                bankInput.style.display = 'none';
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle change event of the dropdown
            $('#tujuan_ewallet').change(function() {
                var selectedOption = $(this).find('option:selected');
                // alert(selectedOption);
                var imageUrl = selectedOption.data('foto');

                $('#ewalletImage').attr('src', imageUrl);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle change event of the select element
            $('#tujuan_ewallet').change(function() {
                // Get the selected option value and its data-foto attribute
                var selectedOption = $(this).val();
                var selectedFoto = $(this).find(':selected').data('foto');

                // Set the image source and show the image
                $('#ewalletImage').attr('src', '{{ asset('storage/kamar/') }}/' + selectedFoto);
                $('#keterangan_ewallet').show();
            });
        });
    </script>
@endsection
