@extends('layouts.app')

@section('title', 'Cart - Las Lamon')

@section('content')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">My Cart</h1>
    </div>
    <!-- Single Page Header End -->
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">

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

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Products</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (empty($data) || count($data) == 0)
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <h4 class="text-secondary">Your cart is empty.</h4>
                                </td>
                            </tr>
                        @else
                            @foreach ($data as $each_data)
                                <tr>

                                    <td>
                                        <p class="mb-0 mt-4">
                                            {{ ucwords(str_replace('_', ' ', $each_data->catalogue->name ?? '-')) }}
                                        </p>
                                    </td>

                                    <td>
                                        <p class="mb-0 mt-4">
                                            {{ $each_data->product->name ?? '-' }}
                                        </p>
                                    </td>

                                    <td>
                                        <p class="mb-0 mt-4">
                                            Rp {{ number_format($each_data->unit_price, 0, ',', '.') }}
                                        </p>
                                    </td>

                                    <td class="produk-data" data-id="{{ $each_data->product->id ?? null }}"
                                        data-id-cart="{{ $each_data->id }}"
                                        data-id-katalog="{{ $each_data->catalogue->id }}"
                                        data-harga="{{ $each_data->unit_price }}"
                                        data-nama-katalog="{{ $each_data->catalogue->name ?? null }}"
                                        data-nama-produk="{{ $each_data->product->name ?? null }}">

                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <button type="button" class="btn btn-sm btn-minus bg-light border">-</button>

                                            <input type="text"
                                                class="form-control form-control-sm text-center border-0 qty-input"
                                                value="{{ $each_data->quantity }}">

                                            <button type="button" class="btn btn-sm btn-plus bg-light border">+</button>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="mb-0 mt-4 total-harga">
                                            Rp
                                            {{ number_format($each_data->unit_price * $each_data->quantity, 0, ',', '.') }}
                                        </p>
                                    </td>

                                    <td>
                                        <form
                                            action="{{ route('adopter.cart.destroy', ['id' => Crypt::encrypt($each_data->id)]) }}"
                                            method="POST" style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-md rounded-circle bg-light border mt-4">
                                                <i class="fa fa-trash text-danger"></i>
                                            </button>

                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <form id="checkoutForm" action="{{ route('adopter.checkout.store') }}" method="POST">
                @csrf
                <input type="hidden" name="data" id="dataInput">

                <div class="mt-5 text-center">
                    <button type="submit" onclick="checkout()"
                        class="btn border-secondary rounded-pill px-4 py-3 text-primary">
                        CHECKOUT
                    </button>
                </div>
            </form>

        </div>
    </div>
    <!-- Cart Page End -->

@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.querySelectorAll("tbody tr").forEach(function(row) {

            let minus = row.querySelector(".btn-minus");
            let plus = row.querySelector(".btn-plus");
            let input = row.querySelector(".qty-input");
            let totalText = row.querySelector(".total-harga");

            let harga = parseInt(row.querySelector(".produk-data").dataset.harga);
            let cartId = row.querySelector(".produk-data").dataset.idCart;

            function updateView() {
                let qty = parseInt(input.value) || 1;
                let total = harga * qty;

                totalText.innerText = 'Rp ' + total.toLocaleString('id-ID');
            }

            function updateBackend() {
                let qty = parseInt(input.value) || 1;

                fetch(`/adopter/cart/${cartId}/update`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            qty: qty
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Qty updated:", data);
                    })
                    .catch(error => {
                        console.log("Error:", error);
                    });
            }

            plus.addEventListener("click", function() {
                input.value = parseInt(input.value || 1) + 1;
                updateView();
                updateBackend();
            });

            minus.addEventListener("click", function() {
                let val = parseInt(input.value || 1);

                if (val > 1) {
                    input.value = val - 1;
                    updateView();
                    updateBackend();
                }
            });

            input.addEventListener("input", function() {
                updateView();
            });

            // hanya update tampilan saat pertama load
            updateView();
        });

    });


    function checkout() {

        let cart = [];
        let totalSemua = 0;

        document.querySelectorAll("tbody tr").forEach(function(row) {

            let data = row.querySelector(".produk-data").dataset;
            let qty = parseInt(row.querySelector(".qty-input").value) || 1;

            let harga = parseInt(data.harga);
            let total = harga * qty;
            totalSemua += total;

            cart.push({
                id_cart: parseInt(data.idCart),
                id_product: data.id ? parseInt(data.id) : null,
                id_catalogue: parseInt(data.idKatalog),
                quantity: qty,
                unit_price: harga,
                total_price: total,
                name_product: data.namaProduk,
                name_catalogue: data.namaKatalog,
            });
        });

        let payload = {
            total_price: totalSemua,
            cart: cart
        };

        localStorage.setItem("checkout_data", JSON.stringify(payload));

        document.getElementById("dataInput").value = JSON.stringify(payload);
        document.getElementById("checkoutForm").submit();
    }
</script>
