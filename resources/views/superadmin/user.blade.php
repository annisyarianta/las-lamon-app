@extends('layouts.dashboard')

@section('title', 'User Lists - Las Lamon')

@section('content')

    <div class="container content-wrapper">
        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-center mt-5 mb-3 flex-wrap gap-2">
                <h5 class="mb-0 fw-semibold">User Lists</h5>
                <a href="{{ route('users.create') }}" class="btn btn-dark d-flex align-items-center gap-1">
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
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $user->name }} </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <span class="badge b{{ $user->role_badge }}">
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

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        confirmButtonColor: '#114D14'
    });
</script>
@endif

@endsection

