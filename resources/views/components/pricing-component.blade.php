<!-- Pricing Plan Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Medical Packages</h5>
            <h1 class="display-4">Awesome Medical Programs</h1>
        </div>
        <div class="owl-carousel price-carousel position-relative" style="padding: 0 45px 45px 45px;">
            @foreach ($packages as $package)
            {{-- @dd($package) --}}
                <div class="bg-light rounded text-center">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="{{ $package->image }}" alt="image">

                        <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center"
                            style="background: rgba(29, 42, 77, .8);">
                            <h3 class="text-white">{{ $package->progress_title }}</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">$</small>{{ $package->progress_salary }}<small
                                    class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">/
                                    Year</small>
                            </h1>
                        </div>
                    </div>
                    <div class="text-center py-5">
                        @foreach ($package->progress_description as $description)
                            <p>{{ $description }}</p>
                        @endforeach
                        <form action="{{ route('payment.send', $package) }}" method="POST">
                            @csrf
                                <button class="btn btn-primary rounded-pill py-3 px-5 my-2" type="submit" >Apply Now</button>
                        </form>
                        
                        {{-- <a href="{{ route('payment.send', $package) }}" class="btn btn-primary rounded-pill py-3 px-5 my-2"></a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Pricing Plan End -->