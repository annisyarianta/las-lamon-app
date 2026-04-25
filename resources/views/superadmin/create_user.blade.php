@extends('layouts.dashboard')

@section('title', 'Create User - Las Lamon')

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Create User</h1>
</div>
<!-- Single Page Header End -->

<div class="container content-wrapper">

    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <a href="{{ route('users.index') }}" class="btn btn-light d-inline-flex align-items-center">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
            <div class="card shadow-sm mt-4">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="row">

                            <!-- NAME -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name"
                                    required>
                            </div>

                            <!-- EMAIL -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email"
                                    required>
                            </div>

                            <!-- PHONE -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control"
                                    placeholder="Enter phone number">
                            </div>

                            <!-- ROLE -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Role</label>
                                <select name="role" class="form-select" required>
                                    <option value="">-- Select Role --</option>
                                    <option value="adopter">Adopter</option>
                                    <option value="super admin">Super Admin</option>
                                    <option value="lsm">LSM</option>
                                </select>
                            </div>

                            <!-- PASSWORD -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password"
                                    required>
                            </div>

                            <!-- CONFIRM PASSWORD -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm password" required>
                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">
                                Submit
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@section('content')
