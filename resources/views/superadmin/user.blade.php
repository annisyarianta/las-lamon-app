@extends('layouts.dashboard')

@section('title', 'User Lists - Las Lamon')

@section('content')

    <div class="container content-wrapper">
        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-center mt-5 mb-3 flex-wrap gap-2">
                <h5 class="mb-0 fw-semibold">User Lists</h5>
                <a href="#" class="btn btn-dark d-flex align-items-center gap-1">
                    <i class="fas fa-plus"></i> Create User
                </a>
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

                                    <a href="{{ route('edit_user') }}"
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
