@extends('layouts.app')

@section('title', 'Checkout - Las Lamon')

@section('content')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/cart') }}" class="text-secondary">My Cart</a></li>
            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{ asset('assets/img/hero-img.jpg') }}" class="img-fluid"
                                                style="width: 90px; height: 90px;" alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">Awesome Brocoli</td>
                                    <td class="py-5">$69.00</td>
                                    <td class="py-5 px-4">200</td>
                                    <td class="py-5">$138.00</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{ asset('assets/img/hero-img.jpg') }}" class="img-fluid"
                                                style="width: 90px; height: 90px;" alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">Awesome Brocoli</td>
                                    <td class="py-5">$69.00</td>
                                    <td class="py-5 px-4">200</td>
                                    <td class="py-5">$138.00</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{ asset('assets/img/hero-img.jpg') }}" class="img-fluid"
                                                style="width: 90px; height: 90px;" alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">Awesome Brocoli</td>
                                    <td class="py-5">$69.00</td>
                                    <td class="py-5 px-4">200</td>
                                    <td class="py-5">$138.00</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">$135.00</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="justify-content-end">
                        <div class="col-sm-8 col-md-7 col-lg-6 col-xl-12">
                            <div class="bg-light rounded">
                                <div class="p-4 border-bottom">
                                    <h2 class="mb-0">PAYMENT METHOD</h2>
                                </div>
                                <div class="py-4 mb-4 d-flex flex-column">
                                    <h5 class="mb-2 ps-4">Transfer Bank</h5>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0 ps-4 me-4">123456xxx</h5>
                                        <p class="mb-0 pe-4">(Bank BCA)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8 col-md-7 col-lg-6 col-xl-12">
                            <div class="bg-light rounded">
                                <div class="p-4">
                                    <h2 class="mb-4">PAYMENT DETAILS</h2>
                                    <div class="d-flex justify-content-between mb-2">
                                        <h5 class="mb-0 me-4">Order Total :</h5>
                                        <p class="mb-0">Rp50.000</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0 me-4">Service Fee :</h5>
                                        <div class="">
                                            <p class="mb-0">Rp1.500</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-4 mb-4 border-top  d-flex justify-content-between">
                                    <h5 class="mb-0 ps-4 me-4">Total Payment :</h5>
                                    <p class="mb-0 pe-4">Rp51.500</p>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="button"
                                class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Page End -->
@endsection
