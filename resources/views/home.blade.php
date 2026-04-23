@extends('layouts.app')

@section('title', 'Home - Las Lamon')

@section('content')

    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-3 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center text-center">
                <div class="mb-3">
                    <span class="bg-secondary text-light px-3 py-2 rounded-pill">
                        Nature's Legacy
                    </span>
                </div>
                <h1 class="mb-1 display-3">
                    <span class="text-light">Adopt a Soul,</span> <br>
                    <span class="text-secondary">Plant a Future.</span>
                </h1>
                <p class="text-center text-light mb-3">
                    Join the restoration of Taman Kehati and Taman Kupu-kupu Gita Persada. </br>
                    Every tree tells a story of survival.
                </p>
                <div class="position-relative text-center">
                    <a href="{{ route('catalogue.index') }}">
                        <button type="submit"
                            class="btn btn-primary py-3 px-4 position-absolute top-50 start-50 translate-middle rounded-pill text-white">
                            Explore Now
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- Hero End -->

    @include('components.integrated_ecosystem')

    @include('components.catalogue')
@endsection
