@extends('layouts.app')

@section('title', 'Add Location - Las Lamon')

@section('content')
    
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Add Location</h1>
</div>
<!-- Single Page Header End -->

<div class="container content-wrapper">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <a href="{{ route('location.index') }}" class="btn btn-light d-inline-flex align-items-center">
                <i class="fas fa-arrow-left me-2"></i> Back
            </a>
            <div class="card shadow-sm mt-4">
                <div class="card-body p-4 p-md-5">
                    <h5 class="fw-semibold mb-3">Add Location</h5>

                    <form action="{{ route('location.store') }}" method="POST">
                        @csrf

                        <div class="row">

                            <!-- NAME -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Location Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Location Name"
                                    required>
                            </div>

                            <!-- EMAIL -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Location URL</label>
                                <input type="text" name="location_url" class="form-control" placeholder="Enter Location URL"
                                    required>
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
