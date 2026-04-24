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
        }

        /* Warna default sesuai fungsi */
        .action-buttons .detail {
            background-color: #0dcaf0;
            /* info */
        }

        .action-buttons .approve {
            background-color: #198754;
            /* success */
        }

        .action-buttons .decline {
            background-color: #dc3545;
            /* danger */
        }

        /* Hover jadi abu */
        .action-buttons .btn-action:hover {
            background-color: #6c757d !important;
            /* abu-abu */
            color: #fff;
            transform: scale(1.1);
        }

        /* Klik effect */
        .action-buttons .btn-action:active {
            transform: scale(0.95);
        }

        .action-buttons .btn-action:hover {
            background-color: #6c757d !important;
            transform: translateY(-2px);
        }
    </style>

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Dashboard</h1>
    </div>
    <!-- Single Page Header End -->

    @if (session('error'))
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

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex p-4 rounded bg-light h-100 shadow-sm border-0">
                        <i class="fas fa-tree fa-2x text-primary me-4"></i>
                        <div>
                            <h5>Number of Trees</h5>
                            <p class="mb-0">1260</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex p-4 rounded bg-light h-100">
                        <i class="fas fa-vector-square fa-2x text-primary me-4"></i>
                        <div>
                            <h5>Total Area</h5>
                            <p class="mb-0">50 Ha</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex p-4 rounded bg-light h-100">
                        <i class="fas fa-shopping-cart fa-2x text-primary me-4"></i>
                        <div>
                            <h5>Total Order</h5>
                            <p class="mb-0">125</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="d-flex p-4 rounded bg-light h-100">
                        <i class="fas fa-box-open fa-2x text-primary me-4"></i>
                        <div>
                            <h5>New Order</h5>
                            <p class="mb-0">2</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="mb-4">Order List</h4>

                        <div class="table-responsive">
                            <table id="orderTable"
                                class="table table-bordered table-hover align-middle text-nowrap text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th style="min-width: 120px;">Order Date</th>
                                        <th style="min-width: 120px;">Order Code</th>
                                        <th style="min-width: 150px;">Product Name</th>
                                        <th style="min-width: 140px;">Total Payment</th>
                                        <th style="min-width: 180px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2026-04-24</td>
                                        <td>ORD001</td>
                                        <td>Wood Chair</td>
                                        <td>Rp 500.000</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center action-buttons">
                                                <a href="#" class="btn-action detail" title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="#" class="btn-action approve" title="Approve">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="#" class="btn-action decline" title="Decline">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
