@extends('layouts.app')

@section('title', 'Detail Product - Las Lamon')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5 mb-5">
        <h1 class="text-center text-white display-6">Detail Product</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item text-secondary"><a href="#">Detail Product</a></li>
            <li class="breadcrumb-item text-secondary"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->
    <div class="row gx-5 gy-4 justify-content-center align-items-center">
        <!-- Gambar -->
        <div class="col-lg-3 d-flex justify-content-center px-3 px-md-0 mb-4 mb-lg-0">
            <div class="border rounded">
                <a href="#">
                    <img src="{{ asset('assets/img/single-item.jpg') }}" class="img-fluid rounded" alt="Image">
                </a>
            </div>
        </div>
        <!-- Deskripsi -->
        <div class="col-lg-6 text-center text-lg-start col-lg-6 ps-lg-4 px-3 px-md-0">
            <h4 class="fw-bold mb-3">Paket Satuan</h4>

            <p class="mb-4">
                Donasi 1, 3, atau 8 bibit pohon.
            </p>

            <div class="mb-4 text-center text-lg-start">
                <label class="fw-semibold d-block mb-2">Select Variant</label>

                <select id="productOption" class="form-select w-auto mx-auto mx-lg-0" style="min-width: 200px;">
                    <option></option>
                    <option value="1">250 gram</option>
                    <option value="2">500 gram</option>
                    <option value="3">1 kg</option>
                </select>
            </div>

            <div class="d-flex justify-content-center justify-content-lg-start mb-4">
                <div class="input-group quantity" style="width: 120px;">
                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                        <i class="fa fa-minus"></i>
                    </button>
                    <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            
            <h5 class="fw-bold mb-3">3,35 $</h5>

            <div class="text-center text-lg-start mb-5">
                <a href="{{ route('cart') }}" class="btn border border-secondary rounded-pill px-4 py-2 text-primary">
                    <i class="fa fa-shopping-bag me-2"></i> Add to cart
                </a>
            </div>
        </div>

        <!-- Tab bawah -->
        <div class="col-lg-8 mx-auto px-3 px-md-0 mx-4 mb-lg-0">
            <nav>
                <div class="nav nav-tabs mb-3 ">
                    <div class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-about">
                        Description
                    </div>
                </div>
            </nav>

            <div class="tab-content mb-5 text-start px-3 px-md-0 mb-4 mb-lg-0">
                <div class="tab-pane active" id="nav-about">
                    <p>Lorem Ipsum description...</p>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    $(document).ready(function() {
        $('#productOption').select2({
            placeholder: "Select Variant",
            width: 'resolve'
        });
    });
</script>
