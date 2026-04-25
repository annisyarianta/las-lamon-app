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
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (empty($data) || count($data) == 0)
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <h4 class="text-secondary">Your cart is empty.</h4>
                                </td>
                            </tr>
                        @else
                            @foreach ($data as $data_order_item)
                                @foreach ($data_order_item->order_items as $each_data)
                                    <tr>

                                        <td>
                                            <p class="mb-0 mt-4">
                                                {{ ucwords(str_replace('_', ' ', $each_data->catalogue->name ?? '-')) }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="mb-0 mt-4">
                                                {{ $each_data->product->name ?? '-' }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="mb-0 mt-4 text-center">
                                                {{ $each_data->quantity ?? '-' }}
                                            </p>
                                        </td>

                                        <td class="text-center">
                                            <div class="d-flex flex-column flex-md-row justify-content-center gap-1">

                                                <!-- e-Certificate -->
                                                <a href="{{ route('adopter.certificate.show', ['id' => $each_data->certificate->id]) }}"
                                                class="btn btn-primary rounded-pill px-2 py-1 px-md-3 py-md-2 small">
                                                    <i class="fa fa-certificate me-1"></i>
                                                    <span class="d-none d-md-inline">e-Certificate</span>
                                                </a>
                                                <!-- Location -->
                                                <a href="{{ $each_data->location->location_url ?? '#' }}"
                                                    class="btn btn-success rounded-pill 
                                          px-2 py-1 px-md-3 py-md-2 small">
                                                    <i class="fa fa-map-marker-alt me-1"></i>
                                                    <span class="d-none d-md-inline">Location</span>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->

    <!-- Explore More -->
    <div class="d-flex justify-content-end mt-4 ml-5 ml-md-0">
        <a href="{{ route('catalogue.index') }}"
            class="text-primary text-decoration-none d-inline-flex align-items-center gap-1">
            Explore More Catalogue
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>
@endsection
