@extends('frontend.layouts.app')
@section('title', 'Home | ' . Helper::getSettings('application_name') ?? 'Livenza Group')
@section('content')
<main id="homepage" style="background-image: url(/frontend/assets/img/footer/footer-bg-larged.jpg)">

    <!-- Projects -->
    <!-- <div class="page-projects">
        <div class="container-fluid">
            <div class="row product-grid">

                @if ($companies)
                    @foreach ($companies as $company)
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-6 single_company_box p-0" data-aos="fade-up"
                            data-aos-delay="200">
                            <a class="card-project radius18" aria-label="project details"
                                href="{{ route('single.company', $company->slug) }}">
                                <img src="{{ $company->image }}" alt="project image" width="645" height="690"
                                    loading="lazy">
                                <div class="card-project-content-absolute">
                                    <div class="card-project-content">
                                        <h2 class="heading text-18-18">{{ $company->title }}</h2>
                                        <p class="text text-13-13">{{ $company->sub_title }}</p>
                                    </div>
                                </div>

                            </a>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
    </div> -->





    





<div class="page-projects">
    <div class="container-fluid p-0">
        <div class="asymmetric-grid" id="projectGrid">
            @if ($companies)
                @foreach ($companies as $company)
                    <div class="single_company_box" data-aos="fade-up">
                        <a class="card-project" href="{{ route('single.company', $company->slug) }}">
                            <img src="{{ $company->image }}" alt="{{ $company->title }}" loading="lazy">
                            <div class="card-project-content-absolute">
                                <div class="card-project-content">
                                    <h2 class="heading">{{ $company->title }}</h2>
                                    <p class="text">{{ $company->sub_title }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>





</main>
@endsection
