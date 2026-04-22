@extends('layouts.dashboard')

@section('title', 'Dashboard Superadmin - Las Lamon')

@section('content')

    <div class="container content-wrapper">
        <div class="container py-5">
            <!-- CARDS -->
            <div class="row g-4 mb-4">

                <!-- CARD 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-1 shadow-sm h-100">
                        <div class="card-body">
                            <p class="text-muted mb-1">Total Users</p>
                            <h3 class="fw-bold">120</h3>
                            <small class="text-success fw-bold">Active users</small>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-1 shadow-sm h-100">
                        <div class="card-body">
                            <p class="text-muted mb-1">Admins</p>
                            <h3 class="fw-bold">10</h3>
                            <small class="text-primary fw-bold">System admins</small>
                        </div>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-1 shadow-sm h-100">
                        <div class="card-body">
                            <p class="text-muted mb-1">Users</p>
                            <h3 class="fw-bold">90</h3>
                            <small class="text-warning fw-bold">Regular users</small>
                        </div>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-1 shadow-sm h-100">
                        <div class="card-body">
                            <p class="text-muted mb-1">Super Admin</p>
                            <h3 class="fw-bold">2</h3>
                            <small class="text-danger fw-bold">Full access</small>
                        </div>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-between align-items-center mt-5 mb-3 flex-wrap gap-2">
                <h5 class="mb-0 fw-semibold">User Lists</h5>

                <!-- SEARCH -->
                <input type="text" class="form-control w-auto" placeholder="Search...">
            </div>
            <div class="table-responsive">
                <table class="table align-middle text-dark">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Role</th>
                            <th class="text-center ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1. </td>
                            <td>Ni Putu Tiara</td>
                            <td>tiara@mail.com</td>
                            <td>08xxxxxxxxxx</td>
                            <td>
                                <span class="badge bg-light text-primary border border-primary">
                                    Adopter
                                </span>
                            </td>

                            <!-- Action -->
                            <td class="text-center">
                                <div class="d-flex flex-column flex-md-row justify-content-center gap-1">

                                    <!-- e-Certificate -->
                                    <a href="#"
                                        class="btn btn-primary 
                                          px-2 py-1 px-md-3 py-md-2 small">
                                        <i class="fa fa-pen me-1"></i>
                                        <span class="d-none d-md-inline">Edit</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
