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
                    <img src="{{ asset('assets/img/logo.png')}}" style="height:80px;">
                    <p style="margin:5px 0; font-size:14px;">
                        Tree Purchase & Planting Platform
                    </p>
                </td>
                <td style="text-align:right;">
                    <h3 style="margin:0;">RECEIPT</h3>
                    <p style="margin:5px 0;">No: KW/1/1/2026</p>
                </td>
            </tr>
        </table>

        <hr style="margin:20px 0;">

        <!-- Info -->
        <p><strong>Received From :</strong> Customer Name</p>
        <p><strong>Purchased Code:</strong> 8976-x</p>
        <p><strong>Date:</strong> April 20, 2026</p>

        <!-- Table Detail -->
        <table width="100%" border="1" cellspacing="0" cellpadding="8"
            style="margin-top:20px; border-collapse:collapse; font-size:14px;">
            <thead style="background:#2e7d32; color:#fff;">
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center">1</td>
                    <td>Mangrove Tree</td>
                    <td align="center">10</td>
                    <td align="right">Rp 500,000</td>
                    <td align="right">Rp 5,000,000</td>
                </tr>
                <tr>
                    <td align="center">2</td>
                    <td>Mahogany Tree</td>
                    <td align="center">5</td>
                    <td align="right">Rp 1,000,000</td>
                    <td align="right">Rp 5,000,000</td>
                </tr>
            </tbody>
        </table>

        <!-- Grand Total -->
        <div style="
            margin-top:15px;
            text-align:right;
            font-size:16px;
        ">
            <strong>Grand Total: Rp 10,000,000</strong>
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
            Ten Million Rupiah
        </p>

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
