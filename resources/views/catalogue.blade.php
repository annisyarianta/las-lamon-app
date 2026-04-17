@extends('layouts.app')

@section('title', 'Catalogue Product - Las Lamon')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Catalogue</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Catalogue</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Vesitable Catalogue Start-->
    <div class="container-fluid vesitable pb-5">
        <div class="container py-5 text-center">
            {{-- <p class="mb-4">
            Explore our curated collection of tree adoptions, carefully selected to support environmental sustainability
            and protect our planet.
        </p> --}}
            <!-- Wrapper -->
            <div class="catalogue-wrapper">
                <div class="row justify-content-center g-4 d-none d-md-flex">

                    <!-- Item 1 -->
                    <div class="col-md-4">
                        <div class="border border-primary rounded vesitable-item text-center p-4 d-flex flex-column h-100">
                            <div class="mb-3">
                                <img src="{{ asset('assets/img/single.png') }}" class="img-fluid mx-auto d-block"
                                    style="width: 70px;">
                            </div>
                            <h5>Paket Satuan</h5>
                            <p class="small flex-grow-1">
                                Donasi 1, 3, atau 8 bibit pohon.
                            </p>
                            <p class="small">
                                <strong>Output:</strong> E-Sertifikat Reguler <br>
                                <strong>Target:</strong> Individu dan Pelajar
                            </p>
                            <a href="{{ route('detail.product') }}"
                                class="btn btn-primary rounded-pill px-3 text-primary mt-auto">
                                <i class="fa fa-info-circle me-1"></i> Detail Product
                            </a>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="col-md-4">
                        <div class="border border-primary rounded vesitable-item text-center p-4 d-flex flex-column h-100">
                            <div class="mb-3">
                                <img src="{{ asset('assets/img/mini-forest.png') }}" class="img-fluid mx-auto d-block"
                                    style="width: 70px;">
                            </div>
                            <h5>Paket Hutan Mini</h5>
                            <p class="small flex-grow-1">
                                Pembangunan satu blok hutan seluas 200 m2 dengan penanaman padat.
                            </p>
                            <p class="small">
                                <strong>Output:</strong> Papan Nama Fisik & Dashboard Khusus <br>
                                <strong>Target:</strong> Perusahaan (CSR) & Komunitas
                            </p>
                            <a href="#" class="btn btn-primary rounded-pill px-3 text-primary mt-auto">
                                <i class="fa fa-info-circle me-1"></i> Detail Product
                            </a>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="col-md-4">
                        <div class="border border-primary rounded vesitable-item text-center p-4 d-flex flex-column h-100">
                            <div class="mb-3">
                                <img src="{{ asset('assets/img/paket-khusus.png') }}" class="img-fluid mx-auto d-block"
                                    style="width: 70px;">
                            </div>
                            <h5>Paket Khusus</h5>
                            <p class="small flex-grow-1">
                                Pengayaan Daerah Aliran Sungai (DAS) dan kolaborasi pelestarian.
                            </p>
                            <p class="small">
                                <strong>Output:</strong> Laporan Kolaborasi Kustom <br>
                                <strong>Target:</strong> NGO, Institusi, & Kolaborasi Eksternal
                            </p>
                            <a href="#" class="btn btn-primary rounded-pill px-3 text-primary mt-auto">
                                <i class="fa fa-info-circle me-1"></i> Detail Product
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Mobile Carousel -->
                <div class="owl-carousel vegetable-carousel d-md-none">
                    <!-- Item 1 -->
                    <div class="item">
                        <div class="border border-primary rounded vesitable-item text-center p-4 d-flex flex-column h-100">
                            <div class="mb-3">
                                <img src="{{ asset('assets/img/single.png') }}" class="img-fluid mx-auto d-block"
                                    style="width: 70px;">
                            </div>
                            <h5>Paket Satuan</h5>
                            <p class="small flex-grow-1">
                                Donasi 1, 3, atau 8 bibit pohon.
                            </p>
                            <p class="small">
                                <strong>Output:</strong> E-Sertifikat Reguler <br>
                                <strong>Target:</strong> Individu dan Pelajar
                            </p>
                            <a href="#" class="btn btn-primary rounded-pill px-3 text-primary mt-auto">
                                <i class="fa fa-info-circle me-1"></i> Detail Product
                            </a>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="item">
                        <div class="border border-primary rounded vesitable-item text-center p-4 d-flex flex-column h-100">
                            <div class="mb-3">
                                <img src="{{ asset('assets/img/mini-forest.png') }}" class="img-fluid mx-auto d-block"
                                    style="width: 70px;">
                            </div>
                            <h5>Paket Hutan Mini</h5>
                            <p class="small flex-grow-1">
                                Pembangunan satu blok hutan seluas 200 m2 dengan penanaman padat.
                            </p>
                            <p class="small">
                                <strong>Output:</strong> Papan Nama Fisik & Dashboard Khusus <br>
                                <strong>Target:</strong> Perusahaan (CSR) & Komunitas
                            </p>
                            <a href="#" class="btn btn-primary rounded-pill px-3 text-primary mt-auto">
                                <i class="fa fa-info-circle me-1"></i> Detail Product
                            </a>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="item">
                        <div class="border border-primary rounded vesitable-item text-center p-4 d-flex flex-column h-100">
                            <div class="mb-3">
                                <img src="{{ asset('assets/img/paket-khusus.png') }}" class="img-fluid mx-auto d-block"
                                    style="width: 70px;">
                            </div>
                            <h5>Paket Khusus</h5>
                            <p class="small flex-grow-1">
                                Pengayaan Daerah Aliran Sungai (DAS) dan kolaborasi pelestarian.
                            </p>
                            <p class="small">
                                <strong>Output:</strong> Laporan Kolaborasi Kustom <br>
                                <strong>Target:</strong> NGO, Institusi, & Kolaborasi Eksternal
                            </p>
                            <a href="#" class="btn btn-primary rounded-pill px-3 text-primary mt-auto">
                                <i class="fa fa-info-circle me-1"></i> Detail Product
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Vesitable Catalogue End -->
@endsection
