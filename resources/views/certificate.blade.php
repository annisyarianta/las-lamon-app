<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sertifikat</title>
</head>

<body style="margin:0; padding:0; font-family:'Times New Roman', serif; background:#e8f5e9;">

    <div
        style="
    width:1123px;
    height:794px;
    margin:auto;
    background:#ffffff;
    position:relative;
    box-sizing:border-box;
    overflow:hidden;
    border:10px solid #2e7d32;
">

        <!-- DOUBLE BORDER -->
        <div style="position:absolute; top:15px; left:15px; right:15px; bottom:15px; border:3px solid #81c784;"></div>
        <div style="position:absolute; top:30px; left:30px; right:30px; bottom:30px; border:2px solid #c8e6c9;"></div>

        <!-- PATTERN KIRI ATAS -->
        <div
            style="
        position:absolute;
        top:0;
        left:0;
        width:400px;
        height:300px;
        background: repeating-linear-gradient(45deg,
            rgba(46,125,50,0.05),
            rgba(46,125,50,0.05) 10px,
            transparent 10px,
            transparent 20px
        );
        border-bottom-right-radius:200px;
    ">
        </div>

        <!-- PATTERN LINGKARAN -->
        <div
            style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:600px; height:600px; border-radius:50%; border:1px solid rgba(46,125,50,0.08);">
        </div>
        <div
            style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:450px; height:450px; border-radius:50%; border:1px solid rgba(46,125,50,0.06);">
        </div>

        <!-- PATTERN KANAN BAWAH -->
        <div
            style="
        position:absolute;
        bottom:0;
        right:0;
        width:350px;
        height:250px;
        background: repeating-linear-gradient(-45deg,
            rgba(76,175,80,0.06),
            rgba(76,175,80,0.06) 8px,
            transparent 8px,
            transparent 18px
        );
        border-top-left-radius:200px;
    ">
        </div>

        <!-- GRADIENT -->
        <div
            style="
        position:absolute;
        inset:0;
        background: linear-gradient(120deg,
            rgba(76,175,80,0.08),
            transparent 40%,
            rgba(46,125,50,0.08)
        );
    ">
        </div>

        <!-- WATERMARK -->
        <img src="assets/img/logo.png"
            style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); opacity:0.05; height:420px;">

        <!-- LOGO TENGAH (2 LOGO) -->
        <div
            style="
        text-align:center;
        margin-top:60px;
        display:flex;
        justify-content:center;
        align-items:center;
        gap:30px;
    ">
            <img src="{{ asset('assets/img/logo_prov.png')}}" style="height:70px; width:auto;">
            <img src="{{ asset('assets/img/logo.png')}}" style="height:90px; width:auto;">
        </div>

        <!-- JUDUL -->
        <h1
            style="
        text-align:center;
        font-size:48px;
        color:#1b5e20;
        letter-spacing:5px;
        margin-top:10px;
    ">
            CERTIFICATE
        </h1>

        <!-- NOMOR -->
        <p style="text-align:center; font-size:18px; font-weight:bold; margin-bottom:10px;">
            SRT/LL/04/2026/001
        </p>

        <!-- GARIS -->
        <div style="width:220px; height:3px; background:#4caf50; margin:10px auto 15px auto;"></div>

        <p style="text-align:center; font-size:20px; color:#4caf50; font-weight:bold;">
            Environmental Appreciation Award
        </p>

        <!-- ISI -->
        <p style="text-align:center; font-size:20px; margin-top:25px;">
            This certificate is proudly presented to:
        </p>

        <!-- NAMA (SUDAH FIX CENTER) -->
        <div style="text-align:center;">
            <h2
                style="
            font-size:40px;
            color:#2e7d32;
            margin:10px auto;
            border-bottom:3px solid #2e7d32;
            display:inline-block;
            padding-bottom:8px;
        ">
                Ni Putu Tiara
            </h2>
        </div>

        <p
            style="
        text-align:center;
        font-size:20px;
        line-height:1.8;
        margin-top:20px;
        padding:0 140px;
    ">
            In recognition of outstanding contribution to environmental preservation
            through tree planting initiatives, and for actively helping reduce
            carbon emissions by <b>150 kg CO₂</b>.
        </p>

        <p style="text-align:center; font-size:18px; margin-top:20px;">
            Issued on: April 20, 2026
        </p>

        <!-- TTD -->
        <div
            style="
        position:absolute;
        bottom:50px;
        left:80px;
        right:80px;
        display:flex;
        justify-content:space-between;
    ">

            <div style="text-align:center;">
                <p style="margin-bottom:70px;">Ketua LSM</p>
                <div style="border-top:1px solid #000; width:200px;">
                    Nama Ketua LSM
                </div>
            </div>

            <div style="text-align:center;">
                <p style="margin-bottom:70px;">Gubernur</p>
                <div style="border-top:1px solid #000; width:200px;">
                    Rahmat Mirzani Djausal
                </div>
            </div>

        </div>

    </div>

</body>

</html>
