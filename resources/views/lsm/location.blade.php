@extends('layouts.app')

@section('title', 'Location - Las Lamon')

@section('content')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Location</h1>
    </div>
    <!-- Single Page Header End -->

    <div class="container content-wrapper">
        <div class="container py-2">
            <div class="d-flex justify-content-between align-items-center mt-3 mb-3 flex-wrap gap-2">
                <h5 class="mb-0 fw-semibold">Location Lists</h5>
                <a href="{{ route('location.create') }}" class="btn btn-dark d-flex align-items-center gap-1">
                    <i class="fas fa-plus"></i> Add Location
                </a>
            </div>
            <div class="table-responsive">
                <table class="table align-middle text-dark">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Location Name</th>
                            <th>Address</th>
                            <th class="text-center ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lokasi as $loc)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $loc->nama_lokasi }} 
                                </td>
                                <td>
                                    {{ $loc->url_lokasi }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex flex-column flex-md-row justify-content-center gap-1">
                                        <a href=" {{ route('location.edit', $loc->id) }} " class="btn btn-primary p-1 px-md-3 py-md-2 small">
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

    </div>



@endsection
