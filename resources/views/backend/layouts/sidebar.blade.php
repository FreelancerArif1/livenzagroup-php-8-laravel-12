<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="" class="logo">
                <img style="width: 60px;height: 60px;border-radius: 50%;background: #fff;"
                    src="{{ Helper::getSettings('site_logo') ? asset(Helper::getSettings('site_logo')) : 'assets/img/Logo.png' }}"
                    alt="navbar brand " class="navbar-brand logo-boundary">
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                @if (Helper::hasRight('dashboard.view'))
                    <li class="nav-item {{ Route::is('admin.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <p class="ms-4"><span class="sub-item">{{ trans('Dashboard') }}</span></p>
                        </a>
                    </li>
                @endif
                @if (Helper::hasRight('setting.view'))
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#users"
                            aria-expanded="@if (Route::is('admin.setting.general') ||
                                    Route::is('admin.setting.static.content') ||
                                    Route::is('admin.setting.legal.content') ||
                                    Route::is('admin.contact') ||
                                    Route::is('admin.resource')) true @else false @endif">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <p class="ms-4">{{ trans('Settings') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse @if (Route::is('admin.setting.general') ||
                                Route::is('admin.setting.static.content') ||
                                Route::is('admin.setting.legal.content') ||
                                Route::is('admin.contact') ||
                                Route::is('admin.resource')) show @endif" id="users">
                            <ul class="nav nav-collapse">
                                @if (Helper::hasRight('setting.general'))
                                    <li class="{{ Route::is('admin.setting.general') ? 'active' : '' }}">
                                        <a href="{{ route('admin.setting.general') }}">
                                            <span class="sub-item">{{ trans('General Setting') }}</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Helper::hasRight('setting.static-content'))
                                    <li class="{{ Route::is('admin.setting.static.content') ? 'active' : '' }}">
                                        <a href="{{ route('admin.setting.static.content') }}">
                                            <span class="sub-item">{{ trans('Static Content') }}</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Helper::hasRight('setting.legal-content'))
                                    <li class="{{ Route::is('admin.setting.legal.content') ? 'active' : '' }}">
                                        <a href="{{ route('admin.setting.legal.content') }}">
                                            <span class="sub-item">{{ trans('Legal Content') }}</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Helper::hasRight('contact.view'))
                                    <li class="{{ Route::is('admin.contact') ? 'active' : '' }}">
                                        <a href="{{ route('admin.contact') }}">
                                            <span class="sub-item">{{ trans('Contact Management') }}</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Helper::hasRight('setting.view'))
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#roleview"
                            aria-expanded="@if (Route::is('admin.role') ||
                                    Route::is('admin.role.create') ||
                                    Route::is('admin.role.edit') ||
                                    Route::is('admin.role.right') ||
                                    Route::is('admin.user')) true @else false @endif">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <p class="ms-4">{{ trans('Administration') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse @if (Route::is('admin.role') ||
                                Route::is('admin.role.create') ||
                                Route::is('admin.role.edit') ||
                                Route::is('admin.role.right') ||
                                Route::is('admin.user')) show @endif" id="roleview">
                            <ul class="nav nav-collapse">
                                @if (Helper::hasRight('role.view'))
                                    <li class="{{ Route::is('admin.role') ? 'active' : '' }}">
                                        <a href="{{ route('admin.role') }}">
                                            <span class="sub-item">{{ trans('Role Management') }}</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Helper::hasRight('right.view'))
                                    <li class="{{ Route::is('admin.role.right') ? 'active' : '' }}">
                                        <a href="{{ route('admin.role.right') }}">
                                            <span class="sub-item">{{ trans('Right Management') }}</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Helper::hasRight('user.view'))
                                    <li class="{{ Route::is('admin.user') ? 'active' : '' }}">
                                        <a href="{{ route('admin.user') }}">
                                            <span class="sub-item">{{ trans('User Management') }}</span>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif


                @if (Helper::hasRight('setting.view'))
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#Companies"
                            aria-expanded="@if (Route::is('slider.index')) true @else false @endif">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <p class="ms-4">{{ trans('Companies') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse @if (Route::is('slider.index')) show @endif" id="Companies">
                            <ul class="nav nav-collapse">
                                @if (Helper::hasRight('role.view'))
                                    <li class="{{ Route::is('slider.index') ? 'active' : '' }}">
                                        <a href="{{ route('slider.index') }}">
                                            <span class="sub-item">{{ trans('Sliders') }}</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Helper::hasRight('right.view'))
                                    <li class="{{ Route::is('portfolio.index') ? 'active' : '' }}">
                                        <a href="{{ route('portfolio.index') }}">
                                            <span class="sub-item">{{ trans('Portfolios') }}</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Helper::hasRight('right.view'))
                                    <li class="{{ Route::is('project.index') ? 'active' : '' }}">
                                        <a href="{{ route('project.index') }}">
                                            <span class="sub-item">{{ trans('Projects') }}</span>
                                        </a>
                                    </li>
                                @endif
                                @if (Helper::hasRight('user.view'))
                                    <li class="{{ Route::is('company.index') ? 'active' : '' }}">
                                        <a href="{{ route('company.index') }}">
                                            <span class="sub-item">{{ trans('Company list') }}</span>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif


                @if (Helper::hasRight('product.view'))
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#product"
                            aria-expanded="@if (Route::is('product.index')) true @else false @endif">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <p class="ms-4">{{ trans('Product') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse @if (Route::is('product.index') || Route::is('servicecategory.index')) show @endif" id="product">
                            <ul class="nav nav-collapse">
                                @if (Helper::hasRight('product.view'))
                                    <li class="{{ Route::is('product.index') ? 'active' : '' }}">
                                        <a href="{{ route('product.index') }}">
                                            <span class="sub-item">{{ trans('Product List') }}</span>
                                        </a>
                                    </li>
                                @endif

                                @if (Helper::hasRight('brand.view'))
                                    <li class="{{ Route::is('servicecategory.index') ? 'active' : '' }}">
                                        <a href="{{ route('servicecategory.index') }}">
                                            <span class="sub-item">{{ trans('Brand') }}</span>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif


                

                @if (Helper::hasRight('setting.view'))
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#aboutus"
                            aria-expanded="@if (Route::is('slider.index')) true @else false @endif">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <p class="ms-4">{{ trans('About Us') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse @if (Route::is('about.index') || Route::is('partner.index')) show @endif" id="aboutus">
                            <ul class="nav nav-collapse">
                                @if (Helper::hasRight('role.view'))
                                    <li class="{{ Route::is('about.index') ? 'active' : '' }}">
                                        <a href="{{ route('about.index') }}">
                                            <span class="sub-item">{{ trans('About Us') }}</span>
                                        </a>
                                    </li>
                                @endif

                                @if (Helper::hasRight('user.view'))
                                    <li class="{{ Route::is('partner.index') ? 'active' : '' }}">
                                        <a href="{{ route('partner.index') }}">
                                            <span class="sub-item">{{ trans('Partners') }}</span>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif


                @if (Helper::hasRight('dashboard.view'))
                    <li class="nav-item {{ Route::is('blog.index') ? 'active' : '' }}">
                        <a href="{{ route('blog.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <p class="ms-4"><span class="sub-item">{{ trans('Blogs') }}</span></p>
                        </a>
                    </li>
                @endif
                @if (Helper::hasRight('dashboard.view'))
                    <li class="nav-item {{ Route::is('sustainability.index') ? 'active' : '' }}">
                        <a href="{{ route('sustainability.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <p class="ms-4"><span class="sub-item">{{ trans('Sustainability') }}</span></p>
                        </a>
                    </li>
                @endif


                @if (Helper::hasRight('setting.view'))
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#career"
                            aria-expanded="@if (Route::is('slider.index')) true @else false @endif">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <p class="ms-4">{{ trans('Career') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse @if (Route::is('careerpage.index') || Route::is('careerpage.index')) show @endif" id="career">
                            <ul class="nav nav-collapse">
                                @if (Helper::hasRight('role.view'))
                                    <li class="{{ Route::is('careerpage.index') ? 'active' : '' }}">
                                        <a href="{{ route('careerpage.index') }}">
                                            <span class="sub-item">{{ trans('Career Page') }}</span>
                                        </a>
                                    </li>
                                @endif

                                {{-- @if (Helper::hasRight('user.view'))
                                    <li class="{{ Route::is('partner.index') ? 'active' : '' }}">
                                        <a href="{{ route('partner.index') }}">
                                            <span class="sub-item">{{ trans('Partners') }}</span>
                                        </a>
                                    </li>
                                @endif --}}

                            </ul>
                        </div>
                    </li>
                @endif


                @if (Helper::hasRight('dashboard.view'))
                    <li class="nav-item {{ Route::is('careerapply.index') ? 'active' : '' }}">
                        <a href="{{ route('careerapply.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <p class="ms-4"><span class="sub-item">{{ trans('Job Application') }}</span></p>
                        </a>
                    </li>
                @endif
                @if (Helper::hasRight('dashboard.view'))
                    <li class="nav-item {{ Route::is('circular.index') ? 'active' : '' }}">
                        <a href="{{ route('circular.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <p class="ms-4"><span class="sub-item">{{ trans('Job Circulars') }}</span></p>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
