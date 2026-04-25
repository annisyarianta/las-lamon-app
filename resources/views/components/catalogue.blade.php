<!-- Vesitable Catalogue Start-->
<div class="container-fluid vesitable pb-5">
    <div class="container py-5 text-center">
        <h1 class="mb-3">Catalogue</h1>
        {{-- <p class="mb-4">
            Explore our curated collection of tree adoptions, carefully selected to support environmental sustainability
            and protect our planet.
        </p> --}}
        <!-- Wrapper -->
        <div class="catalogue-wrapper">
            <div class="row justify-content-center g-4 d-none d-md-flex">
                @php
                    $data = DB::table('catalogues')->where('soft_delete', 0)->get();
                @endphp
                <!-- Item 1 -->
                @foreach ($data as $each_data)
                    <div class="col-md-4">
                        <div
                            class="border border-primary rounded vesitable-item text-center p-4 d-flex flex-column h-100">
                            <div class="mb-3">
                                <img src="{{ asset($each_data->image_url) }}" class="img-fluid mx-auto d-block"
                                    style="width: 70px;">
                            </div>
                            <h5>{{ $each_data->name }}</h5>
                            <p class="small flex-grow-1">
                                {{ $each_data->mini_description }}
                            </p>
                            <p class="small">
                                <strong>Output:</strong> {{ $each_data->output }} <br>
                                <strong>Target:</strong> {{ $each_data->target }}
                            </p>
                            <a href="{{ route('catalogue.show', ['id' => Crypt::encrypt($each_data->id)]) }}"
                                class="btn btn-primary rounded-pill px-3 text-primary mt-auto">
                                <i class="fa fa-info-circle me-1"></i> Detail Product
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Mobile Carousel -->
            <div class="owl-carousel vegetable-carousel d-md-none">
                <!-- Item 1 -->
                @php
                    $data = DB::table('catalogues')->where('soft_delete', 0)->get();
                @endphp
                <!-- Item 1 -->
                @foreach ($data as $each_data)
                    <div class="col-md-4">
                        <div
                            class="border border-primary rounded vesitable-item text-center p-4 d-flex flex-column h-100">
                            <div class="mb-3">
                                <img src="{{ asset($each_data->image_url) }}" class="img-fluid mx-auto d-block"
                                    style="width: 70px;">
                            </div>
                            <h5>{{ $each_data->name }}</h5>
                            <p class="small flex-grow-1">
                                {{ $each_data->mini_description }}
                            </p>
                            <p class="small">
                                <strong>Output:</strong> {{ $each_data->output }} <br>
                                <strong>Target:</strong> {{ $each_data->target }}
                            </p>
                            <a href="{{ route('catalogue.show', ['id' => Crypt::encrypt($each_data->id)]) }}"
                                class="btn btn-primary rounded-pill px-3 text-primary mt-auto">
                                <i class="fa fa-info-circle me-1"></i> Detail Product
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
<!-- Vesitable Catalogue End -->
