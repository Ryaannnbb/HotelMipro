@extends('layout_admin.app')

@section('content')
<script>
    var navbarTopShape = window.config.config.phoenixNavbarTopShape;
    var navbarPosition = window.config.config.phoenixNavbarPosition;
    var body = document.querySelector('body');
    var navbarDefault = document.querySelector('#navbarDefault');
    var navbarTop = document.querySelector('#navbarTop');
    var topNavSlim = document.querySelector('#topNavSlim');
    var navbarTopSlim = document.querySelector('#navbarTopSlim');
    var navbarCombo = document.querySelector('#navbarCombo');
    var navbarComboSlim = document.querySelector('#navbarComboSlim');
    var dualNav = document.querySelector('#dualNav');

    var documentElement = document.documentElement;
    var navbarVertical = document.querySelector('.navbar-vertical');

    if (navbarPosition === 'dual-nav') {
        topNavSlim.remove();
        navbarTop.remove();
        navbarVertical.remove();
        navbarTopSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        navbarDefault.remove();
        dualNav.removeAttribute('style');
        documentElement.classList.add('dual-nav');
    } else if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
        navbarDefault.remove();
        navbarTop.remove();
        navbarTopSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        topNavSlim.style.display = 'block';
        navbarVertical.style.display = 'inline-block';
        body.classList.add('nav-slim');
    } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
        navbarDefault.remove();
        navbarVertical.remove();
        navbarTop.remove();
        topNavSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        navbarTopSlim.removeAttribute('style');
        body.classList.add('nav-slim');
    } else if (navbarTopShape === 'slim' && navbarPosition === 'combo') {
        navbarDefault.remove();
        //- navbarVertical.remove();
        navbarTop.remove();
        topNavSlim.remove();
        navbarCombo.remove();
        navbarTopSlim.remove();
        navbarComboSlim.removeAttribute('style');
        navbarVertical.removeAttribute('style');
        body.classList.add('nav-slim');
    } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
        navbarDefault.remove();
        topNavSlim.remove();
        navbarVertical.remove();
        navbarTopSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        navbarTop.removeAttribute('style');
        documentElement.classList.add('navbar-horizontal');
    } else if (navbarTopShape === 'default' && navbarPosition === 'combo') {
        topNavSlim.remove();
        navbarTop.remove();
        navbarTopSlim.remove();
        navbarDefault.remove();
        navbarComboSlim.remove();
        navbarCombo.removeAttribute('style');
        navbarVertical.removeAttribute('style');
        documentElement.classList.add('navbar-combo')

    } else {
        topNavSlim.remove();
        navbarTop.remove();
        navbarTopSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        navbarDefault.removeAttribute('style');
        navbarVertical.removeAttribute('style');
    }

    var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
    var navbarTop = document.querySelector('.navbar-top');
    if (navbarTopStyle === 'darker') {
        navbarTop.classList.add('navbar-darker');
    }

    var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
    var navbarVertical = document.querySelector('.navbar-vertical');
    if (navbarVerticalStyle === 'darker') {
        navbarVertical.classList.add('navbar-darker');
    }
</script>
<div class="content">
    <nav class="mb-2" aria-label="breadcrumb">
    </nav>
    <form action="{{ route('Slider.update', $sliders->id) }}"method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Edit Slider</h2>
                <h5 class="text-700 fw-semi-bold">Pesanan ditempatkan di seluruh toko anda</h5>
            </div>
            <div class="col-auto">
                <a class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" href="{{ route('Slider') }}">Batalkan</a>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Simpan Slider</button>
            </div>
        </div>
        @method('PUT')
        <div class="row g-5">
            <div class="col-12 col-xl-8">
                <h4 class="mb-3">judul</h4><input class="form-control mb-5" type="text"
                    name="judul" value="{{ old('name', $sliders->judul) }}"
                    placeholder="Write title here..." />
                <div class="mb-6">
                    <h4 class="mb-3"> Deskripsi </h4>
                    <textarea class="tinymce" name="deskripsi"
                        data-tinymce='{"height":"15rem","placeholder":"Write a description here...","plugins": "nonbreaking"}'>{{ old('description', $sliders->deskripsi) }}</textarea>
                </div>
                <h4 class="mb-3">Tambah Gambar</h4>
                <div class="mb-3">
                    <div class="d-flex align-items-center flex-column">
                        <input class="form-control @error('path_kamar') is-invalid @enderror"
                        type="file" name="path_kamar" id="formFile">
                        @if ($sliders->path_kamar)
                        <img class="mt-2" id="image-preview"
                        src="{{ asset('storage/slider/' . $sliders->path_kamar) }}"
                        alt="Preview"
                        style="width: 50%; height: auto; border-radius: 5px">
                        @endif
                    <img class="mt-2" id="image-preview" src="#" alt="Preview"
                    style="display: none; width: 50%; height: auto; border-radius: 5px">
                    @error('path_kamar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="col-12 col-sm-6 col-xl-12">
                        <div class="mb-4">
                            <h5 class="mb-2 text-1000">Harga</h5><input class="form-control mb-xl-3"
                                type="number" name="harga"
                                value="{{ old('name', $sliders->harga) }}" placeholder="price" />
                        </div>
                    </div>
                </div>
                <script>
                    document.getElementById('formFile').addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('image-preview').src = e.target.result;
                            document.getElementById('image-preview').style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    });
                </script>
            </div>
            <div class="col-12 col-xl-4">
                <div class="row g-2 order-xl-last">
                    <div class="col-12 col-xl-12 order-xl-first">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Pengaturan</h4>
                                <div class="mb-6">
                                    <h4 class="mb-3">Fasilitas</h4>
                                    <textarea class="form-control @error('fasilitas') is-invalid @enderror" name="fasilitas" rows="3"
                                        placeholder="Masukkan fasilitas kamar">{{ old('fasilitas', $sliders->fasilitas) }}</textarea>
                                    @error('fasilitas')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                                
                                <div class="mb-6">
                                    <h4 class="mb-3">Diskon</h4>
                                    <input class="form-control @error('diskon') is-invalid @enderror" type="number" name="diskon" value="{{ old('diskon', $sliders->diskon) }}"
                                        placeholder="Masukkan diskon kamar">
                                    @error('diskon')
                                        <strong class="invalid-feedback">
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
<footer class="footer position-absolute">
    <div class="row g-0 justify-content-between align-items-center h-100">
      <div class="col-12 col-sm-auto text-center">
        <p class="mb-0 mt-2 mt-sm-0 text-900">Copyright © Small<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2024</p>
      </div>
      <div class="col-12 col-sm-auto text-center">
      </div>
    </div>
  </footer>
</div>
@endsection