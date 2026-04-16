@extends('layouts.app')

@section('title', 'Cart - Las Lamon')

@section('content')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">My Cart</h1>
    </div>
    <!-- Single Page Header End -->

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/hero-img.jpg') }}" class="img-fluid me-5"
                                        style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">Big Banana</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/hero-img.jpg') }}" class="img-fluid me-5"
                                        style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">Big Banana</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/hero-img.jpg') }}" class="img-fluid me-5"
                                        style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">Big Banana</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-5 text-center">
                <button onclick="window.location.href='/checkout'" class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">CHECKOUT</button>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->
@endsection
