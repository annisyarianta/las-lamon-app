@extends('layouts.app')

@section('title', 'Detail Product - Las Lamon')

@section('content')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5 mb-5">
        <h1 class="text-center text-white display-6">Detail Product</h1>

        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item text-secondary">
                <a href="#" class="text-secondary">Detail Product</a>
            </li>
            <li class="breadcrumb-item text-secondary">
                <a href="#" class="text-secondary">Pages</a>
            </li>
            <li class="breadcrumb-item active text-white">
                Shop
            </li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <div class="container-fluid">
        <div class="container">
            <div class="row gx-5 gy-4 justify-content-center align-items-center">
                <!-- Gambar -->
                <div class="col-lg-3 d-flex justify-content-center px-3 px-md-0 mb-4 mb-lg-0">
                    <div class="border rounded">
                        <a href="#">
                            <img src="{{ asset($data->image_url) }}" class="img-fluid rounded" alt="Image">
                        </a>
                    </div>
                </div>
                <!-- Deskripsi -->
                <div class="col-lg-6 text-center text-lg-start ps-lg-4 px-3 mx-3 px-md-0">

                    <h2 class="fw-bold mb-3">
                        {{ $data->name }}
                    </h2>

                    <p class="mb-4">
                        {{ $data->mini_description }}
                    </p>

                    <!-- FORM -->

                    <form action="{{ route('adopter.cart.store') }}" method="POST">
                        <input type="hidden" name="id_catalogue" value="{{ $data->id }}">
                        <input type="hidden" name="unit_price" id="unit_price">
                        <input type="hidden" name="total_price" id="total_price">
                        @csrf
                        <!-- SELECT TANAMAN -->
                        @if (strtolower($data->name) == 'single package')
                            <div class="mb-4 text-center text-lg-start">

                                <label class="fw-semibold fst-italic d-block mb-2">
                                    Select Variant
                                </label>

                                <select id="productOption" name="id_product" class="form-select w-auto mx-auto mx-lg-0"
                                    style="min-width: 200px;" required>

                                    <option value="">
                                        Choose plant
                                    </option>

                                    @foreach ($data_products as $item)
                                        <option value="{{ $item->id }}" data-harga="{{ $item->price }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        @endif


                        <!-- QUANTITY -->

                        @if (strtolower($data->name) != 'special package')
                            <div class="d-flex justify-content-center justify-content-lg-start mb-4">
                                <div class="input-group quantity" style="width: 120px;">

                                    <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>

                                    <input type="text" name="quantity" id="quantity"
                                        class="form-control form-control-sm text-center border-0" value="1">

                                    <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- HARGA -->
                            <h5 class="fw-bold mb-3">
                                Rp
                                <span id="priceDisplay">0</span>
                            </h5>
                        @endif

                        <!-- BUTTON -->
                        @if (strtolower($data->name) == 'special package')
                            @php
                                $message = 'Hello, I would like to order ' . $data->name;

                            @endphp

                            <div class="text-center text-lg-start mb-5">

                                <a href="https://wa.me/6281234567890?text={{ urlencode($message) }}" target="_blank"
                                    class="btn border border-secondary rounded-pill px-4 py-2 text-primary">

                                    <i class="fa fa-whatsapp me-2"></i>
                                    Order via WhatsApp

                                </a>

                            </div>
                        @else
                            <div class="text-center text-lg-start mb-5">

                                <button type="submit"
                                    class="btn border border-secondary rounded-pill px-4 py-2 text-primary">

                                    <i class="fa fa-shopping-bag me-2"></i>
                                    Add to cart

                                </button>

                            </div>
                        @endif

                    </form>


                    <!-- TAB -->
                    <div class="col-lg-8 px-3 px-md-0 mb-lg-0">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <div class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-about">
                                    Description
                                </div>
                            </div>
                        </nav>

                        <div class="tab-content mb-5 text-start px-3 px-md-0">

                            <div class="tab-pane active" id="nav-about">
                                <p>
                                    {{ $data->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script>
        $(document).ready(function() {

            let hargaSatuan = 0;
            let namaKatalog = "{{ strtolower($data->name) }}";

            // jika bukan Single Package → ambil dari harga katalog
            if (namaKatalog == 'mini forest package' || namaKatalog == 'special package') {
                hargaSatuan = {{ $data->price }};
                updateHarga();
                $('#unit_price').val(hargaSatuan);
            }

            // select2 hanya jika ada select
            if ($('#productOption').length) {
                $('#productOption').select2({
                    placeholder: "Select a plant",
                    width: 'resolve'
                });
            }

            // pilih tanaman (Single Package)
            $('#productOption').change(function() {
                hargaSatuan = $(this).find(':selected').data('harga') || 0;
                updateHarga();
                $('#unit_price').val(hargaSatuan);
            });

            // tombol +
            $('.btn-plus').click(function() {
                let quantity = parseInt($('#quantity').val()) || 1;
                $('#quantity').val(quantity + 1);
                updateHarga();
            });

            // tombol -
            $('.btn-minus').click(function() {
                let quantity = parseInt($('#quantity').val()) || 1;
                if (quantity > 1) $('#quantity').val(quantity - 1);
                updateHarga();
            });

            function updateHarga() {
                let quantity = parseInt($('#quantity').val()) || 1;
                let total = hargaSatuan * quantity;

                $('#priceDisplay').text(
                    new Intl.NumberFormat('id-ID').format(total)
                );

                $('#total_price').val(total);
            }

        });
    </script>
@endsection
