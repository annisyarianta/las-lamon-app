@extends('layouts.dashboard')

@section('title', 'Edit User - Las Lamon')
<div class="container content-wrapper">

    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <a href="{{ route('superadmin_user') }}" class="btn btn-light d-inline-flex align-items-center">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
            <div class="card shadow-sm mt-4">
                <div class="card-body p-4 p-md-5">
                    <h5 class="fw-semibold mb-3">Edit User</h5>

                    <form action="#" method="POST">
                        @method('PUT')

                        <div class="row">

                            <!-- NAME -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="#"
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
                                Update
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@section('content')
