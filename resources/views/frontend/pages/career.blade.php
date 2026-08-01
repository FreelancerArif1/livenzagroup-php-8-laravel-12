@extends('frontend.layouts.app')
@section('title', 'Careers | ' . Helper::getSettings('application_name') ?? 'Livenza Group')
@section('content')
    <style>
        .section-padding {
            --padding-top: 50px;
            --padding-bottom: 50px;
        }

        .button {
            font-size: 14px;
            padding: 2px 20px 2px 20px;
            min-height: 35px !important;
            margin-top: 15px;
            background: none;
        }

        .button--secondary:focus,
        .button--secondary:hover {
            background: none;
            color: #243230;
            border: 1px solid #243230;
        }

        .button .svg-wrapper {
            min-width: 30px;
            height: 30px;
        }

        /* .button--secondary {
                                                                                        color: #fff;
                                                                                        background-color: rgb(8 68 186);
                                                                                    }

                                                                                    .button--secondary .svg-wrapper {
                                                                                        color: #fff;
                                                                                    } */
    </style>
    <main id="sustainability_page">
        <div class="page-banner overlay">
            <div class="media media-bg">
                @if ($career?->banner_video)
                    <video class="full-video" autoplay muted loop playsinline>
                        <source src="{{ $career?->banner_video }}" type="video/mp4">
                    </video>
                @else
                    <img src="{{ $career?->banner_image }}" width="1920" height="520" loading="eager"
                        alt="Page Banner Image">
                @endif

            </div>
            <div class="page-banner-content">
                <div class="container text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left_side_about">
                                @if ($career?->banner_title)
                                    <h3 class="heading text-40 fw-700 text-uppercase mb-4" data-aos="fade-up">
                                        {{ $career?->banner_title }}
                                    </h3>
                                @endif
                                @if ($career?->banner_description)
                                    <div class="about_main_paragraph" data-aos="fade-up" data-aos-delay="200">
                                        {!! $career?->banner_description !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>

        @if ($career?->block_one_title)
            <div class="image-text image-text-video section-padding overflow-x-hidden">
                <div class="container">
                    <div class="section-content">
                        <div class="row product-grid align-items-xl-center">
                            <div class="col-lg-5 col-12">
                                <modal-video class="video-wrap height-100">
                                    <div class="image radius18 height-100" data-aos="fade-right">
                                        <img src="{{ $career?->block_one_image }}" width="1000" height="742"
                                            loading="lazy" alt="Image">
                                        @if ($career?->block_one_video)
                                            <div class="content-absolute">
                                                <div
                                                    class="flex-banner height-inherit d-flex align-items-center justify-content-center">
                                                    <div class="content-box">
                                                        <div class="button button--secondary open-video">
                                                            <svg class="icon-24" viewBox="0 0 12 12" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10.858 5.1281C11.5377 5.51041 11.5377 6.48895 10.858 6.87125L2.04588 11.8281C1.37927 12.203 0.555618 11.7213 0.555618 10.9565V1.04285C0.555618 0.278027 1.37928 -0.203685 2.04588 0.171279L10.858 5.1281Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="video-modal">
                                        <div class="video-modal-inner">
                                            <span class="close">
                                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            </span>
                                            <video class="video-frame" width="100%" height="100%" controls>
                                                <source src="{{ $career?->block_one_video }}" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                </modal-video>

                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="px-lg-4 section-headings" data-aos="fade-left">
                                    <h4 class="heading text-40 fw-700 text-uppercase" data-aos="fade-up">
                                        {{ $career?->block_one_title }}
                                    </h4>
                                    <div class="text text-18">
                                        {!! $career?->block_one_description !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($career?->block_two_title)
            <div class="image-text image-text-video section-padding overflow-x-hidden">
                <div class="container">
                    <div class="section-content">
                        <div class="row product-grid align-items-xl-center">
                            <div class="col-lg-7 col-12">
                                <div class="px-lg-4 section-headings" data-aos="fade-left">
                                    <h4 class="heading text-40 fw-700 text-uppercase" data-aos="fade-up">
                                        {{ $career?->block_two_title }}
                                    </h4>
                                    <div class="text text-18">
                                        {!! $career?->block_two_description !!}
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-5 col-12">
                                <modal-video class="video-wrap height-100">
                                    <div class="image radius18 height-100" data-aos="fade-right">
                                        <img src="{{ $career?->block_two_image }}" width="1000" height="742"
                                            loading="lazy" alt="Image">
                                        @if ($career?->block_two_video)
                                            <div class="content-absolute">
                                                <div
                                                    class="flex-banner height-inherit d-flex align-items-center justify-content-center">
                                                    <div class="content-box">
                                                        <div class="button button--secondary open-video">
                                                            <svg class="icon-24" viewBox="0 0 12 12" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10.858 5.1281C11.5377 5.51041 11.5377 6.48895 10.858 6.87125L2.04588 11.8281C1.37927 12.203 0.555618 11.7213 0.555618 10.9565V1.04285C0.555618 0.278027 1.37928 -0.203685 2.04588 0.171279L10.858 5.1281Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="video-modal">
                                        <div class="video-modal-inner">
                                            <span class="close">
                                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            </span>
                                            <video class="video-frame" width="100%" height="100%" controls>
                                                <source src="{{ $career?->block_two_video }}" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                </modal-video>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($career?->block_three_title)
            <div class="page-banner overlay">
                <div class="media media-bg">
                    <video class="full-video" autoplay muted loop playsinline>
                        <source src="{{ $career?->block_three_video }}" type="video/mp4">
                    </video>
                </div>
                <div class="page-banner-content">
                    <div class="container">
                        <div class="section-content">
                            <div class="row product-grid align-items-xl-center">
                                <div class="col-lg-5 col-12">
                                    <modal-video class="video-wrap height-100">
                                        <div class="image radius18 height-100" data-aos="fade-right">
                                            <img src="{{ $career?->block_three_image }}" width="1000" height="742"
                                                loading="lazy" alt="Image">
                                        </div>
                                        <div class="video-modal">
                                            <div class="video-modal-inner">
                                                <span class="close">
                                                    <svg class="icon-18" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path d="M6 18 18 6M6 6l12 12" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </modal-video>

                                </div>
                                <div class="col-lg-7 col-12">
                                    <div class="px-lg-4 section-headings" data-aos="fade-left">
                                        <h4 class="heading text-40 fw-700 text-uppercase" data-aos="fade-up">
                                            {{ $career?->block_three_title }}
                                        </h4>
                                        <div class="text text-18">
                                            {!! $career?->block_three_description !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($career?->block_four_title)
            <div class="image-text image-text-video section-padding overflow-x-hidden">
                <div class="container">
                    <div class="section-content">
                        <div class="row product-grid align-items-xl-center">
                            <div class="col-lg-7 col-12">
                                <div class="px-lg-4 section-headings" data-aos="fade-left">
                                    <h4 class="heading text-40 fw-700 text-uppercase" data-aos="fade-up">
                                        {{ $career?->block_four_title }}
                                    </h4>
                                    <div class="text text-18">
                                        {!! $career?->block_four_description !!}
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-5 col-12">
                                <modal-video class="video-wrap height-100">
                                    <div class="image radius18 height-100" data-aos="fade-right">
                                        <img src="{{ $career?->block_four_image }}" width="1000" height="742"
                                            loading="lazy" alt="Image">
                                        @if ($career?->block_four_video)
                                            <div class="content-absolute">
                                                <div
                                                    class="flex-banner height-inherit d-flex align-items-center justify-content-center">
                                                    <div class="content-box">
                                                        <div class="button button--secondary open-video">
                                                            <svg class="icon-24" viewBox="0 0 12 12" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10.858 5.1281C11.5377 5.51041 11.5377 6.48895 10.858 6.87125L2.04588 11.8281C1.37927 12.203 0.555618 11.7213 0.555618 10.9565V1.04285C0.555618 0.278027 1.37928 -0.203685 2.04588 0.171279L10.858 5.1281Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="video-modal">
                                        <div class="video-modal-inner">
                                            <span class="close">
                                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            </span>
                                            <video class="video-frame" width="100%" height="100%" controls>
                                                <source src="{{ $career?->block_four_video }}" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                </modal-video>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($career?->block_five_title)
            <div class="image-text image-text-video section-padding overflow-x-hidden">
                <div class="container">
                    <div class="section-content">
                        <div class="row product-grid align-items-xl-center">
                            <div class="col-lg-5 col-12">
                                <modal-video class="video-wrap height-100">
                                    <div class="image radius18 height-100" data-aos="fade-right">
                                        <img src="{{ $career?->block_five_image }}" width="1000" height="742"
                                            loading="lazy" alt="Image">
                                        @if ($career?->block_five_video)
                                            <div class="content-absolute">
                                                <div
                                                    class="flex-banner height-inherit d-flex align-items-center justify-content-center">
                                                    <div class="content-box">
                                                        <div class="button button--secondary open-video">
                                                            <svg class="icon-24" viewBox="0 0 12 12" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M10.858 5.1281C11.5377 5.51041 11.5377 6.48895 10.858 6.87125L2.04588 11.8281C1.37927 12.203 0.555618 11.7213 0.555618 10.9565V1.04285C0.555618 0.278027 1.37928 -0.203685 2.04588 0.171279L10.858 5.1281Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="video-modal">
                                        <div class="video-modal-inner">
                                            <span class="close">
                                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            </span>
                                            <video class="video-frame" width="100%" height="100%" controls>
                                                <source src="{{ $career?->block_five_video }}" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                </modal-video>

                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="px-lg-4 section-headings" data-aos="fade-left">
                                    <h4 class="heading text-40 fw-700 text-uppercase" data-aos="fade-up">
                                        {{ $career?->block_five_title }}
                                    </h4>
                                    <div class="text text-18">
                                        {!! $career?->block_five_description !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif








        <div class="pricing-plan pricing-plan-page mt-100 section-padding">
            <div class="media media-bg">
                <img src="/frontend/assets/img/slider/slider-bg.jpg" alt="slider background" width="1920"
                    height="100" loading="eager">
            </div>
            <div class="container">
                <div class="section-headings text-center">
                    <h4 class="heading text-40 fw-700 text-uppercase" data-aos="fade-up">
                        Job Circulars
                    </h4>
                </div>

                <div class="section-content">
                    <div class="pricing-cards">
                        <div class="row product-grid justify-content-center">

                            @if ($circulars)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($circulars as $circular)
                                    <div class="row single_circlar">
                                        <div class="col-2 col-sm-2 col-md-1">
                                            <div class="circular_serial"> {{ $i }}</div>
                                        </div>
                                        <div class="col-10 col-sm-10 col-md-3">
                                            <div class="job_title">{{ $circular->job_title }}</div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-3">
                                            <div class="job_deadline">
                                                <ul>
                                                    <li> <b>Start Date: </b>
                                                        {{ \Carbon\Carbon::parse($circular->start_date)->format('d M, Y') }}
                                                    </li>
                                                    <li> <b>End Date: </b>
                                                        {{ \Carbon\Carbon::parse($circular->end_date)->format('d M, Y') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-3" style="textright;">
                                            <a href="{{ $circular->pdf }}" target="__blank">
                                                <button type="submit" class="pdf_bnt button button--secondary"
                                                    aria-label="Send Message">
                                                    View Circular
                                                </button>
                                            </a>

                                        </div>
                                        <div class="col-6 col-sm-6 col-md-2 text-right" style="text-align: right;">
                                            <a href="{{ route('career.single', $circular->job_slug) }}">
                                                <button type="submit" class="apply_btn button button--secondary"
                                                    aria-label="Send Message">
                                                    Apply
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="container">

        </div>

    </main>

    {{-- <script src="/frontend/assets/js/main.js" defer></script> --}}
@endsection
