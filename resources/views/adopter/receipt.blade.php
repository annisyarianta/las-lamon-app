<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Receipt {{ $data_order->code }}</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 20px;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .container {
            width: 100%;
        }

        .border-box {
            border: 2px solid #2e7d32;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-detail th {
            background: #2e7d32;
            color: #fff;
        }

        .table-detail th,
        .table-detail td {
            border: 1px solid #000;
            padding: 8px;
            font-size: 13px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

    </style>
</head>

<body>

<div class="container">
    <div class="border-box">

        <!-- HEADER -->
        <table>
            <tr>
                <td>
                    <img src="{{ public_path('assets/img/logo.png') }}" height="70">
                    <p style="margin:5px 0;">
                        Tree Purchase & Planting Platform
                    </p>
                </td>
                <td class="text-right">
                    <h3 style="margin:0;">RECEIPT</h3>
                    <p style="margin:5px 0;">{{ $data_receipt->code }}</p>
                </td>
            </tr>
        </table>

        <hr>

        <!-- INFO -->
        <p><strong>Received From :</strong> {{ $data_user->name }}</p>
        <p><strong>Purchased Code :</strong> {{ $data_order->code }}</p>
        <p><strong>Date :</strong> {{ $data_receipt->created_at->format('F j, Y') }}</p>

        <!-- TABLE -->
        <table class="table-detail" style="margin-top:15px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Products</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_order_items as $each_data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $each_data->catalogue->name ?? '-' }}</td>
                    <td>{{ $each_data->product->name ?? '-' }}</td>
                    <td class="text-right">Rp {{ number_format($each_data->unit_price ?? 0, 0, ',', '.') }}</td>
                    <td class="text-center">{{ $each_data->quantity }}</td>
                    <td class="text-right">
                        Rp {{ number_format($each_data->unit_price * $each_data->quantity, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- TOTAL -->
        <p class="text-right" style="margin-top:10px; font-size:16px;">
            <strong>Grand Total: Rp {{ number_format($data_order->total_price, 0, ',', '.') }}</strong>
        </p>

        <!-- TERBILANG -->
        <p style="
            margin-top:10px;
            border:1px solid #ccc;
            padding:10px;
            background:#f9f9f9;
            font-style:italic;
        ">
            {{ ucwords(strtolower($amount_in_words)) }}
        </p>

        <!-- SIGN -->
        <table style="margin-top:50px;">
            <tr>
                <td>
                    Receiver,<br><br><br>
                    Admin Name
                </td>
                <td class="text-right">
                    Payer,<br><br><br>
                    {{ $data_user->name }}
                </td>
            </tr>
        </table>

    </div>
</div>

</body>
</html>