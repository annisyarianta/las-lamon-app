<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Certificate {{ $certificate->owner_name }}</title>

<style>
    @page {
        size: A4 landscape;
        margin: 0;
    }

    body {
        margin: 0;
        font-family: "Times New Roman", serif;
    }

    .outer {
        padding: 60px;
    }

    .certificate {
        font-size: 14;
        border: 6px solid #2e7d32;
        padding: 20px;
    }

    .inner {
        border: 2px solid #81c784;
        padding: 20px;
    }

    .center {
        text-align: center;
    }

    .title {
        font-size: 40px;
        color: #1b5e20;
        margin: 10px 0;
    }

    .name {
        font-size: 30px;
        font-weight: bold;
        color: #2e7d32;
        border-bottom: 2px solid #2e7d32;
        display: inline-block;
        padding: 5px 15px;
    }

</style>
</head>

<body>

<div class="outer">
    <div class="certificate">
        <div class="inner">

            <!-- LOGO -->
            <div class="center">
                <img src="{{ public_path('assets/img/logo_prov.png') }}" height="60">
                &nbsp;&nbsp;
                <img src="{{ public_path('assets/img/logo.png') }}" height="80">
            </div>

            <!-- TITLE -->
            <h1 class="center title">CERTIFICATE</h1>

            <!-- SUB -->
            <p class="center" style="color:#4caf50; font-size: 16;">
                Environmental Appreciation Award
            </p>

            <!-- DATE -->
            <p class="center" style="font-size: 14;">
                Issued on: {{ \Carbon\Carbon::parse($certificate->created_at)->format('F d, Y') }}
            </p>

            <!-- TEXT -->
            <p class="center" style="margin-top:20px; font-size: 14;">
                This certificate is proudly presented to:
            </p>

            <!-- NAME -->
            <div class="center">
                <span class="name">
                    {{ $certificate->owner_name }}
                </span>
            </div>

            <!-- DESC -->
            <p class="center" style="padding:10px 80px; font-size: 14;">
                In recognition of outstanding contribution to environmental preservation
                through tree planting initiatives and helping reduce carbon emissions
                by <b>150 kg CO₂</b>.
            </p>
            
            <!-- SIGN -->
            <table width="100%" style="margin-top:40px;">
                <tr>
                    <td align="center">
                        Ketua LSM<br><br><br>
                        _____________<br>
                        Nama Ketua LSM
                    </td>

                    <td align="center">
                        Gubernur<br><br><br>
                        _____________<br>
                        Rahmat Mirzani Djausal
                    </td>
                </tr>
            </table>

        </div>
    </div>
</div>

</body>
</html>