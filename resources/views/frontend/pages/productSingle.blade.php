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
            <div class="alert alert-secondary text-center">No images available.</div>
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






<div class="product-details-section py-4 bg-white text-dark">
    <div class="container">
        
        <!-- Header & Share Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0 text-dark product_page_title">{{ $product->title ?? '' }}</h4>
            <!-- <button class="btn btn-outline-dark border-secondary-subtle rounded-3 px-3 py-2 d-flex align-items-center gap-2 share-btn">
                <i class="bi bi-share"></i> Share
            </button> -->
        </div>

        <div class="row g-4">
            <!-- Left Side: Vehicle Specifications Grid -->
            <div class="col-lg-8">
                <div class="specs-card p-4 p-md-5 rounded-4 h-100">
                    <div class="row g-4">
                        
                        <div class="col-6 col-sm-3">
                            <span class="spec-label">Brand</span>
                            <h6 class="spec-value">{{ $product->brand ?? '' }}</h6>
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
                        <a href="tel:+88009639272106" class="btn btn-peach fw-bold py-2-5 rounded-3">Call Us</a>
                        <!-- <a href="https://wa.me/880123456789" class="btn btn-yellow fw-bold py-2-5 rounded-3">Text Us on WhatsApp</a> -->
                        <button type="button" class="btn btn-peach fw-bold py-2-5 rounded-3" data-bs-toggle="modal" data-bs-target="#quoteModal">Get a Quote</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description Section -->
        <div class="description-section mt-5">
            <h4 class="fw-bold mb-0 text-dark product_page_title">Description</h4>
            <div class="text-secondary leading-relaxed fs-6">
                {!! $product->description ?? "" !!}
            </div>
        </div>

    </div>
</div>


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

    </main>
@endsection
