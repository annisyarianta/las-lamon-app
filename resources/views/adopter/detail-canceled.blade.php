@extends('layouts.app')

@section('title', 'Detail Canceled Order - Las Lamon')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Detail Canceled Order</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/myorder') }}" class="text-secondary">My Order</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-secondary">Canceled</a></li>
            <li class="breadcrumb-item active text-white">Detail Canceled Order</li>
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
                                {{ \Carbon\Carbon::parse($data_order->tanggal_order)->translatedFormat('d F Y \a\t H:i') }}
                            </p>

                        </div>
                        <div class="d-flex justify-content-start mb-1">
                            <h6 class="mb-0">Order Code :</h6>
                            <p class="mb-0 ms-2">{{ $data_order->kode }}</p>
                        </div>
                        <div class="d-flex justify-content-start mb-1">
                            <h6 class="mb-0">Status :</h6>
                            <p class="mb-0 ms-2"><span c class="badge bg-danger">{{ $data_order->status_order }}</span></p>
                        </div>
                    </div>
                    @foreach ($data_order_item as $each_data)
                        <div class="d-flex align-items-center flex-nowrap gap-3 ">
                            <div class="bg-light rounded">
                                <img src="{{ asset($each_data->katalog->url_gambar) }}" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 w-100 d-flex flex-column">
                                <h4 class="mb-1">{{ $each_data->katalog->nama_katalog }}</h4>
                                <p class="m-0">{{ $each_data->produk->nama_produk ?? '-' }}</p>
                                <p class="m-0">X {{ $each_data->kuantitas }}</p>
                                <p class="mb-0 fw-bold text-end mt-auto">
                                    Rp{{ number_format($each_data->harga_total, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Detail Page End -->
@endsection
