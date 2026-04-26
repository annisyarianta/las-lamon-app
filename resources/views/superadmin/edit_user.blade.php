@extends('layouts.dashboard')

@section('title', 'Edit User - Las Lamon')

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Edit User</h1>
</div>
<!-- Single Page Header End -->

    <div class="container content-wrapper">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <!-- BACK BUTTON -->
                <a href="{{ route('users.index') }}" class="btn btn-light d-inline-flex align-items-center">
                    <i class="fas fa-arrow-left me-2"></i> Back
                </a>
                <div class="card shadow-sm mt-4">
                    <div class="card-body p-4 p-md-5">
                        <!-- FORM UPDATE -->
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <!-- NAME -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                        required>
                                </div>

                                <!-- EMAIL -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                        required>
                                </div>

                                <!-- PHONE -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                </div>

                                <!-- ROLE -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Role</label>
                                    <select name="role" class="form-select" required>
                                        <option value="">-- Select Role --</option>
                                        <option value="adopter" {{ $user->role == 'adopter' ? 'selected' : '' }}>
                                            Adopter
                                        </option>
                                        <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>
                                            Super Admin
                                        </option>
                                        <option value="lsm" {{ $user->role == 'lsm' ? 'selected' : '' }}>
                                            LSM
                                        </option>
                                    </select>
                                </div>

                                <!-- PASSWORD -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Kosongkan jika tidak diubah">
                                </div>

                                <!-- CONFIRM PASSWORD -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm password">
                                </div>

                            </div>

                            <!-- BUTTON -->
                            <div class="d-flex justify-content-end gap-4">

                                <!-- UPDATE -->
                                <button type="submit" class="btn btn-primary px-4" confirmUpdate()>
                                    Update
                                </button>

                        </form>

                        <!-- DELETE (DI LUAR FORM UPDATE!) -->
                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger px-4" onclick="confirmDelete({{ $user->id }})"
                                {{-- onclick="return confirm('Are you sure to delete this user?')" --}}>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This user will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        function confirmUpdate() {
            Swal.fire({
                title: 'Confirm Update',
                text: "Do you want to save these changes?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update-form').submit();
                }
            });
        }
    </script>
@endsection
