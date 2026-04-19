@extends('layouts.app')

@section('title', 'My Order - Las Lamon')

@section('content')
    <style>
        .nav-tabs-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .nav-tabs-wrapper .nav-tabs {
            flex-wrap: nowrap;
            white-space: nowrap;
        }

        .nav-tabs-wrapper .nav-link {
            flex: 0 0 auto;
        }
    </style>

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">My Order</h1>
    </div>
    <!-- Single Page Header End -->

    <!-- Single Product Start -->
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-12 col-xl-12">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="nav-tabs-wrapper">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button"
                                            role="tab" id="nav-unpaid-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-unpaid" aria-controls="nav-unpaid"
                                            aria-selected="true">Unpaid</button>
                                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-process-tab" data-bs-toggle="tab" data-bs-target="#nav-process"
                                            aria-controls="nav-process" aria-selected="false">In Process</button>
                                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-finished-tab" data-bs-toggle="tab" data-bs-target="#nav-finished"
                                            aria-controls="nav-finished" aria-selected="false">Finished</button>
                                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-canceled-tab" data-bs-toggle="tab" data-bs-target="#nav-canceled"
                                            aria-controls="nav-canceled" aria-selected="false">Canceled</button>
                                    </div>
                                </nav>
                            </div>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-unpaid" role="tabpanel"
                                    aria-labelledby="nav-unpaid-tab">
                                    <div class="px-2">
                                        {{-- DESKTOP --}}
                                        <div class="row g-4 d-none d-md-block">
                                            <div class="col-12">
                                                <div
                                                    class="row order-row align-items-center text-center justify-content-center py-2 fw-bold">
                                                    <div class="col-3">
                                                        <p class="mb-0">Order Date</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Order Code</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Total Payment</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0"><br></p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row order-row bg-light align-items-center text-center justify-content-center py-2">
                                                    <div class="col-3">
                                                        <p class="mb-0">12 April 2026</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">XYZ12345678</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Rp250.000</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0"><a href="{{url('/detail-unpaid')}}"
                                                                class="btn btn-sm border border-secondary rounded-pill px-3 text-primary mt-auto">
                                                                Detail
                                                            </a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- MOBILE --}}
                                        <div class="d-block d-md-none">
                                            <div class="card mb-3 border-0">
                                                <div class="card-body p-3 mb-2 bg-light rounded">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Date</span>
                                                        <span>12 April 2026</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Code</span>
                                                        <span>XYZ12345678</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Total Payment</span>
                                                        <span>Rp250.000</span>
                                                    </div>

                                                    <div class="text-end mt-2">
                                                        <a href="{{url('/detail-unpaid')}}"
                                                            class="btn btn-sm border border-secondary rounded-pill px-3 text-primary">
                                                            Detail
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="nav-process" role="tabpanel"
                                    aria-labelledby="nav-process-tab">
                                    <div class="px-2">
                                        {{-- DESKTOP --}}
                                        <div class="row g-4 d-none d-md-block">
                                            <div class="col-12">
                                                <div
                                                    class="row order-row align-items-center text-center justify-content-center py-2 fw-bold">
                                                    <div class="col-3">
                                                        <p class="mb-0">Order Date</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Order Code</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Total Payment</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0"><br></p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row order-row bg-light align-items-center text-center justify-content-center py-2">
                                                    <div class="col-3">
                                                        <p class="mb-0">12 April 2026</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">XYZ12345678</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Rp250.000</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="d-flex justify-content-center gap-3">
                                                            <a href="#"
                                                                class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                title="Lihat Bukti Pembayaran">
                                                                <i class="fas fa-eye text-primary"></i>
                                                            </a>
                                                            <a href="#"
                                                                class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                title="Edit Bukti Pembayaran">
                                                                <i class="fas fa-pen text-primary"></i>
                                                            </a>
                                                            <a href="#"
                                                                class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                title="Konfirmasi WhatsApp">
                                                                <i class="fab fa-whatsapp text-primary"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row align-items-center text-center justify-content-center py-2">
                                                    <div class="col-3">
                                                        <p class="mb-0">12 April 2026</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">XYZ12345678</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Rp250.000</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="d-flex justify-content-center gap-3">
                                                            <a href="#"
                                                                class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                title="Lihat Bukti Pembayaran">
                                                                <i class="fas fa-eye text-primary"></i>
                                                            </a>
                                                            <a href="#"
                                                                class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                title="Edit Bukti Pembayaran">
                                                                <i class="fas fa-pen text-primary"></i>
                                                            </a>
                                                            <a href="#"
                                                                class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                title="Konfirmasi WhatsApp">
                                                                <i class="fab fa-whatsapp text-primary"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- MOBILE --}}
                                        <div class="d-block d-md-none">
                                            <div class="card mb-3 border-0">
                                                <div class="card-body p-3 mb-2 bg-light rounded">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Date</span>
                                                        <span>12 April 2026</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Code</span>
                                                        <span>XYZ12345678</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Total Payment</span>
                                                        <span>Rp250.000</span>
                                                    </div>

                                                    <div class="d-flex justify-content-end gap-3 mt-3">
                                                        <a href="#"
                                                            class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                            title="Lihat Bukti Pembayaran">
                                                            <i class="fas fa-eye text-primary"></i>
                                                        </a>
                                                        <a href="#"
                                                            class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                            title="Edit Bukti Pembayaran">
                                                            <i class="fas fa-pen text-primary"></i>
                                                        </a>
                                                        <a href="#"
                                                            class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                            title="Konfirmasi WhatsApp">
                                                            <i class="fab fa-whatsapp text-primary"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body p-3 bg-light rounded mb-2">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Date</span>
                                                        <span>12 April 2026</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Code</span>
                                                        <span>XYZ12345678</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Total Payment</span>
                                                        <span>Rp250.000</span>
                                                    </div>

                                                    <div class="d-flex justify-content-end gap-3 mt-3">
                                                        <a href="#"
                                                            class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                            title="Lihat Bukti Pembayaran">
                                                            <i class="fas fa-eye text-primary"></i>
                                                        </a>
                                                        <a href="#"
                                                            class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                            title="Edit Bukti Pembayaran">
                                                            <i class="fas fa-pen text-primary"></i>
                                                        </a>
                                                        <a href="#"
                                                            class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                            title="Konfirmasi WhatsApp">
                                                            <i class="fab fa-whatsapp text-primary"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="nav-finished" role="tabpanel"
                                    aria-labelledby="nav-finished-tab">
                                    <div class="px-2">
                                        {{-- DESKTOP --}}
                                        <div class="row g-4 d-none d-md-block">
                                            <div class="col-12">
                                                <div
                                                    class="row order-row align-items-center text-center justify-content-center py-2 fw-bold">
                                                    <div class="col-3">
                                                        <p class="mb-0">Order Date</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Order Code</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Total Payment</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0"><br></p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row order-row bg-light align-items-center text-center justify-content-center py-2">
                                                    <div class="col-3">
                                                        <p class="mb-0">12 April 2026</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">XYZ12345678</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Rp250.000</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0"><a href="{{url('/detail-finish')}}"
                                                                class="btn btn-sm border border-secondary rounded-pill px-3 text-primary mt-auto">
                                                                Detail
                                                            </a></p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row align-items-center text-center justify-content-center py-2">
                                                    <div class="col-3">
                                                        <p class="mb-0">12 April 2026</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">XYZ12345678</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Rp250.000</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0"><a href="{{url('/detail-finish')}}"
                                                                class="btn btn-sm border border-secondary rounded-pill px-3 text-primary mt-auto">
                                                                Detail
                                                            </a></p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row bg-light align-items-center text-center justify-content-center py-2">
                                                    <div class="col-3">
                                                        <p class="mb-0">12 April 2026</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">XYZ12345678</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Rp250.000</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0"><a href="{{url('/detail-finish')}}"
                                                                class="btn btn-sm border border-secondary rounded-pill px-3 text-primary mt-auto">
                                                                Detail
                                                            </a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- MOBILE --}}
                                        <div class="d-block d-md-none">
                                            <div class="card mb-3 border-0">
                                                <div class="card-body p-3 mb-2 bg-light rounded">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Date</span>
                                                        <span>12 April 2026</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Code</span>
                                                        <span>XYZ12345678</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Total Payment</span>
                                                        <span>Rp250.000</span>
                                                    </div>

                                                    <div class="text-end mt-2">
                                                        <a href="{{url('/detail-finish')}}"
                                                            class="btn btn-sm border border-secondary rounded-pill px-3 text-primary">
                                                            Detail
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body p-3 bg-light rounded mb-2">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Date</span>
                                                        <span>12 April 2026</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Code</span>
                                                        <span>XYZ12345678</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Total Payment</span>
                                                        <span>Rp250.000</span>
                                                    </div>

                                                    <div class="text-end mt-2">
                                                        <a href="{{url('/detail-finish')}}"
                                                            class="btn btn-sm border border-secondary rounded-pill px-3 text-primary">
                                                            Detail
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body p-3 bg-light rounded mb-2">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Date</span>
                                                        <span>12 April 2026</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Code</span>
                                                        <span>XYZ12345678</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Total Payment</span>
                                                        <span>Rp250.000</span>
                                                    </div>

                                                    <div class="text-end mt-2">
                                                        <a href="{{url('/detail-finish')}}"
                                                            class="btn btn-sm border border-secondary rounded-pill px-3 text-primary">
                                                            Detail
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="nav-canceled" role="tabpanel"
                                    aria-labelledby="nav-canceled-tab">
                                    <div class="px-2">
                                        {{-- DESKTOP --}}
                                        <div class="row g-4 d-none d-md-block">
                                            <div class="col-12">
                                                <div
                                                    class="row order-row align-items-center text-center justify-content-center py-2 fw-bold">
                                                    <div class="col-3">
                                                        <p class="mb-0">Order Date</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Order Code</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Total Payment</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0"><br></p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row order-row bg-light align-items-center text-center justify-content-center py-2">
                                                    <div class="col-3">
                                                        <p class="mb-0">12 April 2026</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">XYZ12345678</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Rp250.000</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0"><a href="{{url('/detail-canceled')}}"
                                                                class="btn btn-sm border border-secondary rounded-pill px-3 text-primary mt-auto">
                                                                Detail
                                                            </a></p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row align-items-center text-center justify-content-center py-2">
                                                    <div class="col-3">
                                                        <p class="mb-0">12 April 2026</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">XYZ12345678</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0">Rp250.000</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-0"><a href="{{url('/detail-canceled')}}"
                                                                class="btn btn-sm border border-secondary rounded-pill px-3 text-primary mt-auto">
                                                                Detail
                                                            </a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- MOBILE --}}
                                        <div class="d-block d-md-none">
                                            <div class="card mb-3 border-0">
                                                <div class="card-body p-3 mb-2 bg-light rounded">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Date</span>
                                                        <span>12 April 2026</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Code</span>
                                                        <span>XYZ12345678</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Total Payment</span>
                                                        <span>Rp250.000</span>
                                                    </div>

                                                    <div class="text-end mt-2">
                                                        <a href="{{url('/detail-canceled')}}"
                                                            class="btn btn-sm border border-secondary rounded-pill px-3 text-primary">
                                                            Detail
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body p-3 bg-light rounded mb-2">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Date</span>
                                                        <span>12 April 2026</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Order Code</span>
                                                        <span>XYZ12345678</span>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <span class="fw-semibold text-muted">Total Payment</span>
                                                        <span>Rp250.000</span>
                                                    </div>

                                                    <div class="text-end mt-2">
                                                        <a href="{{url('/detail-canceled')}}"
                                                            class="btn btn-sm border border-secondary rounded-pill px-3 text-primary">
                                                            Detail
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product End -->

@endsection
