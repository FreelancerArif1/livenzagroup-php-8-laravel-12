<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <meta property="og:title" content="{{ Helper::getSettings('application_name') }}">
    <meta property="og:description" content="{{ Helper::getSettings('application_toll_free') }}">
    <meta property="og:url" content="https://livenzagroup.com">
    <meta property="og:image"
        content="{{ Helper::getSettings('site_logo') ? asset(Helper::getSettings('site_logo')) : '/logo.png' }}">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="300">
    <meta property="og:type" content="website">



    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ Helper::getSettings('application_name') }}">
    <meta name="twitter:description" content="{{ Helper::getSettings('application_toll_free') }}">
    <meta name="twitter:image"
        content="{{ Helper::getSettings('site_logo') ? asset(Helper::getSettings('site_logo')) : '/logo.png' }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{ Helper::getSettings('application_toll_free') }}">
    <meta name="keywords" content="{{ Helper::getSettings('application_fax') }}">
    <meta name="author" content="{{ Helper::getSettings('application_name') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ Helper::getSettings('site_favicon') ? asset(Helper::getSettings('site_favicon')) : '/favicon.png' }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ Helper::getSettings('site_favicon') ? asset(Helper::getSettings('site_favicon')) : '/favicon.png' }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ Helper::getSettings('site_favicon') ? asset(Helper::getSettings('site_favicon')) : '/favicon.png' }}">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        :root {
            /* Typography */
            --theme-bg-black: #3333;
            --theme-bg-green: #33CC33;
            --theme-bg-blue: #0033CC;
            --font-body--family: "Inter", sans-serif;
            --font-body--style: normal;
            --font-body--weight: 400;

            --font-heading--family: "Poppins", sans-serif;
            --font-heading--style: normal;
            --font-heading--weight: 600;

            --font-button--family: "Poppins", sans-serif;
            --font-button--style: normal;
            --font-button--weight: 600;

            /* h1-h6 */
            --font-h1--size: 60px;
            --font-h2--size: 48px;
            --font-h3--size: 36px;
            --font-h4--size: 24px;
            --font-h5--size: 20px;
            --font-h6--size: 16px;

            /* header nav */
            --font-nav-main: 16px;

            /* Colors */
            --color-background: rgba(255, 255, 255, 1);
            --color-foreground: rgba(28, 37, 57, 1);
            --color-foreground-heading: rgba(28, 37, 57, 1);
            --color-foreground-subheading: rgba(93, 102, 111, 1);
            --color-background-subheading: rgba(255, 255, 255, 0.1);
            --color-border-subheading-bg: rgba(32, 40, 45, 0.1);
            --color-primary: rgba(28, 37, 57, 1);
            --color-primary-background: rgba(28, 37, 57, 1);
            --color-primary-hover: rgba(28, 37, 57, 1);
            --color-primary-background-hover: rgba(28, 37, 57, 1);
            --color-border: rgba(255, 255, 255, 0.3);
            --color-border-hover: rgba(93, 102, 111, 0.5);
            --color-shadow: rgba(0, 0, 0, 1);
            --color-overlay: rgba(28, 37, 57, 0.6);

            /* Buttons */
            --font-button-size: 16px;
            --font-button-size-mobile: 16px;
            --style-button-height: 56px;
            --style-button-height-mobile: 48px;
            --style-button-slim-height: 52px;
            --style-button-slim-height-mobile: 40px;
            --style-cta-underline-offset: 5px;
            --style-cta-underline-thickness: 1px;

            /* Colors - Primary Button */
            --color-primary-button-text: rgba(255, 255, 255, 1);
            --color-primary-button-background: rgba(32, 40, 45, 1);
            --color-primary-button-border: rgba(32, 40, 45, 1);
            --color-primary-button-icon: rgba(28, 37, 57, 1);
            --color-primary-button-icon-background: rgba(255, 255, 255, 1);

            --color-primary-button-hover-text: rgba(32, 40, 45, 1);
            --color-primary-button-hover-background: rgba(255, 255, 255, 1);
            --color-primary-button-hover-border: rgba(32, 40, 45, 1);
            --color-primary-button-hover-icon: rgba(255, 255, 255, 1);
            --color-primary-button-hover-icon-background: rgba(28, 37, 57, 1);

            /* Colors - Secondary Button */
            --color-secondary-button-text: rgba(32, 40, 45, 1);
            --color-secondary-button-background: rgba(255, 255, 255, 1);
            --color-secondary-button-border: rgba(255, 255, 255, 1);
            --color-secondary-button-icon: rgba(255, 255, 255, 1);
            --color-secondary-button-icon-background: rgba(32, 40, 45, 1);

            --color-secondary-button-hover-text: rgba(255, 255, 255, 1);
            --color-secondary-button-hover-background: rgba(32, 40, 45, 1);
            --color-secondary-button-hover-border: rgba(32, 40, 45, 1);
            --color-secondary-button-hover-icon: rgba(28, 37, 57, 1);
            --color-secondary-button-hover-icon-background: rgba(255, 255, 255, 1);

            /* Colors - Input */
            --color-input-background: rgba(255, 255, 255, 1);
            --color-input-text: rgba(93, 102, 111, 1);
            --color-input-border: rgba(93, 102, 111, 0.2);
            --color-input-hover-background: rgba(255, 255, 255, 1);
            --color-input-hover-text: rgba(93, 102, 111, 1);
            --color-input-hover-border: rgba(93, 102, 111, 0.2);

            /* Borders */
            --style-border-width-buttons-primary: 1px;
            --style-border-width-buttons-secondary: 1px;
            --style-border-radius-buttons-primary: 40px;
            --style-border-radius-buttons-secondary: 40px;

            --style-border-width-inputs: 1px;
            --style-border-radius-inputs: 8px;
            --style-border-width: 1px;

            /* Focus */
            --focus-outline-width: 1px;
            --focus-outline-offset: 3px;

            /* Pagination */
            --style-pagination-border-width: 1px;
            --pagination-item-foreground: rgba(28, 37, 57, 1);
            --pagination-item-background: rgba(242, 242, 242, 1);
            --pagination-item-border: rgba(242, 242, 242, 1);
            --pagination-item-active-foreground: rgba(255, 255, 255, 1);
            --pagination-item-active-background: rgba(28, 37, 57, 1);
            --pagination-item-active-border: rgba(28, 37, 57, 1);

            /* Swiper */
            --swiper-navigation-size: 16px;
            --swiper-navigation-color: rgba(255, 255, 255, 1);
            --swiper-navigation-background-color: transparent;
            --swiper-navigation-hover-color: rgba(255, 255, 255, 1);
            --swiper-navigation-hover-background-color: rgba(255, 255, 255, 0.15);
            --swiper-pagination-bullet-inactive-color: rgba(242, 242, 242);
            --swiper-pagination-color: rgba(28, 37, 57, 1);
            --swiper-pagination-bullet-inactive-opacity: 1;
        }

        @media (max-width: 767px) {
            :root {
                --font-h1--size: 48px;
                --font-h2--size: 40px;
                --font-h3--size: 28px;
                --font-h4--size: 20px;
                --font-h5--size: 18px;
            }
        }
    </style>

    <!-- all css -->
    <link rel="stylesheet" href="/frontend/assets/css/vendor.css">
    <link rel="stylesheet" href="/frontend/assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/frontend/assets/css/custom.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
      
    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ Helper::getSettings('application_name') ? Helper::getSettings('application_name') : 'Livenza Group' }}
        @endif
    </title>
</head>

<body>
    <div class="full_page_wrapper">
        @include('frontend.layouts.header')
        <div class="headeremtyspace"></div>
        @yield('content')
        @include('frontend.layouts.footer')
    </div>
    @stack('footer')
    <!-- all js -->
    <script src="/frontend/assets/js/vendor.js" defer></script>
    <script src="/frontend/assets/js/main.js" defer></script>
</body>

</html>
