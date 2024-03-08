@extends('layout_user.app')

@section('content')
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-5 pb-9">
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
                    <form>
                        <div class="d-flex align-items-end">
                            <h3 class="mb-0 me-3">Shipping Details</h3>
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
                                        <h5 class="lh-sm fw-normal text-800">Yuni Nirmala</h5>
                                    </td>
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
                                        <h5 class="lh-lg fw-normal text-800">Apt: 6/B, 192 Edsel Road, Van Nuys <br>
                                            California, USA 96580</h5>
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
                                        <h5 class="lh-sm fw-normal text-800">085778428774</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr class="my-6">
                        <h3 class="mb-5">Payment</h3>
                        <div class="row g-4 mb-7">
                            <div class="col-12">
                                <div class="row gx-lg-11">
                                    {{-- <div class="col-12 col-md-auto">
                                        <div class="d-flex">
                                            <div class="form-check"><input class="form-check-input" id="creditCard"
                                                    type="radio" name="paymentMethod" checked="checked" /><label
                                                    class="form-check-label fs-0 text-900 me-3" for="creditCard">Credit
                                                    card</label></div><img class="h-100 me-2 ms-4 ms-md-0"
                                                src="../../../assets/img/logos/visa.png" alt="" /><img
                                                class="h-100 me-2" src="../../../assets/img/logos/discover.png"
                                                alt="" /><img class="h-100 me-2"
                                                src="../../../assets/img/logos/mastercard.png" alt="" /><img
                                                class="h-100" src="../../../assets/img/logos/american_express.png"
                                                alt="" />
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-12 col-md-auto">
                                        <div class="form-check"><input class="form-check-input" id="paypal"
                                                type="radio" name="paymentMethod" /><label
                                                class="form-check-label fs-0 text-900" for="paypal">Paypal </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto">
                                        <div class="form-check"><input class="form-check-input" id="coupon"
                                                type="radio" name="paymentMethod" /><label
                                                class="form-check-label fs-0 text-900" for="coupon">Coupon </label>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-12"><label class="form-label fs-0 text-1000 ps-0 text-none"
                                    for="selectCard">Select payment</label><select class="form-select text-black"
                                    id="selectCard">
                                    <option selected="selected">select a card</option>
                                    <option value="visa">Visa</option>
                                    <option value="discover">Discover</option>
                                    <option value="mastercard">Mastercard</option>
                                    <option value="american-express">American Express</option>
                                </select></div>
                                <div class="col-md-12">
                                    <label class="form-label fs-0 text-1000 ps-0 text-none"
                                    for="selectCard">Start date</label>
                                    <input class="form-control datetimepicker mb-4 start-date @error('awal_berlaku') is-invalid @enderror" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true,"dateFormat":"d-m-Y"}' name="awal_berlaku" />
                                    <label class="form-label fs-0 text-1000 ps-0 text-none"
                                    for="selectCard">End date</label>
                                    <input class="form-control datetimepicker mb-4 start-date @error('awal_berlaku') is-invalid @enderror" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true,"dateFormat":"d-m-Y"}' name="awal_berlaku" />
                                    <label class="form-label fs-0 text-1000 ps-0 text-none"
                                    for="selectCard">Select facility</label>
                                    <select class="form-select text-black" id="selectCard">
                                        <option selected="selected">select a facility</option>
                                        <option value="visa">Food</option>
                                        <option value="discover">Service</option>
                                        <option value="mastercard">Pool</option>
                                        <option value="american-express">Air conditioner</option>
                                    </select>
                                </div>

                            {{-- <div class="col-md-6"><label class="form-label fs-0 text-1000 ps-0 text-none"
                                    for="inputCardNumber">Card number</label><input class="form-control"
                                    id="inputCardNumber" type="number" placeholder="Enter card number"
                                    aria-label="Card number" /></div> --}}
                            {{-- <div class="col-md-6"><label class="form-label fs-0 text-1000 ps-0 text-none">Expires
                                    on</label>
                                <div class="d-flex"><select class="form-select text-black me-3">
                                        <option selected="selected">Month</option>
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                    </select><select class="form-select text-black">
                                        <option selected="selected">Year</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select></div>
                            </div> --}}
                            {{-- <div class="col-md-6"><label class="form-label fs-0 text-1000 ps-0 text-none"
                                    for="inputCardCVC">CVC</label><input class="form-control" id="inputCardCVC"
                                    type="number" placeholder="Enter a valid CVC" aria-label="CVC" /></div> --}}
                            {{-- <div class="col-12">
                                <div class="form-check"><input class="form-check-input" id="gridCheck"
                                        type="checkbox" /><label class="form-check-label text-black fs-0"
                                        for="gridCheck">Save Card Details</label></div>
                            </div> --}}
                        </div>
                        <div class="row g-2 mb-5 mb-lg-0">
                            <div class="col-md-8 col-lg-9 d-grid"><button class="btn btn-primary" type="submit">Pay
                                    {{-- $695.20--}}</button></div>
                            <div class="col-md-4 col-lg-3 d-grid"><button class="btn btn-phoenix-secondary text-nowrap"
                                    type="submit">Save Order and Exit</button></div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="card mt-3 mt-lg-0">
                        <div class="card-body">
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
                                                    src="{{ asset('assets/img/kamar4.png') }}" width="40"
                                                    alt="" />
                                                <h6 class="fw-semi-bold text-1000 lh-base">Luxury room</h6>
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
                                    <h5 class="text-900 fw-semi-bold">Items subtotal: </h5>
                                    <h5 class="text-900 fw-semi-bold">$691</h5>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="text-900 fw-semi-bold">Discount: </h5>
                                    <h5 class="text-danger fw-semi-bold">-$59</h5>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="text-900 fw-semi-bold">Tax: </h5>
                                    <h5 class="text-900 fw-semi-bold">$126.20</h5>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="text-900 fw-semi-bold">Subtotal </h5>
                                    <h5 class="text-900 fw-semi-bold">$665</h5>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="text-900 fw-semi-bold">Shipping Cost </h5>
                                    <h5 class="text-900 fw-semi-bold">$30 </h5>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between border-dashed-y pt-3">
                                <h4 class="mb-0">Total :</h4>
                                <h4 class="mb-0">$695.20</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end of .container-->
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
</main>
@endsection
