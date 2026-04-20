@extends('layouts.app')

@section('title', 'Payment Detail - Las Lamon')

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
        <h1 class="text-center text-white display-6">Payment Detail</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/myorder') }}" class="text-secondary">My Order</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-secondary">Unpaid</a></li>
            <li class="breadcrumb-item active text-white">Payment Detail</li>
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
                            <p class="mb-0 ms-2">12 April 2026</p>
                        </div>
                        <div class="d-flex justify-content-start mb-1">
                            <h6 class="mb-0">Order Code :</h6>
                            <p class="mb-0 ms-2">XYZ12345678</p>
                        </div>
                        <div class="d-flex justify-content-start mb-1">
                            <h6 class="mb-0">Status :</h6>
                            <p class="mb-0 ms-2"><span class="badge bg-dark">Unpaid</span></p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-light rounded">
                            <img src="{{ asset('assets/img/mini-forest.png') }}" class="img-fluid rounded"
                                style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 w-100 d-flex flex-column">
                            <h4 class="mb-1">Paket Hutan Mini</h4>
                            <p class="m-0">x 1</p>
                            <p class="mb-0 fw-bold text-end mt-auto">Rp250.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4 mt-3">
                <div class="position-relative">
                    <div class="mb-0 pb-0">
                        <div class="d-flex justify-content-between mb-1">
                            <h6 class="mb-0">Total Pembayaran</h6>
                            <p class="mb-0 ms-2">Rp250.000</p>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <h6 class="mb-0">Bayar dalam</h6>
                            <p class="mb-0 ms-2 text-danger">23 jam 58 menit 12 detik</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-0">Jatuh Tempo</h6>
                            <p class="mb-0 ms-2">12 April 2026, 11:26</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4 mt-3">
                <div class="position-relative">
                    <div class="mb-0 pb-0">
                        <h6 class="mb-3">Transfer Bank</h6>
                        <h6 class="mb-1">Bank BCA</h6>
                        <h6 class="mb-1">No. Rekening :</h6>
                        <div class="d-flex justify-content-center">
                            <p class="mb-0 ms-2">1783092683xxx</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="action-bar">
                <div class="d-flex justify-content-center mt-4 action-bar-content">
                    <a href="#" class="btn btn-md border border-secondary rounded-pill px-3 text-primary me-3">
                        <i class="fas fa-upload me-3"></i>Upload Bukti Pembayaran
                    </a>
                    <a href="#" class="btn btn-md border border-secondary rounded-pill px-3 text-primary me-3">
                        <i class="fab fa-whatsapp me-3"></i>Konfirmasi WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail Page End -->
@endsection
