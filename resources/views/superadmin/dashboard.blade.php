@extends('layouts.dashboard')

@section('title', 'Dashboard Superadmin - Las Lamon')

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Dashboard</h1>
</div>
<!-- Single Page Header End -->

    <div class="container content-wrapper">
        <div class="container py-5">
            <!-- CARDS -->
            <div class="row g-4 mb-4">

                <!-- CARD 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-1 shadow-sm h-100">
                        <div class="card-body">
                            <p class="text-muted mb-1">Total Users</p>
                            <h3 class="fw-bold">{{ $totalUser }}</h3>
                            <small class="text-success fw-bold">Active users</small>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-1 shadow-sm h-100">
                        <div class="card-body">
                            <p class="text-muted mb-1">Adopter</p>
                            <h3 class="fw-bold"> {{ $totalAdopter }} </h3>
                            <small class="text-primary fw-bold">Adopter Plant</small>
                        </div>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-1 shadow-sm h-100">
                        <div class="card-body">
                            <p class="text-muted mb-1">LSM</p>
                            <h3 class="fw-bold"> {{ $totalLsm }} </h3>
                            <small class="text-warning fw-bold">LSM Users</small>
                        </div>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card border-1 shadow-sm h-100">
                        <div class="card-body">
                            <p class="text-muted mb-1">Super Admin</p>
                            <h3 class="fw-bold"> {{ $totalSuperadmin }} </h3>
                            <small class="text-danger fw-bold">Full access</small>
                        </div>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-between align-items-center mt-5 mb-3 flex-wrap gap-2">
                <h5 class="mb-0 fw-semibold">User Lists</h5>
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
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $user->name }} </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <span class="badge {{ $user->role_badge }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex flex-column flex-md-row justify-content-center gap-1">
                                        <a href=" {{ route('users.edit', $user->id) }} "
                                            class="btn btn-primary p-1 px-md-3 py-md-2 small">
                                            <i class="fa fa-pen me-1"></i>
                                            <span class="d-none d-md-inline">Edit</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
