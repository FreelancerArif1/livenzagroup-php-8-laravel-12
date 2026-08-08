@extends('frontend.layouts.app')
@section('title', 'Contact | ' . Helper::getSettings('application_name') ?? 'Livenza Group')
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
                                    Contact us
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


        <!-- Contact Form -->
        <div class="section-contact-form section-padding">
            <div class="container">
                <div class="contact-box radius18">
                    <div class="row product-grid justify-content-between">
                        <div class="col-12 col-lg-6 col-contact-content contact_page contact_page_image">
                            <div class="section-headings">
                                <h4 class="heading text-20" data-aos="fade-up">
                                    Contact Us
                                </h4>
                                <p class="text text-18" data-aos="fade-up">
                                    Feel free to contact us. Livenza Group is a collective entity of sustainability-driven
                                    companies united under one ecosystem, dedicated to helping grow responsibly across
                                    multiple sectors.
                                </p>

                                <div class="card-icon-text card-icon-text-horizontal">
                                    <div class="svg-wrapper" data-aos="fade-up">
                                        <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="80" height="80" rx="10" fill="#20282D" />
                                            <path
                                                d="M26.5 32.5C26.5 44.9264 36.5736 55 49 55C51.5 55 53.2 53.8 54.3 51.8L56.5 47.8C57.1 46.7 56.8 45.3 55.8 44.6L50.5 40.8C49.5 40.1 48.1 40.3 47.3 41.2L45.5 43.3C41.8 41.4 38.6 38.2 36.7 34.5L38.8 32.7C39.7 31.9 39.9 30.5 39.2 29.5L35.4 24.2C34.7 23.2 33.3 22.9 32.2 23.5L28.2 25.7C26.2 26.8 25 28.5 25 31C25 31.5 26.5 32.5 26.5 32.5Z"
                                                stroke="white"
                                                stroke-width="3.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>

                                    </div>
                                    <div class="content">
                                        <h5 class="heading text-16 fw-600 m-0" data-aos="fade-up">
                                            Phone
                                        </h5>
                                        <p class="text text-14 m-0" data-aos="fade-up">
                                            09639272106
                                            <!-- , <br>   +880 1521 747410 -->
                                        </p>
                                    </div>
                                </div>
                                <div class="card-icon-text card-icon-text-horizontal">
                                    <div class="svg-wrapper" data-aos="fade-up">
                                        <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="80" height="80" rx="10" fill="#20282D" />
                                            <rect x="20" y="26" width="40" height="28" rx="4" stroke="white" stroke-width="3.5" />
                                            <path
                                                d="M22 28L38.2361 39.8182C39.293 40.5868 40.707 40.5868 41.7639 39.8182L58 28"
                                                stroke="white"
                                                stroke-width="3.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <h2 class="heading text-16 fw-600 m-0" data-aos="fade-up">
                                            Email
                                        </h2>
                                        <p class="text text-14 m-0" data-aos="fade-up">
                                            info@livenzagroup.com
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="section-headings mt-5">
                                <h4 class="heading text-20" data-aos="fade-up">
                                    Addresses
                                </h4>
                                <hr>

                                <div class="card-icon-text card-icon-text-horizontal">
                                    <div class="svg-wrapper" data-aos="fade-up">
                                        <img src="/frontend/assets/img/bd.png" alt="">
                                    </div>
                                    <div class="content">
                                        <h5 class="heading text-16 fw-600 m-0" data-aos="fade-up">
                                            Bangladesh
                                        </h5>
                                        <p class="text text-14 m-0" data-aos="fade-up">
                                            Plot 24 & 26 (Canyon Tower)
                                            Sonargaon Janapath, Sector # 12, Uttara,
                                            Dhaka-1230, Bangladesh
                                        </p>
                                    </div>
                                </div>
                                <div class="card-icon-text card-icon-text-horizontal">
                                    <div class="svg-wrapper" data-aos="fade-up">
                                        <img src="/frontend/assets/img/hongkong.png" alt="">
                                    </div>
                                    <div class="content">
                                        <h5 class="heading text-16 fw-600 m-0" data-aos="fade-up">
                                            Hongkong
                                        </h5>
                                        <p class="text text-14 m-0" data-aos="fade-up">
                                            RM 509, 5/F the cloud 111 Tung Chau ST Tai Kok Tsui Hong Kong
                                        </p>
                                    </div>
                                </div>
                                <div class="card-icon-text card-icon-text-horizontal">
                                    <div class="svg-wrapper" data-aos="fade-up">
                                        <img src="/frontend/assets/img/canada.png" alt="">
                                    </div>
                                    <div class="content">
                                        <h5 class="heading text-16 fw-600 m-0" data-aos="fade-up">
                                            Canada
                                        </h5>
                                        <p class="text text-14 m-0" data-aos="fade-up">
                                            1467 West 57th Avenue, Vancouver, British Columbia, V6P 1T1, Canada
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-contact-form">
                            <div class="contact-form-wrap radius18">
                                <div class="contact-form-headings">
                                    <h2 class="heading text-32" data-aos="fade-up">
                                        Make an Appointment
                                    </h2>
                                    <p class="text text-16" data-aos="fade-up">
                                        Feel free to contact with us, we don't spam your email
                                    </p>
                                </div>
                                <form action="{{ route('contact.submit') }}" method="POST" class="form contact-form"
                                    data-aos="fade-up">
                                    @csrf
                                    <div class="field">
                                        <label for="ContactForm-name" class="visually-hidden">
                                            Your Name
                                        </label>
                                        <input id="ContactForm-name" class="text-16" type="text"
                                            placeholder="Your Name *" name="name" required>
                                    </div>
                                    <div class="field">
                                        <label for="ContactForm-name" class="visually-hidden">
                                            Phone
                                        </label>
                                        <input id="ContactForm-name" class="text-16" type="text"
                                            placeholder="Your phone *" name="phone" required>
                                    </div>
                                    <div class="field">
                                        <label for="ContactForm-email" class="visually-hidden">
                                            Email Here
                                        </label>
                                        <input id="ContactForm-email" class="text-16" type="text"
                                            placeholder="Email Here *" name="email" required>
                                    </div>
                                    <div class="field">
                                        <label for="ContactForm-service" class="visually-hidden">
                                            Subject
                                        </label>
                                        <input id="ContactForm-service" class="text-16" type="text"
                                            placeholder="subject" name="subject" required>
                                    </div>
                                    <div class="field">
                                        <label for="ContactForm-body" class="visually-hidden">
                                            Your Comment
                                        </label>
                                        <textarea id="ContactForm-body" class="text-16" rows="4" placeholder="Your Comment *" name="message"
                                            required></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            @if (Session::has('success'))
                                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                            @endif

                                            @if (Session::has('error'))
                                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                            @endif

                                        </div>
                                    </div>


                                    <div class="form-button">
                                        <button type="submit" class="button button--secondary"
                                            aria-label="Send Message">
                                            Send Message
                                            <span class="svg-wrapper">
                                                <svg class="icon-20" width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.3365 7.84518L6.16435 15.0173L4.98584 13.8388L12.158 6.66667H5.83652V5H15.0032V14.1667H13.3365V7.84518Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section id="mapsection" class="section-padding"
            style="background-image: url(/frontend/assets/img/footer/footer-bg-large.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116749.79314502819!2d90.23745534335937!3d23.8743295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5003422f655%3A0xde3d4394732dca14!2sCANYON%20TOWER!5e0!3m2!1sen!2sbd!4v1764529453388!5m2!1sen!2sbd"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
