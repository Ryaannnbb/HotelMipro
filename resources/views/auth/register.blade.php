<!DOCTYPE html>
<html lang="en-US" dir="ltr">


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/authentication/card/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 13:02:10 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Small Hotel</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/hotel10.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/hotel10.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/hotel10.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/hotel10.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="{{ asset('assets/css/theme-rtl.min.css') }}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css') }}" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css') }}" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>
<style>
    .auth-img-holder {
    width: 100%; /* Lebar sesuai dengan kontennya */
    height: 100%; /* Tinggi sesuai dengan kontennya */
    overflow: hidden;
    }

    .auth-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

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


<body>
    @include('sweetalert.sweetalert')
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid bg-300 dark__bg-1200">
            <div class="bg-holder bg-auth-card-overlay">
            </div>
            <!--/.bg-holder-->
            <div class="row flex-center position-relative min-vh-100 g-0 py-5">
                <div class="col-11 col-sm-10 col-xl-8">
                    <div class="card border border-200 auth-card">
                        <div class="card-body pe-md-0">
                            <div class="row align-items-center gx-0 gy-7">
                                <div
                                    class="col-auto bg-100 dark__bg-1100 rounded-3 position-relative auth-title-box">
                                    <div class="bg-holder auth-img-holder">
                                        <img src="{{ asset('assets/img/e-commerce/register.jpg') }}" class="auth-img rounded-3" alt="Authentication Image">
                                    </div>
                                    <!--/.bg-holder-->
                                    <div class="position-relative px-4 px-lg-7 pt-7 pb-7 pb-sm-5 text-center text-md-start pb-lg-7 card-sign-up">
                                    </div>
                                    <div
                                        class="position-relative z-index--1 mb-6 d-none d-md-block text-center mt-md-15">
                                        <img class="auth-title-box-img d-dark-none"
                                            src="../../../assets/img/spot-illustrations/auth.png" alt="" /><img
                                            class="auth-title-box-img d-light-none"
                                            src="../../../assets/img/spot-illustrations/auth-dark.png" alt="" />
                                    </div>
                                </div>
                                <div class="col mx-auto">
                                    <div class="auth-form-box">
                                        <div class="text-center mb-7"><a
                                                class="d-flex flex-center text-decoration-none mb-4"
                                                href="../../../index.html">
                                                <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block" style="margin-top: 5px;">
                                                    <img src="{{ asset('assets/img/brands/small.png') }}" alt="logo" width="58" />
                                                </div>
                                            </a>
                                            <h3 class="text-1000">Sign Up</h3>
                                            <p class="text-700">Create your account today</p>
                                        </div>

                                        <form method="POST" action="{{ route('Createregister') }}">
                                            @csrf

                                            <div class="mb-3 text-start"><label class="form-label"
                                                    for="name">Name</label><input
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') }}" autocomplete="name"
                                                    autofocus id="name" type="text" placeholder="Name" />
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 text-start"><label class="form-label"
                                                    for="email">Email address</label><input
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" autocomplete="email"
                                                    id="email" type="email" placeholder="name@example.com" />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row g-3 mb-3">
                                                <div class="col-xl-6"><label class="form-label"
                                                        for="password">Password</label><input
                                                        class="form-control form-icon-input @error('password') is-invalid @enderror"
                                                        name="password" autocomplete="new-password" id="password"
                                                        type="password" placeholder="Password" />
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-xl-6"><label class="form-label"
                                                        for="confirmPassword">Confirm Password</label><input
                                                        class="form-control form-icon-input"
                                                        name="password_confirmation" autocomplete="new-password"
                                                        id="confirmPassword" type="password"
                                                        placeholder="Confirm Password" /></div>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input mt-2" id="termsService" type="checkbox" value="" required />
                                                <label class="form-label fs--1 text-none" for="termsService">
                                                    I accept the
                                                    <button id="termsButton" type="button" class="btn btn-link mx-n3" data-bs-toggle="modal" data-bs-target="#termsModal">
                                                        terms
                                                    </button>
                                                    and
                                                    <button type="button" class="btn btn-link mx-n4" data-bs-toggle="modal" data-bs-target="#privacyModal">
                                                        privacy policy
                                                    </button>
                                                </label>
                                            </div>
                                            <button class="btn btn-primary w-100 mb-3">Sign up</button>
                                            <div class="text-center"><a class="fs--1 fw-bold"
                                                    href="{{ route('login') }}">Sign in to an existing account</a>
                                            </div>
                                        </form>
                                        <!-- Terms Modal -->
                                        <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Last Updated: [06/03/2024]</h4>
                                                        <br>
                                                        <p>Welcome to Small Hotels! These Terms of Service govern your
                                                            use of
                                                            our website (www.SmallHotel.com) and the services provided
                                                        </p>
                                                        <br>
                                                        <p>By accessing or using our services, you agree to comply with and be bound by these Terms. If you do not agree with any part of these Terms, please do not use our services.</p>
                                                        <br>
                                                        <h4 class="mb-3">1. Use of Services</h4>
                                                        <p>You agree to stay at Small Hotel only for lawful purposes
                                                            and in a manner consistent with all local, state,
                                                            national and international laws and regulations.</p>
                                                        <br>
                                                        <h4 class="mb-3">2. User Accounts</h4>
                                                        <p>To access certain features of our services, you may be required to create a user account. You are responsible for maintaining the confidentiality of your account information and for all activities that occur under your account.</p>
                                                        <br>
                                                        <h4 class="mb-3">3. Limitation of Liability</h4>
                                                        <p>small Hotel shall not be liable for any indirect, incidental,
                                                            special, consequential, or punitive damages arising out of
                                                            or related to your use of our services.</p>
                                                        <br>
                                                        <h4 class="mb-3">4. Termination</h4>
                                                        <p>Small Hotel reserves the right to terminate or suspend your
                                                            account
                                                            and access to our services at any time, without prior
                                                            notice, for any reason.</p>
                                                        <br>
                                                        <h4 class="mb-3">5. Changes to Terms</h4>
                                                        <p>Small Hotel may update these Terms of Service from time to
                                                            time.
                                                            The most current version will be posted on our website.
                                                            Continued use of our services after any changes indicate
                                                            your acceptance of the revised terms.</p>
                                                        <br>
                                                        <h4 class="mb-3">Contact Information</h4>
                                                        <p class="mb-3">If you have any questions or concerns about
                                                            these Terms of Service, please contact us at
                                                            info@SmallHotel.com.
                                                        </p>
                                                        <p class="mb-3">Thank you for choosing Small Hotel!</p>
                                                        <p class="mb-n1">Jalan Soekarno Hatta No. 123 Kota Tuban,
                                                            Indonesia</p>
                                                        <p class="mb-n1">Phone: <a
                                                                href="http://wa.me/6288989087546">+62 889-8908-7546</a>
                                                            (admin)</p>
                                                        <p>Email: smallhotel@gmail.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Privacy Modal -->
                                        <div class="modal fade" id="privacyModal" tabindex="-1" role="dialog" aria-labelledby="privacyModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Last Updated: [06/03/2024]</h4>
                                                        <br>
                                                        <p>Welcome to Small Hotel! This privacy policy explains how
                                                            Small Hotels
                                                            collect, use and protect your personal information
                                                            when you use our website (www.SmallHotel.com).</p>
                                                        <br>
                                                        <h4 class="mb-3">Information We Collect</h4>
                                                        <p class="mb-3">
                                                            Saat Anda menggunakan situs Hotell Smal, kami mungkin
                                                            mengumpulkan informasi pribadi yang Anda berikan secara
                                                            sukarela,
                                                            termasuk namun tidak terbatas </p>
                                                        <ul>
                                                            <li>Name and contact information</li>
                                                            <li>Email address</li>
                                                            <li>Payment information (if applicable)</li>
                                                        </ul>
                                                        <br>
                                                        <h4 class="mb-3">Use of Information</h4>
                                                        <p>Small Hotel uses the collected personal information</p>
                                                        <ul>
                                                            <li>Process orders and payments</li>
                                                            <li>Deliver information regarding products or services</li>
                                                            <li>Provide customer support</li>
                                                            <li>Personalize the user experience on our website</li>
                                                            <li>Conduct analysis and improve our services</li>
                                                        </ul>
                                                        <h4 class="mb-3">Sharing Information with Third Parties</h4>
                                                        <p>Small Hotel does not sell, rent, or trade customer's personal
                                                            information to third parties without your consent, except
                                                            when required by law or to provide services requested by
                                                            you.</p>
                                                        <br>
                                                        <br>
                                                        <h4 class="mb-3">Your Rights</h4>
                                                        <p>You have the right to access, correct, or delete your
                                                            personal information that we hold. If you have any questions
                                                            or privacy-related requests, please contact us at
                                                            info@Smallhotel.com.</p>
                                                        <br>
                                                        <h4 class="mb-3">Changes to Privacy Policy</h4>
                                                        <p class="mb-3">Small Hotel may update this privacy policy from
                                                            time to time. Significant changes will be communicated
                                                            through our website or via direct contact.</p>
                                                        <p class="mb-3">By using the Small Hotel website, you agree to this
                                                            privacy policy.</p>
                                                        <p class="mb-5">Thank you for choosing Small Hotel as your accommodation </p>
                                                        <p class="mb-n1">Jalan Soekarno Hatta No. 123 Kota Tuban,
                                                            Indonesia</p>
                                                        <p class="mb-n1">Phone: <a
                                                                href="http://wa.me/6288989087546">+62 889-8908-7546</a>
                                                            (admin)</p>
                                                        <p>Email: smallhotel@gmail.com</p>
                                                        <br>
                                                        <p><i>Enjoy your chosen room!</i></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Bootstrap JS -->
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.4/js/bootstrap.bundle.min.js"></script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('vendors/dayjs/dayjs.min.js') }}"></script>
    <script src="{{ asset('assets/js/phoenix.js') }}"></script>
</body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/authentication/card/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 13:02:10 GMT -->

</html>
