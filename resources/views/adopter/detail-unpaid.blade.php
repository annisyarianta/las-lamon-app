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

    <!-- Detail Page Start -->
    <div class="container-fluid">
        <div class="container py-3 col-xl-6 mx-auto">
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <div class="mb-4 pb-3 border-bottom border-secondary">
                        <div class="d-flex flex-column flex-sm-row justify-content-start mb-1">
                            <h6 class="mb-0">Order Date :</h6>
                            <p class="mb-0 ms-2 ms-sm-2">
                                {{ \Carbon\Carbon::parse($data_order->order_date)->translatedFormat('d F Y \a\t H:i') }}
                            </p>

                        </div>
                        <div class="d-flex flex-column flex-sm-row justify-content-start mb-1">
                            <h6 class="mb-0">Order Code :</h6>
                            <p class="mb-0 ms-2 ms-sm-2">{{ $data_order->code }}</p>
                        </div>
                        <div class="d-flex flex-column flex-sm-row justify-content-start mb-1">
                            <h6 class="mb-0">Status :</h6>
                            <p class="mb-0 ms-2 ms-sm-2"><span class="badge bg-dark">{{ $data_order->status_order }}</span>
                            </p>
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
                                <p class="m-0">x {{ $each_data->quantity }}</p>
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
                        @if ($data_order->status_order == 'unpaid')
                            <div class="d-flex justify-content-between mb-1">
                                <h6 class="mb-0">Expired At</h6>
                                <p class="mb-0 ms-2 text-danger" id="countdown">Loading...</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0">Payment Due Date</h6>
                                <p class="mb-0 ms-2">
                                    {{ \Carbon\Carbon::parse($data_order->expired_at)->translatedFormat('d F Y \a\t H:i') }}
                                </p>
                            </div>
                        @endif
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
                <div
                    class="d-flex flex-column flex-sm-row justify-content-center align-items-center mt-4 gap-3 action-bar-content">

                    <form id="uploadForm"
                        action="{{ route('adopter.order.update', ['id' => Crypt::encrypt($data_order->id)]) }}"
                        method="POST" enctype="multipart/form-data" class="w-100 w-sm-auto m-0">

                        @csrf

                        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept=".jpg,.jpeg,.png,.pdf"
                            style="display: none;" required>

                        <a href="javascript:void(0)" onclick="document.getElementById('bukti_pembayaran').click()"
                            class="btn btn-md border border-secondary rounded-pill px-4 text-primary w-100 text-center">

                            <i class="fas fa-upload me-2"></i>
                            Upload Payment Proof
                        </a>

                    </form>

                    <a href="https://wa.me/6281216163395?text=Hello,%20I%20would%20like%20to%20send%20payment%20proof."
                        class="btn btn-md border border-secondary rounded-pill px-4 text-primary w-100 text-center">

                        <i class="fab fa-whatsapp me-2"></i>
                        Confirm via WhatsApp
                    </a>

                </div>
            </div>

            <script id="u2l8tb">
                document.getElementById('bukti_pembayaran').addEventListener('change', function() {
                    if (this.files.length > 0) {
                        document.getElementById('uploadForm').submit();
                    }
                });
            </script>
        </div>
    </div>
    <!-- Detail Page End -->
@endsection


<script>
    let expiredAt = new Date("{{ $data_order->expired_at }}").getTime();

    let timer = setInterval(function() {
        let now = new Date().getTime();
        let distance = expiredAt - now;

        if (distance < 0) {
            clearInterval(timer);
            document.getElementById("countdown").innerHTML = "Expired";
            return;
        }

        let hours = Math.floor(distance / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML =
            hours + " hours " + minutes + " minutes " + seconds + " seconds";
    }, 1000);

    setTimeout(function() {
        window.location.href = "{{ route('adopter.order.show', ['id' => Crypt::encrypt($data_order->id)]) }}}";
    }, 300000);
</script>
