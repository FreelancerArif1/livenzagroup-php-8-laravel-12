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
        <div class="asymmetric-grid" id="projectGrid" data-total="{{ count($companies) }}">
            @if ($companies)
                @foreach ($companies as $company)
                    <div class="single_company_box" data-aos="fade-up">
                        <a class="card-project" href="{{ route('single.company', $company->slug) }}">
                            <img src="{{ $company->image }}" alt="project image" loading="lazy">
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
</div>




<script>
    document.addEventListener("DOMContentLoaded", function () {
    const grid = document.getElementById("projectGrid");
    if (!grid) return;

    const count = parseInt(grid.getAttribute("data-total")) || 0;
    const items = grid.querySelectorAll(".single_company_box");

    // Apply specific grid templates depending on item count
    if (count === 5) {
        grid.style.gridTemplateColumns = "repeat(6, 1fr)";
        grid.style.gridTemplateRows = "repeat(6, 1fr)";
        
        if (items[0]) items[0].style.gridArea = "1 / 1 / 5 / 4";
        if (items[1]) items[1].style.gridArea = "1 / 4 / 4 / 7";
        if (items[2]) items[2].style.gridArea = "5 / 1 / 7 / 3";
        if (items[3]) items[3].style.gridArea = "5 / 3 / 7 / 5";
        if (items[4]) items[4].style.gridArea = "4 / 5 / 7 / 7";
    } else if (count === 6) {
        grid.style.gridTemplateColumns = "repeat(6, 1fr)";
        grid.style.gridTemplateRows = "repeat(6, 1fr)";
        
        if (items[0]) items[0].style.gridArea = "1 / 1 / 4 / 4";
        if (items[1]) items[1].style.gridArea = "1 / 4 / 4 / 7";
        if (items[2]) items[2].style.gridArea = "4 / 1 / 7 / 3";
        if (items[3]) items[3].style.gridArea = "4 / 3 / 7 / 5";
        if (items[4]) items[4].style.gridArea = "4 / 5 / 6 / 7";
        if (items[5]) items[5].style.gridArea = "6 / 5 / 7 / 7";
    }
});
</script>







    </main>
@endsection
