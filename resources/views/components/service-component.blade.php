<!-- Services Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Services</h5>
            <h1 class="display-4">Excellent Medical Services</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                @foreach ($services as $service)
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            {{-- <i class="fa fa-2x fa-user-md text-white"></i> --}}
                            <x-dynamic-component
                                :component="$service->icon"
                                class="text-white h-3 w-3"
                            />                        
                        </div>
                        <h4 class="mb-3">{{ $service->service_title }}</h4>
                        <p class="m-0">{{ $service->service_description }}</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="#!">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Services End -->