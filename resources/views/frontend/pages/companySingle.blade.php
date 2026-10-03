@extends('frontend.layouts.app')
@section('title', 'Company | ' . Helper::getSettings('application_name') ?? 'Livenza Group')
@section('content')
    <main id="companysingle_page">
        <!-- Page Banner -->
        @php
            $url = $slider?->youtube_video;
            $videoId = '';
            if (strpos($url, 'watch?v=') !== false) {
                $videoId = explode('watch?v=', $url)[1];
            } elseif (strpos($url, 'youtu.be/') !== false) {
                $videoId = explode('youtu.be/', $url)[1];
            } elseif (strpos($url, 'embed/') !== false) {
                $videoId = explode('embed/', $url)[1];
            }
            $embedUrl = "https://www.youtube.com/embed/{$videoId}";
        @endphp
        <div class="page-banner overlay">
            <div class="media media-bg">
                @if ($slider?->video)
                    <video class="full-video" autoplay muted loop playsinline>
                        <source src="{{ $slider?->video }}" type="video/mp4">
                    </video>
                @elseif($slider?->youtube_video)
                    <iframe class="full-video"
                        src="{{ $embedUrl }}?autoplay=1&mute=1&loop=1&playlist={{ $videoId }}&controls=0&showinfo=0&modestbranding=1"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                    </iframe>
                @else
                    <img src="{{ $slider?->image }}" width="1920" height="520" loading="eager" alt="Page Banner Image">
                @endif

            </div>
            <div class="page-banner-content">
                <div class="container text-left">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="left_side_slider">
                                <div class="company_logo">
                                    <img src="{{ $slider?->company_logo }}" height="auto" alt="">
                                </div>

                                @if ($slider?->title)
                                    <h4 class="heading text-20 fw-700 text-uppercase mb-4 slider_title" data-aos="fade-up">
                                        {{ $slider?->title }}
                                    </h4>
                                @endif

                                <div class="slider_main_paragraph" data-aos="fade-up" data-aos-delay="200">
                                    {!! $slider?->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <div class="right_top_slider">
                                @if ($slider?->right_title_1)
                                    <h6 class="heading text-20 fw-700 text-uppercase mb-2" data-aos="fade-up">
                                        <span class="heading_border">{{ $slider?->right_title_1 }}</span>
                                    </h6>
                                @endif
                                @if ($slider?->right_description_1)
                                    <div class="slider_main_paragraph" data-aos="fade-up" data-aos-delay="200">
                                        {!! $slider?->right_description_1 !!}
                                    </div>
                                @endif
                            </div>

                            <div class="right_bottom_slider">
                                @if ($slider?->right_title_2)
                                    <h6 class="heading text-20 fw-700 text-uppercase mb-2" data-aos="fade-up">
                                        <span class="heading_border">{{ $slider?->right_title_2 }}</span>
                                    </h6>
                                @endif
                                @if ($slider?->right_description_2)
                                    <div class="slider_main_paragraph" data-aos="fade-up" data-aos-delay="200">
                                        {!! $slider?->right_description_2 !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($company?->button_link)
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 button_container text-center">

                        <a href="{{ $company?->button_link }}" class="middlebutton" title="Visit {{ $slider?->title }}">
                            <div class="visit_company_logo">
                                <img src="{{ $slider?->company_logo }}" height="auto" alt="">
                            </div>
                        </a>
                        {{-- <span class="triangle icon"></span> --}}
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        @endif









        <!-- products -->
        @if ($products)
            <div class="featured-blog section-padding">
                <div class="container">
                    <div class="section-headings text-center">
                        <h3 class="heading text-40 fw-700 text-uppercase" data-aos="fade-up" data-aos-delay="50">
                            Our Collection
                        </h3>
                    </div>
                    <div class="section-content">
                        <div class="row product-grid justify-content-center">
                            @if ($products)
                                @foreach ($products as $item)



                                    <div class="col-md-4">
                                        <div class="product_single_card">
                                            <div class="product_single_img_box">
                                                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="product_single_img">
                                            </div>
                                            <div class="product_single_body">
                                                <h3 class="product_single_title">{{ $item->title }}</h3>
                                                <p class="product_single_subtitle"> {{ \Carbon\Carbon::parse($item->reg_year)->format('Y') }}</p>
                                                
                                                <div class="product_single_specs">
                                                    <span class="product_single_fuel">{{ $item->fuel_type }}</span>
                                                    <span class="product_single_mileage"> {{ $item->mileage }}</span>
                                                </div>
                                                
                                                <hr class="product_single_divider">
                                                
                                                <div class="product_single_price">BDT  {{ $item->price }}</div>
                                                
                                                <a href="{{ route('single.product', $item->slug) }}" class="product_single_btn">Show Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif






        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="single_company_title">
                        {{ $company?->title }}
                        <div class="single_page_title_border"></div>
                    </div>

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

        <div class="container" id="single_page_description">
            <div class="row">
                <div class="col-md-12">
                    <div class="single_page_description">
                        <h4 class="heading text-20 fw-700 text-uppercase mb-4" data-aos="fade-up">
                            {{ $company?->sub_title }}
                        </h4>
                        <div data-aos="fade-up">
                            {!! $company?->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>








        <!-- Featured Blog -->
        @if ($portfolios)
            <div class="featured-blog section-padding">
                <div class="container">
                    <div class="section-headings text-center">
                        <h3 class="heading text-40 fw-700 text-uppercase" data-aos="fade-up" data-aos-delay="50">
                            Portfolios
                        </h3>
                    </div>
                    <div class="section-content">
                        <div class="row product-grid justify-content-center">
                            @if ($portfolios)
                                @foreach ($portfolios as $item)
                                    <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                                        <div class="card-blog radius18">
                                            <a class="card-blog-bottom"
                                                @if ($item->button_link) href="{{ $item->button_link }}" target="__blank" @endif
                                                aria-label="Blog details">
                                                <div class="media">
                                                    @if ($item->video)
                                                        <video class="full-video" autoplay muted loop playsinline>
                                                            <source src="{{ $item?->video }}" type="video/mp4">
                                                        </video>
                                                    @else
                                                        <img src="{{ $item->image }}" alt="blog image" width="1000"
                                                            height="707" loading="lazy">
                                                    @endif
                                                </div>
                                                @if ($item->button_text)
                                                    <div class="buttons">
                                                        <div class="button button--primary">
                                                            {{ $item->button_text }}
                                                            <svg viewBox="0 0 11 10" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M2.16668 0.833333C2.16668 0.61232 2.25448 0.400358 2.41076 0.244078C2.56704 0.0877975 2.779 0 3.00001 0H9.66668C9.88769 0 10.0997 0.0877975 10.2559 0.244078C10.4122 0.400358 10.5 0.61232 10.5 0.833333V7.5C10.5 7.72101 10.4122 7.93297 10.2559 8.08926C10.0997 8.24554 9.88769 8.33333 9.66668 8.33333C9.44567 8.33333 9.2337 8.24554 9.07742 8.08926C8.92114 7.93297 8.83335 7.72101 8.83335 7.5V2.845L1.92251 9.75583C1.76535 9.90763 1.55484 9.99163 1.33635 9.98973C1.11785 9.98783 0.908839 9.90019 0.754332 9.74568C0.599825 9.59118 0.512184 9.38216 0.510285 9.16367C0.508387 8.94517 0.592382 8.73467 0.744181 8.5775L7.65501 1.66667H3.00001C2.779 1.66667 2.56704 1.57887 2.41076 1.42259C2.25448 1.26631 2.16668 1.05435 2.16668 0.833333Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($projects && count($projects) > 0)
            <project-slider class="project-slider section-padding">
                <div class="container">
                    <div class="section-headings headings-width text-center">
                        <h3 class="heading text-40 fw-700 text-uppercase" data-aos="fade-up" data-aos-delay="20">
                            Latest project
                        </h3>
                    </div>
                </div>
                <div class="section-content">
                    <div class="container-fluid slider-container" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($projects as $item)
                                    <div class="swiper-slide">
                                        <a class="card-project radius18" aria-label="project details"
                                            @if ($item->button_link) href="{{ $item->button_link }}" @endif>
                                            <img src="{{ $item->image }}" alt="project image" width="645"
                                                height="690" loading="lazy">
                                            <div class="card-project-content-absolute">
                                                <div class="card-project-content">
                                                    <h2 class="heading text-24">{{ $item->title }}</h2>
                                                    <p class="text text-16">{{ $item->sub_title }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="swiper-nav-border">
                            <div class="swiper-nav-inner">
                                <div class="swiper-button-prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                </div>
                                <div class="swiper-button-next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </project-slider>
        @endif

        @if ($company->map)
            <section id="mapsection" class="section-padding"
                style="background-image: url(/frontend/assets/img/footer/footer-bg-large.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <iframe src="{{ $company->map }}" width="100%" height="450" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    </main>
@endsection
