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
                            <table id="orderTable" class="table table-bordered table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Order Code</th>
                                        <th>Product Name</th>
                                        <th>Total Payment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2026-04-24</td>
                                        <td>ORD001</td>
                                        <td>Wood Chair</td>
                                        <td>Rp 500.000</td>
                                        <td>
                                            <button class="btn btn-sm btn-info">Detail</button>
                                            <button class="btn btn-sm btn-success">Approve</button>
                                            <button class="btn btn-sm btn-danger">Decline</button>
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
