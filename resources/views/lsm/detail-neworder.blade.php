@extends('layouts.app')

@section('title', 'Detail New Order - Las Lamon')

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
            }
        }
    </style>

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Detail New Order</h1>
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
                                24 Januari 2026 </p>
                        </div>
                        <div class="d-flex justify-content-start mb-1">
                            <h6 class="mb-0">Order Code :</h6>
                            <p class="mb-0 ms-2">ORD001</p>
                        </div>
                        <div class="d-flex justify-content-start mb-1">
                            <h6 class="mb-0">Customer Name :</h6>
                            <p class="mb-0 ms-2">Pandu Winata</p>
                        </div>
                    </div>
                        <div class="d-flex align-items-center flex-nowrap gap-3 ">
                            <div class="bg-light rounded">
                                <img src="{{ asset('assets/img/mini-forest.png') }}" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 w-100 d-flex flex-column">
                                <h4 class="mb-1">Mini Forest Package</h4>
                                <p class="m-0">Pohon Jati</p>
                                <p class="m-0">x 1</p>
                                <p class="mb-0 text-end mt-auto">
                                    Rp500.000</p>
                            </div>
                        </div>
                </div>
            </div>

            <div class="testimonial-item img-border-radius bg-light rounded p-4 mt-3">
                <div class="position-relative">
                    <div class="mb-0 pb-0">
                        <div class="d-flex justify-content-between mb-0">
                            <h6 class="mb-0">Total Payment</h6>
                            <p class="mb-0 ms-2 fw-bold">Rp500.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="action-bar">
                <div class="d-flex justify-content-center mt-4 action-bar-content">
                    <a href="#"
                        class="btn btn-md border border-secondary rounded-pill px-3 text-primary me-3">
                        <i class="fas fa-print me-3"></i>See Receipt
                    </a>
                    <a href="#"
                        class="btn btn-md btn-success btn-approve rounded-pill px-3 me-3" data-id="1">
                        <i class="fas fa-check me-3"></i>Approve
                    </a>
                    <a href="#"
                        class="btn btn-md btn-danger btn-decline rounded-pill px-3 me-3" data-id="1">
                        <i class="fas fa-times me-3"></i>Decline
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail Page End -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // APPROVE
            document.querySelectorAll(".btn-approve").forEach(button => {
                button.addEventListener("click", function(e) {
                    e.preventDefault();

                    let orderId = this.getAttribute("data-id");

                    Swal.fire({
                        title: 'Approve Order?',
                        text: "Data that has been approved cannot be canceled!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#198754',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, Approve!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Approved!',
                                text: 'Order successfully approved',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    });
                });
            });

            // DECLINE
            document.querySelectorAll(".btn-decline").forEach(button => {
                button.addEventListener("click", function(e) {
                    e.preventDefault();

                    let orderId = this.getAttribute("data-id");

                    Swal.fire({
                        title: 'Decline Order?',
                        text: "This action will reject the order!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, Decline!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Declined!',
                                text: 'Order has been declined',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    });
                });
            });

        });
    </script>
@endsection
