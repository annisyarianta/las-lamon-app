<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Receipt</title>
</head>

<body style="margin:0; padding:0; font-family: Arial, sans-serif;">

    <div
        style="
        width: 800px;
        margin: 30px auto;
        border: 2px solid #2e7d32;
        padding: 30px;
        box-sizing: border-box;
    ">

        <!-- Header -->
        <table width="100%">
            <tr>
                <td>
                    <img src="{{ asset('assets/img/logo.png') }}" style="height:80px;">
                    <p style="margin:5px 0; font-size:14px;">
                        Tree Purchase & Planting Platform
                    </p>
                </td>
                <td style="text-align:right;">
                    <h3 style="margin:0;">RECEIPT</h3>
                    <p style="margin:5px 0;">{{ $data_receipt->code }}</p>
                </td>
            </tr>
        </table>

        <hr style="margin:20px 0;">

        <!-- Info -->
        <p><strong>Received From :</strong> {{ $data_user->name }}</p>
        <p><strong>Purchased Code:</strong> {{ $data_order->code }}</p>
        <p><strong>Date:</strong> {{ $data_receipt->created_at->format('F j, Y') }}</p>

        <!-- Table Detail -->
        <table width="100%" border="1" cellspacing="0" cellpadding="8"
            style="margin-top:20px; border-collapse:collapse; font-size:14px;">
            <thead style="background:#2e7d32; color:#fff;">
                <tr>
                    <th>No</th>
                    <th>Products</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data_order_items as $each_data)
                    <tr>
                        <td align="center">{{ $loop->iteration }}</td>
                        <td>{{ $each_data->catalogue->name ?? '-' }}</td>
                        <td>{{ $each_data->product->name ?? '-' }}</td>
                        <td align="right">Rp {{ number_format($each_data->unit_price ?? 0, 0, ',', '.') }}</td>
                        <td align="center">{{ $each_data->quantity }}</td>
                        <td align="right">Rp
                            {{ number_format($each_data->unit_price * $each_data->quantity, 0, ',', '.') }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <!-- Grand Total -->
        <div style="
            margin-top:15px;
            text-align:right;
            font-size:16px;
        ">
            <strong>Grand Total: Rp {{ number_format($data_order->total_price, 0, ',', '.') }}</strong>
        </div>

        <!-- Amount in Words -->
        <p
            style="
            margin-top:15px;
            border:1px solid #ccc;
            padding:10px;
            background:#f9f9f9;
            font-style:italic;
        ">
            {{ ucwords(strtolower($amount_in_words)) }} </p>
        <!-- Signature -->
        <table width="100%" style="margin-top:60px;">
            <tr>
                <td>
                    <p>Receiver,</p>
                    <br><br><br>
                    <p>Admin Name</p>
                </td>

                <td style="text-align:right;">
                    <p>Payer,</p>
                    <br><br><br>
                    <p>Customer Name</p>
                </td>
            </tr>
        </table>

    </div>
</body>

</html>
