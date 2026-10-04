@extends('frontend.layouts.app')
@section('title', 'Company | ' . Helper::getSettings('application_name') ?? 'Livenza Group')
@section('content')
    <main id="companysingle_page">
       @php
    // Normalize $images input (works whether $images is a JSON string, PHP array, or Eloquent collection)
    if (is_string($images)) {
        $imageList = json_decode($images, true) ?? [];
    } elseif (is_iterable($images)) {
        $imageList = is_array($images) ? $images : $images->toArray();
    } else {
        $imageList = [];
    }

    $totalImages = count($imageList);
    $displayImages = array_slice($imageList, 0, 5); // Display top 5 in layout
    $remainingCount = $totalImages - 5;
@endphp


<section id="single_product_image_gallery">
    <div class="container">
        @if ($totalImages > 0)
            <!-- Dynamic Image Gallery Grid -->
            <div class="gallery-grid">
                {{-- Main Large Feature Image --}}
                <div class="gallery-item item-main">
                    <img src="{{ asset($imageList[0]) }}" alt="Gallery Image 1" onclick="openLightbox(0)" class="gallery-img">
                </div>

                {{-- Right Grid (up to 4 thumbnails) --}}
                @foreach (array_slice($imageList, 1, 4) as $index => $img)
                    @php $actualIndex = $index + 1; @endphp
                    <div class="gallery-item item-sub">
                        <img src="{{ asset($img) }}" alt="Gallery Image {{ $actualIndex + 1 }}" onclick="openLightbox({{ $actualIndex }})" class="gallery-img">
                        
                        {{-- Overlay "+ More" on 5th slot if extra images exist --}}
                        @if ($actualIndex === 4 && $remainingCount > 0)
                            <div class="more-overlay" onclick="openLightbox(4)">
                                <span>+{{ $remainingCount }} More</span>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div ></div>
        @endif
    </div>
</section>


<!-- Lightbox Modal Slider -->
<div class="modal fade" id="imageLightboxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-dark border-0">
            <!-- Close Button Top Right -->
            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3" data-bs-dismiss="modal" aria-label="Close"></button>
            
            <div class="modal-body p-0 position-relative">
                <div id="lightboxCarousel" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">
                        @foreach ($imageList as $index => $img)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" id="lightbox-slide-{{ $index }}">
                                <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh; max-height: 85vh;">
                                    <img src="{{ asset($img) }}" class="img-fluid rounded" style="max-height: 80vh; object-fit: contain;" alt="Slide {{ $index + 1 }}">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if ($totalImages > 1)
                        <!-- Previous / Next Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon p-3 bg-black bg-opacity-50 rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon p-3 bg-black bg-opacity-50 rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<section id="product_description">
    <div class="product-details-section py-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0 text-dark product_page_title">{{ $product->title ?? '' }}</h4>
                <!-- <button class="btn btn-outline-dark border-secondary-subtle rounded-3 px-3 py-2 d-flex align-items-center gap-2 share-btn">
                    <i class="bi bi-share"></i> Share
                </button> -->
            </div>

            <div class="row g-4">
                <!-- Left Side: Vehicle Specifications Grid -->
                <div class="col-lg-8">
                    <div class="specs-card p-4 pmd5 rounded-4 h-100">
                        <div class="row g-4">
                            
                            <div class="col-6 col-sm-3">
                                <span class="spec-label">Brand</span>
                                <h6 class="spec-value">{{ $brand->title ?? '' }}</h6>
                            </div>

                            <div class="col-6 col-sm-3">
                                <span class="spec-label">Model</span>
                                <h6 class="spec-value">{{ $product->model ?? '' }}</h6>
                            </div>

                            <div class="col-6 col-sm-3">
                                <span class="spec-label">Reg. Year</span>
                                <h6 class="spec-value">{{ $product->reg_year ?? '-' }}</h6>
                            </div>

                            <div class="col-6 col-sm-3">
                                <span class="spec-label">Mileage</span>
                                <h6 class="spec-value">{{ $product->mileage ?? '-' }}</h6>
                            </div>

                            <div class="col-6 col-sm-3">
                                <span class="spec-label">Engine (CC)</span>
                                <h6 class="spec-value">{{ $product->engine ?? '' }}</h6>
                            </div>

                            <div class="col-6 col-sm-3">
                                <span class="spec-label">Transmission</span>
                                <h6 class="spec-value text-uppercase">{{ $product->transmission ?? '' }}</h6>
                            </div>

                            <div class="col-6 col-sm-3">
                                <span class="spec-label">Fuel Type</span>
                                <h6 class="spec-value text-uppercase">{{ $product->fuel_type ?? '' }}</h6>
                            </div>

                            <div class="col-6 col-sm-3">
                                <span class="spec-label">Drive Type</span>
                                <h6 class="spec-value text-uppercase">{{ $product->drive_type ?? '' }}</h6>
                            </div>

                            <div class="col-6 col-sm-3">
                                <span class="spec-label">Wheel</span>
                                <h6 class="spec-value">{{ $product->wheel ?? '' }}</h6>
                            </div>

                            <div class="col-6 col-sm-3">
                                <span class="spec-label">Exterior</span>
                                <h6 class="spec-value">{{ $product->exterior ?? '' }}</h6>
                            </div>

                            <div class="col-6 col-sm-3">
                                <span class="spec-label">Body Style</span>
                                <h6 class="spec-value">{{ $product->body_style ?? '' }}</h6>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Right Side: Pricing & CTA Box -->
                <div class="col-lg-4">
                    <div class="pricing-card p-4 rounded-4 border">
                        <h4 class="price-title fw-bold text-dark mb-2">
                            BDT {{ number_format((float) ($product->price ?? '')) }}
                        </h4>

                        <h6 class="fw-semibold text-dark mb-2">Need help making a choice?</h6>
                        <p class="text-secondary small mb-4">
                            Our expert sales team is here to assist you to choose your vehicle according to your necessity, choice & preference.
                        </p>

                        <div class="d-grid gap-3">
                            <a href="tel:+88009639272106" class="btn btn-peach fw-bold py-2-5 rounded-3 callusbtn">Call Us</a>
                            <!-- <a href="https://wa.me/880123456789" class="btn btn-yellow fw-bold py-2-5 rounded-3">Text Us on WhatsApp</a> -->
                            <a href="/contact-us" class="btn btn-peach fw-bold py-2-5 rounded-3">Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="product-details-section py-4 bg-white text-dark">
    <div class="container">
        <!-- Description Section -->
        <div class="description-section mt-5">
            <h4 class="fw-bold mb-0 text-dark product_page_title">Description</h4>
            <div class="text-secondary leading-relaxed fs-6">
                {!! $product->description ?? "" !!}
            </div>
        </div>
    </div>
</div>


<section class="py-5 text-white" id="suggestion_products">
    <div class="container">
        <h2 class="fw-bold mb-4 fs-3 text-white">Suggested for you</h2>

        <!-- Swiper Container -->
        <div class="swiper suggestedSwiper">
            <div class="swiper-wrapper pb-4">
                @if(isset($brand_wise_products) && count($brand_wise_products) > 0)
                    @foreach($brand_wise_products as $item)
                        <div class="swiper-slide">
                            <a href="{{ route('single.product', $item->slug ?? '#') }}" class="text-decoration-none">
                                <div class="card bg-transparent border-0 h-100">
                                    <div class="ratio ratio-4x3 overflow-hidden rounded-3 bg-dark">
                                        <img src="{{ $item->image }}" class="card-img-top object-fit-cover hover-zoom" alt="{{ $item->title }}">
                                    </div>
                                    <div class="card-body px-0 py-2">
                                        <h6 class="card-title text-white fw-semibold mb-0 fs-6">{{ $item->title }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                <div ></div>
                @endif
            </div>

            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>


<!-- JavaScript to Trigger Lightbox Slide -->
<script>
    function openLightbox(slideIndex) {
        const modalElement = document.getElementById('imageLightboxModal');
        const carouselElement = document.getElementById('lightboxCarousel');
        
        if (!modalElement || !carouselElement) return;

        // Use Bootstrap Carousel API to jump directly to clicked image index
        const carousel = bootstrap.Carousel.getOrCreateInstance(carouselElement);
        carousel.to(slideIndex);

        // Show Bootstrap Modal
        const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
        modal.show();
    }
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".suggestedSwiper", {
            slidesPerView: 1.2,
            spaceBetween: 16,
            grabCursor: true,
            
            // Autoplay Configuration with Pause on Hover
            autoplay: {
                delay: 3000,                  // 3 seconds per slide
                disableOnInteraction: false,   // Keeps autoplay working after user swipes
                pauseOnMouseEnter: true       // Pauses slider when user hovers mouse over it
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            breakpoints: {
                576: { slidesPerView: 2.1, spaceBetween: 16 },
                768: { slidesPerView: 3.1, spaceBetween: 20 },
                1024: { slidesPerView: 4, spaceBetween: 24 }
            }
        });
    });
</script>


    </main>
@endsection
