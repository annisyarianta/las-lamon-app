@extends('layouts.app')

@section('title', 'Edit Location - Las Lamon')

@section('content')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Edit Location</h1>
    </div>
    <!-- Single Page Header End -->
    <div class="container content-wrapper">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <!-- BACK BUTTON -->
                <a href="{{ route('location.index') }}" class="btn btn-light d-inline-flex align-items-center">
                    <i class="fas fa-arrow-left me-2"></i> Back
                </a>

                <div class="card shadow-sm mt-4">
                    <div class="card-body p-4 p-md-5">
                        <h5 class="fw-semibold mb-3">Edit Location</h5>

                        <!-- FORM UPDATE -->
                        <form action="{{ route('location.update', $lokasi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <!-- NAME -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Location Name</label>
                                    <input type="text" name="nama_lokasi" class="form-control" value="{{ $lokasi->nama_lokasi }}" required>
                                </div>

                                <!-- URL -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Location URL</label>
                                    <input type="text" name="url_lokasi" class="form-control" value="{{ $lokasi->url_lokasi }}" required>
                                </div>

                                <!-- BUTTON -->
                                <div class="d-flex justify-content-end gap-4">

                                    <!-- UPDATE -->
                                    <button type="submit" class="btn btn-primary px-4" confirmUpdate()>
                                        Update
                                    </button>

                        </form>

                        <!-- DELETE (DI LUAR FORM UPDATE!) -->
                        <form id="delete-form-{{ $lokasi->id }}" action="{{ route('location.destroy', $lokasi->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger px-4" onclick="confirmDelete({{ $lokasi->id }})" {{-- onclick="return confirm('Are you sure to delete this user?')" --}}>
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
                text: "This location will be permanently deleted!",
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
