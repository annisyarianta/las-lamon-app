@extends('layouts.app')

@section('title', 'Dashboard LSM - Las Lamon')

@section('content')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#orderTable').DataTable({
                responsive: true
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .action-buttons .btn-action {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #fff;
            font-size: 14px;
            transition: all 0.3s ease;
            border: none;
            outline: none;
            box-shadow: none;
        }

        .action-buttons .btn-action:focus {
            outline: none;
            box-shadow: none;
        }

        .action-buttons button.btn-action {
            border: none;
        }

        .action-buttons .detail {
            background-color: #0dcaf0;
        }

        .action-buttons .approve {
            background-color: #198754;
        }

        .action-buttons .decline {
            background-color: #dc3545;
        }

        .action-buttons .btn-action:hover {
            background-color: #6c757d !important;
            color: #fff;
            transform: scale(1.1);
        }

        .action-buttons .btn-action:active {
            transform: scale(0.95);
        }

        .custom-card>div {
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .custom-card>div:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .custom-card>div i {
            transition: all 0.3s ease;
        }

        .custom-card>div:hover i {
            transform: scale(1.2) rotate(5deg);
            color: #198754;
        }

        .custom-card>div:hover h5 {
            color: #198754;
        }

        .custom-card>div::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: transparent;
            transition: all 0.3s ease;
        }

        .custom-card>div:hover::before {
            background: linear-gradient(90deg, #198754, #0dcaf0);
        }
    </style>

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Dashboard</h1>
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
    @endif
    <!-- Single Page Header End -->

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-12 col-md-6 col-lg-3 custom-card">
                    <div class="d-flex p-4 rounded bg-light h-100 shadow-sm border-0">
                        <i class="fas fa-tree fa-2x text-primary me-4"></i>
                        <div>
                            <h5>Number of Trees</h5>
                            <p class="mb-0 fw-bold fs-5">1260</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-12 col-md-6 col-lg-3 custom-card">
                    <div class="d-flex p-4 rounded bg-light h-100">
                        <i class="fas fa-vector-square fa-2x text-primary me-4"></i>
                        <div>
                            <h5>Total Area</h5>
                            <p class="mb-0 fw-bold fs-5">50 Ha</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-12 col-md-6 col-lg-3 custom-card">
                    <div class="d-flex p-4 rounded bg-light h-100">
                        <i class="fas fa-shopping-cart fa-2x text-primary me-4"></i>
                        <div>
                            <h5>Total Order</h5>
                            <p class="mb-0 fw-bold fs-5">{{ $total_orders }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-12 col-md-6 col-lg-3 custom-card">
                    <div class="d-flex p-4 rounded bg-light h-100">
                        <i class="fas fa-box-open fa-2x text-primary me-4"></i>
                        <div>
                            <h5>New Order</h5>
                            <p class="mb-0 fw-bold fs-5">{{ $total_revenue }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="mb-4">New Incoming Order</h3>
                        <div class="table-responsive">
                            <table id="orderTable"
                                class="table table-bordered table-hover align-middle text-nowrap text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th style="min-width: 120px;">Order Date</th>
                                        <th style="min-width: 120px;">Order Code</th>
                                        <th style="min-width: 150px;">Customer Name</th>
                                        <th style="min-width: 140px;">Total Payment</th>
                                        <th style="min-width: 180px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (empty($data_orders) || count($data_orders) == 0)
                                        <td colspan="5" class="text-center py-5">
                                            <h6 class="text-secondary">No Records Found</h6>
                                        </td>
                                    @else
                                        <tr>

                                            @foreach ($data_orders as $each_data)
                                                <td>
                                                    {{ \Carbon\Carbon::parse($each_data->order_date)->translatedFormat('d F Y H:i') }}
                                                </td>
                                                <td>{{ $each_data->code }}</td>
                                                <td>{{ $each_data->user->name ?? 'N/A' }}</td>
                                                <td>
                                                    Rp{{ number_format($each_data->total_price, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2 justify-content-center action-buttons">
                                                        <a href={{ route('lsm.order.show', ['id' => Crypt::encrypt($each_data->id)]) }}
                                                            class="btn-action detail" title="Detail">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        <form
                                                            action="{{ route('lsm.order.confirm-order', ['id' => Crypt::encrypt($each_data->id)]) }}"
                                                            method="POST">

                                                            @csrf
                                                            <input type="hidden" name="action" value="approve">

                                                            <button type="submit" class="btn-action approve btn-approve"
                                                                data-id="1" title="Approve">

                                                                <i class="fas fa-check"></i>
                                                            </button>

                                                        </form>

                                                        <form
                                                            action="{{ route('lsm.order.confirm-order', ['id' => Crypt::encrypt($each_data->id)]) }}"
                                                            method="POST">

                                                            @csrf
                                                            <input type="hidden" name="action" value="decline">

                                                            <button type="submit" class="btn-action decline btn-decline"
                                                                data-id="1" title="Decline">

                                                                <i class="fas fa-times"></i>
                                                            </button>

                                                        </form>
                                                    </div>
                                                </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
