    <sticky-header data-sticky-type="always">
        <header class="header-1 header-floating">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-4">
                        <div class="header-actions d-flex align-items-center">
                            <drawer-opener class="collapsicon svg-wrapper menu-open d-lg-none-has collapsmenu" data-drawer=".drawer-menu">
                                <div class="collapsicon2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                                    </svg>
                                </div>
                            </drawer-opener>

                            <drawer-opener class="closeicon svg-wrapper menu-open d-lg-none-has collapsmenu" data-drawer=".drawer-menu">
                                <div class="closeicon2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                    </svg>
                                </div>
                            </drawer-opener>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4">
                        <a class="menu-link menu-link-main logo_link" href="/">
                            <img src="{{ Helper::getSettings('site_logo') ? asset(Helper::getSettings('site_logo')) : '/logo.png' }}"
                                alt="logo-image">
                        </a>
                    </div>
                    <div class="col-md-4">
                        
                    </div>




                </div>

                <div class="row">
                    <div class="header-grid-2">
                            <drawer-menu>
                                <nav class="header-nav drawer-menu">
                                   

                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <ul class="header-menu list-unstyled leftside_navbs">
                                                <li class="nav-item">
                                                    <a class="menu-link menu-link-main menu-accrodion" href="/">
                                                        Building a river of growth
                                                    </a>
                                                </li>
                                            </ul> --}}
                                            <ul class="header-menu list-unstyled leftside_navbs">
                                           
                                                <li class="nav-item">
                                                    <a class="menu-link menu-link-main" href="/"> Home </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="menu-link menu-link-main menu-accrodion" href="/about-us"> About
                                                        Us
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="menu-link menu-link-main" href="/companies"> Companies </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="menu-link menu-link-main menu-accrodion" href="/careers">
                                                        Careers
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="menu-link menu-link-main" href="/news"> News </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="menu-link menu-link-main menu-accrodion" href="/sustainability">
                                                        Sustainability
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="menu-link menu-link-main" href="/contact-us">Contact</a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </nav>
                            </drawer-menu>
                            <!-- icon here -->
                        </div>
                </div>
            </div>
        </header>
    </sticky-header>
<script>
    $(document).ready(function () {

    // Initially hide the close icon
    $('.closeicon').hide();

    // Click on menu (collapse) icon
    $('.collapsicon').on('click', function () {
        $(this).hide();
        $('.closeicon').show();

        console.log('clickin..');
        
    });

    // Click on close icon
    $('.closeicon').on('click', function () {
        $(this).hide();
        $('.collapsicon').show();
    });

    // $('.closeicon2 svg').width('25');
    // $('.collapsicon2 svg').width('25');

});
</script>
