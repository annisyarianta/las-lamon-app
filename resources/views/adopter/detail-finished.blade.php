@extends('layouts.app')

@section('title', 'Detail Finished Order - Las Lamon')

@section('content')
    <style>
        @media (max-width: 576px) {
            .d-flex.justify-content-center.mt-4 {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .d-flex.justify-content-center.mt-4 a {
                width: 100%;
                text-align: center;
                margin-right: 0 !important;
                /* override me-4 */
            }
        }
    </style>

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Detail Finished Order</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/myorder') }}" class="text-secondary">My Order</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-secondary">Finished</a></li>
            <li class="breadcrumb-item active text-white">Detail Finished Order</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Detail Page Start -->
    <div class="container-fluid">
        <div class="container py-3 col-xl-6 mx-auto">
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <div class="mb-4 pb-3 border-bottom border-secondary">
                        <div class="d-flex justify-content-start mb-1">
                            <h6 class="mb-0">Order Date :</h6>
                            <p class="mb-0 ms-2">
                                {{ \Carbon\Carbon::parse($data_order->order_date)->translatedFormat('d F Y \a\t H:i') }}
                            </p>

                        </div>
                        <div class="d-flex justify-content-start mb-1">
                            <h6 class="mb-0">Order Code :</h6>
                            <p class="mb-0 ms-2">{{ $data_order->code }}</p>
                        </div>
                        <div class="d-flex justify-content-start mb-1">
                            <h6 class="mb-0">Status :</h6>
                            <p class="mb-0 ms-2"><span c class="badge bg-success">{{ $data_order->status_order }}</span></p>
                        </div>
                    </div>
                    @foreach ($data_order_item as $each_data)
                        <div class="d-flex align-items-center flex-nowrap gap-3 ">
                            <div class="bg-light rounded">
                                <img src="{{ asset($each_data->catalogue->image_url) }}" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 w-100 d-flex flex-column">
                                <h4 class="mb-1">{{ $each_data->catalogue->name }}</h4>
                                <p class="m-0">{{ $each_data->product->name ?? '-' }}</p>
                                <p class="m-0">X {{ $each_data->quantity }}</p>
                                <p class="mb-0 fw-bold text-end mt-auto">
                                    Rp{{ number_format($each_data->total_price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="testimonial-item img-border-radius bg-light rounded p-4 mt-3">
                <div class="position-relative">
                    <div class="mb-0 pb-0">
                        <div class="d-flex justify-content-between mb-1">
                            <h6 class="mb-0">Total Payment</h6>
                            <p class="mb-0 ms-2">Rp{{ number_format($data_order->total_price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="action-bar">
                <div class="d-flex justify-content-center mt-4 action-bar-content">
                    <a href={{ route('adopter.receipt.show', ['id' => Crypt::encrypt($data_order->id)]) }} class="btn btn-md border border-secondary rounded-pill px-3 text-primary me-3">
                        <i class="fas fa-print me-3"></i>Cetak Kwitansi
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail Page End -->
@endsection
