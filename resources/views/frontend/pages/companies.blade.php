@extends('frontend.layouts.app')
@section('title', 'Companies | ' . Helper::getSettings('application_name') ?? 'Livenza Group')
@section('content')
    <main id="blog_page">
        <div class="page-banner overlay">
            <div class="media media-bg">
                <img src="/uploads/about/692c50dc5a42c_1764511964.jpg" width="1920" height="520" loading="eager"
                    alt="Page Banner Image">
            </div>
            <div class="page-banner-content">
                <div class="container text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left_side_about">

                                <h3 class="heading text-40 fw-700 text-uppercase mb-4" data-aos="fade-up">
                                    Companies
                                </h3>
                                <div class="about_main_paragraph" data-aos="fade-up" data-aos-delay="200">
                                    Short description introducing Livenza Group: “Uniting clean energy, EV mobility,
                                    sustainable manufacturing, and industrial retail for multi-sector growth.”
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-projects company_image pt-5 pb-5">
            <div class="container-fluid">
                <div class="row product-grid">
                    @if ($companies)
                        @foreach ($companies as $company)
                            @if ($company?->company_logo)
                                <div class="col-12 col-sm-6 col-lg-3 col-xl-3 single_company_box company_page mb-3" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <a class="card-project copmany_card radius18" aria-label="project details"
                                        href="{{ $company->button_link }}" target="__blank">
                                        <img src="{{ $company?->company_logo ? $company?->company_logo : null }}"
                                            alt="project image" width="645" height="690" loading="lazy">
                                        <div class="card-project-content-absolute">
                                            <div class="card-project-content">
                                                <h6 class="heading text-15">{{ $company->company_name }}</h6>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>

            </div>
        </div>


    </main>
@endsection
