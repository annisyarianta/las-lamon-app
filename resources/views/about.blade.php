@extends('layouts.app')

@section('title', 'About - Las Lamon')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">About</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#" class="text-secondary">Home</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-secondary">Pages</a></li>
            <li class="breadcrumb-item active text-white">About</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Contact Start -->
    <div class="container-fluid contact mb-5">
        <div class="container py-5">
            <div class="p-5">
                <div class="row g-4">
                    <div class="col-lg-12 mb-5">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-5 text-center">
                                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid rounded shadow-sm"
                                    alt="About Image">
                            </div>
                            <div class="col-lg-7">
                                <h2 class="fw-bold mb-3 text-primary">About Us</h2>
                                <p class="text-muted mb-3">
                                    This application is an integrated participatory reporting and funding platform designed
                                    to manage tree planting in Taman Kehati, Kota Baru,
                                    as well as village areas and Green Open Spaces (RTH) across Lampung Province. It
                                    connects environmentally conscious communities, CSR-driven
                                    companies, local plant nurseries (UMKM), and government agencies into a single digital
                                    ecosystem to support the Blue-Green Corridor concept.
                                    Its main goal is not only tree planting, but also to build a centralized, trackable
                                    “mini forest” ecosystem for carbon absorption.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-5">
                        <div class="row g-3 justify-content-center">
                            <!-- Address -->
                            <div class="col-6">
                                <div class="d-flex flex-column text-center p-4 rounded bg-white shadow-sm h-100">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary mb-3"></i>
                                    <h6 class="mb-1">Address</h6>
                                    <p class="mb-0 text-muted small">Bandar Lampung</p>
                                </div>
                            </div>
                            <!-- Telephone -->
                            <div class="col-6">
                                <a href="{{ url('wa.me/+6281216163395') }}">
                                    <div class="d-flex flex-column text-center p-4 rounded bg-white shadow-sm h-100">
                                        <i class="fa fa-whatsapp fa-2x text-primary mb-3"></i>
                                        <h6 class="mb-1">Whatsapp</h6>
                                        <p class="mb-0 text-muted small">(+628)12 1616 3395</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h3 class="fw-bold text-center mb-4 text-primary">Our Location</h3>
                        <p><strong>First Location:</strong> Taman Kupu-Kupu Gita Persada</p>
                        <div class="h-100 rounded">
                            <iframe class="rounded w-100" style="height: 400px;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.9737561516604!2d105.18604807498421!3d-5.420957994558296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40d0ee410a9f31%3A0xaf551738d31f3917!2sTaman%20Kupu-kupu%20Gita%20Persada!5e0!3m2!1sen!2sid!4v1776328147063!5m2!1sen!2sid"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <p><strong>Second Location:</strong> Taman Keanekaragaman Hayati (Taman Kehati)</p>
                        <div class="h-100 rounded">
                            <iframe class="rounded w-100" style="height: 400px;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.977683383357!2d105.43352137416987!3d-5.266149752925829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40eb007f9c48b5%3A0x9371a8677eaf13a9!2sTaman%20Keanekaragaman%20Hayati%20Provinsi%20Lampung!5e0!3m2!1sen!2sid!4v1776329137861!5m2!1sen!2sid"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
