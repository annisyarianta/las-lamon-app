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

    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                confirmButtonText: 'OK'
            });
        </script>
    @elseif (session('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                confirmButtonText: 'OK'
            });
        </script>
    @endif
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
                                                        <p class="mb-0">Action</p>
                                                    </div>
                                                </div>

                                                @if (empty($data_unpaid) || count($data_unpaid) == 0)
                                                    <div class="col-9 text-center py-5 ">
                                                        <h6 class="text-secondary">No Records Found</h6>
                                                    </div>
                                                @else
                                                    @foreach ($data_unpaid as $each_data)
                                                        <div
                                                            class="row order-row bg-light align-items-center text-center justify-content-center py-2">
                                                            <div class="col-3">
                                                                <p class="mb-0">
                                                                    {{ \Carbon\Carbon::parse($each_data->order_date)->translatedFormat('d F Y H:i') }}
                                                                </p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="mb-0">{{ $each_data->code }}</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="mb-0">
                                                                    Rp{{ number_format($each_data->total_price, 0, ',', '.') }}
                                                                </p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="mb-0"><a
                                                                        href={{ route('adopter.order.show', ['id' => Crypt::encrypt($each_data->id)]) }}
                                                                        class="btn btn-sm border border-secondary rounded-pill px-3 text-primary mt-auto">
                                                                        Detail
                                                                    </a></p>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                @endif
                                            </div>
                                        </div>

                                        {{-- MOBILE --}}
                                        <div class="d-block d-md-none">
                                            <div class="card mb-3 border-0">
                                                @if (empty($data_unpaid) || count($data_unpaid) == 0)
                                                    <div class="col-9 text-center py-5 ">
                                                        <h6 class="text-secondary">No Records Found</h6>
                                                    </div>
                                                @else
                                                    @foreach ($data_unpaid as $each_data)
                                                        <div class="card-body p-3 mb-2 bg-light rounded">
                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Order Date</span>
                                                                <span>
                                                                    {{ \Carbon\Carbon::parse($each_data->order_date)->translatedFormat('d F Y H:i') }}
                                                                </span>
                                                            </div>

                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Order Code</span>
                                                                <span>{{ $each_data->code }}</span>
                                                            </div>

                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Total Payment</span>
                                                                <span>Rp{{ number_format($each_data->total_price, 0, ',', '.') }}</span>
                                                            </div>

                                                            <div class="text-end mt-2">
                                                                <a href={{ route('adopter.order.show', ['id' => Crypt::encrypt($each_data->id)]) }}
                                                                    class="btn btn-sm border border-secondary rounded-pill px-3 text-primary">
                                                                    Detail
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-process" role="tabpanel"
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
                                                        <p class="mb-0">Action</p>
                                                    </div>
                                                </div>
                                                @if (empty($data_in_process) || count($data_in_process) == 0)
                                                    <div class="col-9 text-center py-5 ">
                                                        <h6 class="text-secondary">No Records Found</h6>
                                                    </div>
                                                @else
                                                    @foreach ($data_in_process as $each_data)
                                                        <div
                                                            class="row order-row bg-light align-items-center text-center justify-content-center py-2">
                                                            <div class="col-3">
                                                                {{ \Carbon\Carbon::parse($each_data->order_date)->translatedFormat('d F Y H:i') }}
                                                                <p class="mb-0"></p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="mb-0">{{ $each_data->code }}</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="mb-0">
                                                                    Rp{{ number_format($each_data->total_price, 0, ',', '.') }}
                                                                </p>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="d-flex justify-content-center gap-3">
                                                                    <a href="{{ url($each_data->proof_payment_url) }}"
                                                                        target="_blank"
                                                                        class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                        title="Lihat Bukti Pembayaran">
                                                                        <i class="fas fa-eye text-primary"></i>
                                                                    </a>
                                                                    <a href={{ route('adopter.order.show', ['id' => Crypt::encrypt($each_data->id)]) }}
                                                                        class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                        title="Edit Bukti Pembayaran">
                                                                        <i class="fas fa-pen text-primary"></i>
                                                                    </a>
                                                                    <a href="https://wa.me/6281216163395%20like%20to%20send%20payment%20proof."
                                                                        class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                        title="Konfirmasi WhatsApp">
                                                                        <i class="fab fa-whatsapp text-primary"></i>
                                                                    </a>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        {{-- MOBILE --}}
                                        <div class="d-block d-md-none">
                                            <div class="card mb-3 border-0">

                                                @if (empty($data_in_process) || count($data_in_process) == 0)
                                                    <div class="col-9 text-center py-5 ">
                                                        <h6 class="text-secondary">No Records Found</h6>
                                                    </div>
                                                @else
                                                    @foreach ($data_in_process as $each_data)
                                                        <div class="card-body p-3 mb-2 bg-light rounded">
                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Order Date</span>
                                                                <span>{{ \Carbon\Carbon::parse($each_data->order_date)->translatedFormat('d F Y H:i') }}</span>
                                                            </div>

                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Order Code</span>
                                                                <span>{{ $each_data->code }}</span>
                                                            </div>

                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Total Payment</span>
                                                                <span>Rp{{ number_format($each_data->total_price, 0, ',', '.') }}</span>
                                                            </div>

                                                            <div class="d-flex justify-content-end gap-3 mt-3">
                                                                <a href="{{ url($each_data->proof_payment_url) }}"
                                                                    target="_blank"
                                                                    class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                    title="Lihat Bukti Pembayaran">
                                                                    <i class="fas fa-eye text-primary"></i>
                                                                </a>
                                                                <a href={{ route('adopter.order.show', ['id' => Crypt::encrypt($each_data->id)]) }}
                                                                    class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                    title="Edit Bukti Pembayaran">
                                                                    <i class="fas fa-pen text-primary"></i>
                                                                </a>
                                                                <a href="https://wa.me/6281216163395%20like%20to%20send%20payment%20proof."
                                                                    class="btn border border-secondary btn-sm-square rounded-circle bg-white"
                                                                    title="Konfirmasi WhatsApp">
                                                                    <i class="fab fa-whatsapp text-primary"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-finished" role="tabpanel"
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
                                                        <p class="mb-0">Action</p>
                                                    </div>
                                                </div>

                                                @if (empty($data_paid) || count($data_paid) == 0)
                                                    <div class="col-9 text-center py-5 ">
                                                        <h6 class="text-secondary">No Records Found</h6>
                                                    </div>
                                                @else
                                                    @foreach ($data_paid as $each_data)
                                                        <div
                                                            class="row order-row bg-light align-items-center text-center justify-content-center py-2">
                                                            <div class="col-3">
                                                                <p class="mb-0">
                                                                    {{ \Carbon\Carbon::parse($each_data->order_date)->translatedFormat('d F Y H:i') }}
                                                                </p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="mb-0">{{ $each_data->code }}</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="mb-0">
                                                                    Rp{{ number_format($each_data->total_price, 0, ',', '.') }}
                                                                </p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="mb-0"><a
                                                                        href={{ route('adopter.order.show', ['id' => Crypt::encrypt($each_data->id)]) }}
                                                                        class="btn btn-sm border border-secondary rounded-pill px-3 text-primary mt-auto">
                                                                        Detail
                                                                    </a></p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>

                                        {{-- MOBILE --}}
                                        <div class="d-block d-md-none">
                                            <div class="card mb-3 border-0">
                                                @if (empty($data_paid) || count($data_paid) == 0)
                                                    <div class="col-9 text-center py-5 ">
                                                        <h6 class="text-secondary">No Records Found</h6>
                                                    </div>
                                                @else
                                                    @foreach ($data_paid as $each_data)
                                                        <div class="card-body p-3 mb-2 bg-light rounded">
                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Order Date</span>
                                                                <span>{{ \Carbon\Carbon::parse($each_data->order_date)->translatedFormat('d F Y H:i') }}</span>
                                                            </div>

                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Order Code</span>
                                                                <span>{{ $each_data->code }}</span>
                                                            </div>

                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Total Payment</span>
                                                                <span>Rp{{ number_format($each_data->total_price, 0, ',', '.') }}</span>
                                                            </div>

                                                            <div class="text-end mt-2">
                                                                <a href={{ route('adopter.order.show', ['id' => Crypt::encrypt($each_data->id)]) }}
                                                                    class="btn btn-sm border border-secondary rounded-pill px-3 text-primary">
                                                                    Detail
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-canceled" role="tabpanel"
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
                                                        <p class="mb-0">Action</p>
                                                    </div>
                                                </div>

                                                @if (empty($data_canceled) || count($data_canceled) == 0)
                                                    <div class="col-9 text-center py-5 ">
                                                        <h6 class="text-secondary">No Records Found</h6>
                                                    </div>
                                                @else
                                                    @foreach ($data_canceled as $each_data)
                                                        <div
                                                            class="row order-row bg-light align-items-center text-center justify-content-center py-2">
                                                            <div class="col-3">
                                                                <p class="mb-0">
                                                                    {{ \Carbon\Carbon::parse($each_data->order_date)->translatedFormat('d F Y H:i') }}
                                                                </p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="mb-0">{{ $each_data->code }}</p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="mb-0">
                                                                    Rp{{ number_format($each_data->total_price, 0, ',', '.') }}
                                                                </p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="mb-0"><a
                                                                        href={{ route('adopter.order.show', ['id' => Crypt::encrypt($each_data->id)]) }}
                                                                        class="btn btn-sm border border-secondary rounded-pill px-3 text-primary mt-auto">
                                                                        Detail
                                                                    </a></p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>

                                        {{-- MOBILE --}}
                                        <div class="d-block d-md-none">
                                            <div class="card mb-3 border-0">
                                                @if (empty($data_canceled) || count($data_canceled) == 0)
                                                    <div class="col-9 text-center py-5 ">
                                                        <h6 class="text-secondary">No Records Found</h6>
                                                    </div>
                                                @else
                                                    @foreach ($data_canceled as $each_data)
                                                        <div class="card-body p-3 mb-2 bg-light rounded">
                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Order Date</span>
                                                                <span>
                                                                    {{ \Carbon\Carbon::parse($each_data->order_date)->translatedFormat('d F Y H:i') }}
                                                                </span>
                                                            </div>

                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Order Code</span>
                                                                <span>{{ $each_data->code }}</span>
                                                            </div>

                                                            <div class="d-flex justify-content-between">
                                                                <span class="fw-semibold text-muted">Total Payment</span>
                                                                <span>Rp{{ number_format($each_data->total_price, 0, ',', '.') }}</span>
                                                            </div>

                                                            <div class="text-end mt-2">
                                                                <a href={{ route('adopter.order.show', ['id' => Crypt::encrypt($each_data->id)]) }}
                                                                    class="btn btn-sm border border-secondary rounded-pill px-3 text-primary">
                                                                    Detail
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

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

    <script>
        setInterval(function() {
            location.reload();
        }, 300000);
    </script>
@endsection
