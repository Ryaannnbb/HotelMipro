@extends('layout_admin.app')

@section('content')
  @include('sweetalert.sweetalert')
  <div class="modal fade" id="searchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true"
    data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
    <div class="modal-dialog">
      <div class="modal-content mt-15 rounded-pill">
        <div class="modal-body p-0">
          <div class="search-box navbar-top-search-box" data-list='{"valueNames":["title"]}' style="width: auto;">
            <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                class="form-control search-input fuzzy-search rounded-pill form-control-lg" type="search"
                placeholder="Search..." aria-label="Search" />
              <span class="fas fa-search search-box-icon"></span>
            </form>
            <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none"
              data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button>
            </div>
            <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
              <div class="scrollbar-overlay" style="max-height: 30rem;">
                <div class="list pb-3">
                  <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span class="text-500">results</span></h6>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently
                    Searched </h6>
                  <div class="py-2"><a class="dropdown-item" href="../landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"><span class="fa-solid fa-clock-rotate-left"
                            data-fa-transform="shrink-2"></span> Store Macbook</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"> <span class="fa-solid fa-clock-rotate-left"
                            data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                      </div>
                    </a>
                  </div>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Products
                  </h6>
                  <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                      href="../landing/product-details.html">
                      <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3"
                          src="../../../assets/img/products/60x60/3.png" alt="" /></div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                        <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB
                            Memory - 1.6GHz - 128GB Storage</span></p>
                      </div>
                    </a>
                    <a class="dropdown-item py-2 d-flex align-items-center" href="../landing/product-details.html">
                      <div class="file-thumbnail me-2"><img class="img-fluid"
                          src="../../../assets/img/products/60x60/3.png" alt="" /></div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                        <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600 ms-2">30 Sep at 12:30
                            PM</span></p>
                      </div>
                    </a>
                  </div>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick
                    Links</h6>
                  <div class="py-2"><a class="dropdown-item" href="../landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"><span class="fa-solid fa-link text-900"
                            data-fa-transform="shrink-2"></span> Support MacBook House</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"> <span class="fa-solid fa-link text-900"
                            data-fa-transform="shrink-2"></span> Store MacBook″</div>
                      </div>
                    </a>
                  </div>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Files
                  </h6>
                  <div class="py-2"><a class="dropdown-item" href="../landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"><span class="fa-solid fa-file-zipper text-900"
                            data-fa-transform="shrink-2"></span> Library MacBook folder.rar
                        </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"> <span class="fa-solid fa-file-lines text-900"
                            data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt
                        </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"> <span class="fa-solid fa-image text-900"
                            data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                      </div>
                    </a>
                  </div>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Members
                  </h6>
                  <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                      href="../../../pages/members.html">
                      <div class="avatar avatar-l status-online  me-2 text-900">
                        <img class="rounded-circle " src="../../../assets/img/team/40x40/10.webp" alt="" />
                      </div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                        <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                      </div>
                    </a>
                    <a class="dropdown-item py-2 d-flex align-items-center" href="../../../pages/members.html">
                      <div class="avatar avatar-l  me-2 text-900">
                        <img class="rounded-circle " src="../../../assets/img/team/40x40/12.webp" alt="" />
                      </div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-1000 title">John Smith</h6>
                        <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                      </div>
                    </a>
                  </div>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Related
                    Searches</h6>
                  <div class="py-2"><a class="dropdown-item" href="../landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"><span class="fa-brands fa-firefox-browser text-900"
                            data-fa-transform="shrink-2"></span> Search in the Web MacBook
                        </div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"> <span class="fa-brands fa-chrome text-900"
                            data-fa-transform="shrink-2"></span> Store MacBook″</div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="text-center">
                  <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <div class="content">
    <form method="POST" action="{{ route('pembayaran.store') }}" class="mb-9" enctype="multipart/form-data">
        @csrf
        <div>
            <div class="row g-3 flex-between-end mb-5">
                <div class="col-auto">
                    <h4 class="mb-2">Add a payment</h4>
                    <h5 class="text-700 fw-semi-bold">Payments processed across your hotel</h5>
                </div>
                <div class="col-auto">
                    <a class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" href="{{ route('pembayaran') }}">Discard</a>
                    <button class="btn btn-primary mb-2 mb-sm-0" type="submit">add Payment</button>
                </div>
            </div>
            <div class="mb-2">
                <h4 class="mb-2 fw-bold">Payment Method</h4>
                <select name="metode_pembayaran" id="selectMetode" class="form-control">
                    <option value="" class="dropdown-menu" disabled selected>Select Payment Method</option>
                    <option value="e-wallet" data-target="ewalletInput">E-Wallet</option>
                    <option value="bank" data-target="bankInput">Bank</option>
                </select>
            </div>

            <div class="form-section" value="e-wallet" id="ewalletInput" style="display: none;">
                <!-- E-Wallet Form -->
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Objective</label>
                    <input type="text" name="tujuan_ewallet" class="form-control" value="{{ old('tujuan_ewallet') }}">
                    @if ($errors->has('tujuan_ewallet'))
                        <span class="text-danger">{{ $errors->first('tujuan_ewallet') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">E-wallet</label>
                    <input type="file" name="keterangan_ewallet" id="keterangan_ewallet" class="form-control"
                        value="{{ old('keterangan_ewallet') }}">
                    @if ($errors->has('keterangan_ewallet'))
                        <span class="text-danger">{{ $errors->first('keterangan_ewallet') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-section" id="bankInput" style="display: none;">
                <!-- Bank Form -->
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Bank</label>
                    <input type="text" name="tujuan_bank" id="tujuan_bank" class="form-control"
                        value="{{ old('tujuan_bank') }}">
                    @if ($errors->has('tujuan_bank'))
                        <span class="text-danger">{{ $errors->first('tujuan_bank') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Account Number</label>
                    <input type="number" name="keterangan_bank" id="keterangan_bank" class="form-control"
                        value="{{ old('keterangan_bank') }}">
                    @if ($errors->has('keterangan_bank'))
                        <span class="text-danger">{{ $errors->first('keterangan_bank') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- JavaScript to Toggle Form Sections -->
        <script>
            $(document).ready(function () {
                // Event listener for select element change
                $('#selectMetode').change(function () {
                    // Hide all form sections
                    $('.form-section').hide();

                    // Show the selected form section
                    $('#' + $(this).find(':selected').data('target')).show();
                });
            });
        </script>
    </form>



    <footer class="footer position-absolute">
      <div class="row g-0 justify-content-between align-items-center h-100">
        <div class="col-12 col-sm-auto text-center">
          <p class="mb-0 mt-2 mt-sm-0 text-900">Copyright © Small<span class="d-none d-sm-inline-block"></span><span
              class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2024</p>

        </div>
        <div class="col-12 col-sm-auto text-center">
        </div>
      </div>
    </footer>
  </div>
  <script>
    const select = document.getElementById('selectMetode');
    const ewalet = document.getElementById('ewalletInput');
    const bankInput = document.getElementById('bankInput');


    select.addEventListener('change', function(){
        if (this.value === 'e-wallet') {
            ewalet.style.display = 'block';
            bankInput.style.display = 'none';
            tujuan.removeAttribute('name')

        } else{
            ewalet.style.display = 'none';
            bankInput.style.display = 'block';
        }
    });

  </script>
@endsection
