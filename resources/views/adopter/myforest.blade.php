@extends('layouts.app')

@section('title', 'My Forest - Las Lamon')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">My Forest</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">My Forest</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Products</th>
                            <th>Name</th>
                            <th>Qty</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- Image -->
                            <td>
                                <img src="{{ asset('assets/img/hero-img.jpg') }}" class="img-fluid rounded"
                                    style="width: 70px; height: 70px; object-fit: cover;">
                            </td>

                            <!-- Name -->
                            <td>Big Banana</td>

                            <!-- Quantity -->
                            <td>10</td>

                            <!-- Action -->
                            <td class="text-center">
                                <div class="d-flex flex-column flex-md-row justify-content-center gap-1">

                                    <!-- e-Certificate -->
                                    <a href="{{ route('certificate') }}"
                                        class="btn btn-primary rounded-pill 
                                          px-2 py-1 px-md-3 py-md-2 small">
                                        <i class="fa fa-certificate me-1"></i>
                                        <span class="d-none d-md-inline">e-Certificate</span>
                                    </a>
                                    <!-- Location -->
                                    <a href="{{ route('receipt') }}"
                                        class="btn btn-success rounded-pill 
                                          px-2 py-1 px-md-3 py-md-2 small">
                                        <i class="fa fa-map-marker-alt me-1"></i>
                                        <span class="d-none d-md-inline">Location</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->

    <!-- Explore More -->
    <div class="d-flex justify-content-end mt-4 ml-5 ml-md-0">
        <a href="{{ route('catalogue') }}" class="text-primary text-decoration-none d-inline-flex align-items-center gap-1">
            Explore More Catalogue
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>
@endsection
