@extends('layouts.app')

@section('title', 'Cart - Las Lamon')

@section('content')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">My Cart</h1>
    </div>
    <!-- Single Page Header End -->

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">

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
                                            {{ ucwords(str_replace('_', ' ', $each_data->katalog->nama_katalog ?? '-')) }}
                                        </p>
                                    </td>

                                    <td>
                                        <p class="mb-0 mt-4">
                                            {{ $each_data->produk->nama_produk ?? '-' }}
                                        </p>
                                    </td>

                                    <td>
                                        <p class="mb-0 mt-4">
                                            Rp {{ number_format($each_data->harga_satuan, 0, ',', '.') }}
                                        </p>
                                    </td>

                                    <td class="produk-data" data-id="{{ $each_data->produk->id ?? null }}"
                                        data-id-cart="{{ $each_data->id }}" data-id-katalog="{{ $each_data->katalog->id }}"
                                        data-harga="{{ $each_data->harga_satuan }}"
                                        data-nama-katalog="{{ $each_data->katalog->nama_katalog ?? null }}"
                                        data-nama-produk="{{ $each_data->produk->nama_produk ?? null }}">

                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <button type="button" class="btn btn-sm btn-minus bg-light border">-</button>

                                            <input type="text"
                                                class="form-control form-control-sm text-center border-0 qty-input"
                                                value="{{ $each_data->kuantitas }}">

                                            <button type="button" class="btn btn-sm btn-plus bg-light border">+</button>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="mb-0 mt-4 total-harga">
                                            Rp
                                            {{ number_format($each_data->harga_satuan * $each_data->kuantitas, 0, ',', '.') }}
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

        let cartItems = [];
        let totalSemua = 0;

        document.querySelectorAll("tbody tr").forEach(function(row) {

            let data = row.querySelector(".produk-data").dataset;
            let qty = parseInt(row.querySelector(".qty-input").value) || 1;

            let harga = parseInt(data.harga);
            let total = harga * qty;
            totalSemua += total;

            cartItems.push({
                id_cart: parseInt(data.idCart),
                id_produk: data.id ? parseInt(data.id) : null,
                id_katalog: parseInt(data.idKatalog),
                kuantitas: qty,
                harga_satuan: harga,
                harga_total: total,
                nama_produk: data.namaProduk,
                nama_katalog: data.namaKatalog,
            });
        });

        let payload = {
            total_harga: totalSemua,
            cart_item: cartItems
        };

        localStorage.setItem("checkout_data", JSON.stringify(payload));

        document.getElementById("dataInput").value = JSON.stringify(payload);
        document.getElementById("checkoutForm").submit();
    }
</script>
