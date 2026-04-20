<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kwitansi Pembelian</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif;">

    <div style="
        width: 800px;
        margin: 30px auto;
        border: 2px solid #2e7d32;
        padding: 30px;
        box-sizing: border-box;
    ">

        <!-- Header -->
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <div>
                <h2 style="margin:0; color:#2e7d32;">LAS LAMON</h2>
                <p style="margin:5px 0; font-size:14px;">
                    Platform Pembelian & Penanaman Pohon
                </p>
            </div>
            <div style="text-align:right;">
                <h3 style="margin:0;">KWITANSI</h3>
                <p style="margin:5px 0;">No: KW/1/1/2026</p>
            </div>
        </div>

        <hr style="margin:20px 0;">

        <!-- Info -->
        <p><strong>Sudah Terima Dari:</strong>Nama Konsumen</p>
        <p><strong>Tanggal:</strong> 20 April 2026</p>

        <p><strong>Jumlah Uang:</strong></p>
        <p style="
            border:1px solid #ccc;
            padding:10px;
            background:#f9f9f9;
            font-style:italic;
        ">
            Terbilang
        </p>

        <p><strong>Untuk Pembayaran:</strong></p>
        <p style="
            border:1px solid #ccc;
            padding:10px;
            background:#f9f9f9;
        ">
            Pembelian 10 pohon melalui platform Las Lamon 
            sebagai bentuk kontribusi terhadap pelestarian lingkungan.
        </p>

        <!-- Total -->
        <div style="
            margin-top:20px;
            text-align:right;
            font-size:18px;
        ">
            <strong>Total: 
                10.000.000
                {{-- Rp {{ number_format($total, 0, ',', '.') }} --}}
            </strong>
        </div>

        <!-- TTD -->
        <div style="
            margin-top:60px;
            display:flex;
            justify-content:space-between;
        ">
            <div>
                <p>Penerima,</p>
                <br><br><br>
                <p>Nama Admin</p>
            </div>

            <div style="text-align:right;">
                <p>Pembayar,</p>
                <br><br><br>
                <p>Nama Konsumen</p>
            </div>
        </div>
    </div>
</body>
</html>