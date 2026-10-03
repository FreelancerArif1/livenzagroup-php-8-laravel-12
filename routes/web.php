<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\ProductController;

use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SustainabilityController;
use App\Http\Controllers\Backend\CareerpageController;
use App\Http\Controllers\Backend\JobAppliedController;
use App\Http\Controllers\Backend\JobCircularController;


Route::get('/store-cache', function () {
    try {
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('view:cache');
        return 'Caches stored successfully.';
    } catch (\Exception $e) {
        return 'Error storing caches: ' . $e->getMessage();
    }
});
Route::get('/clear-cache', function () {
    try {
        Artisan::call('cache:clear');
        return 'Cache cleared successfully.';
    } catch (\Exception $e) {
        return 'Error clearing cache: ' . $e->getMessage();
    }
});
Route::post('login-post', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('signup', [LoginController::class, 'signup'])->name('registration.post');
Route::get('/admin', function () {
    return view('backend.auth.login');
})->name('admin');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('profile', [LoginController::class, 'adminProfile'])->name('admin.profile');
    Route::post('profile/update', [LoginController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    Route::get('profile/setting', [LoginController::class, 'adminProfileSetting'])->name('admin.profile.setting');
    Route::post('profile/change/password', [LoginController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('dashboard-information/{testament}', [DashboardController::class, 'information'])->name('admin.information');
    Route::group(['prefix' => '/user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::get('/get/list', [UserController::class, 'getList']);
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::any('/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::post('/change', [UserController::class, 'changePassword'])->name('admin.user.changepassword');
        Route::post('/change-privilege', [UserController::class, 'changePrivilegePassword'])->name('admin.privilege.user.password');
        Route::post('/admin/user/update-status', [UserController::class, 'updateStatus'])->name('user.updateStatus');
    });
    Route::group(['prefix' => '/role'], function () {
        Route::get('/generate/right/{mdule_name}', [RoleController::class, 'generate'])->name('admin.role.right.generate');
        Route::get('/', [RoleController::class, 'index'])->name('admin.role');
        Route::get('/get/role/list', [RoleController::class, 'getRoleList']);
        Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create');
        Route::post('/store', [RoleController::class, 'store'])->name('admin.role.store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
        Route::any('/update/{id}', [RoleController::class, 'update'])->name('admin.role.update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('admin.role.delete');
        Route::get('/right', [RoleController::class, 'right'])->name('admin.role.right');
        Route::get('/get/right/list', [RoleController::class, 'getRightList']);
        Route::post('/right/store', [RoleController::class, 'rightStore'])->name('admin.role.right.store');
        Route::get('/right/edit/{id}', [RoleController::class, 'editRight'])->name('admin.role.right.edit');
        Route::any('/right/update/{id}', [RoleController::class, 'roleRightUpdate'])->name('admin.role.right.update');
        Route::get('/right/delete/{id}', [RoleController::class, 'rightDelete'])->name('admin.role.right.delete');
    });


    Route::group(['prefix' => '/contact'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('admin.contact');
        Route::get('/get/list', [ContactController::class, 'getList']);
        Route::post('/store', [ContactController::class, 'store'])->name('admin.contact.store');
        Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('admin.contact.edit');
        Route::any('/update/{id}', [ContactController::class, 'update'])->name('admin.contact.update');
        Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('admin.contact.delete');
    });
    Route::group(['prefix' => '/setting'], function () {
        Route::get('/general', [SettingController::class, 'general'])->name('admin.setting.general');
        Route::get('/static-content', [SettingController::class, 'staticContent'])->name('admin.setting.static.content');
        Route::get('/journey-unity-content', [SettingController::class, 'journeyUnityContent'])->name('admin.setting.journey.unity.content');
        Route::get('/legal-content', [SettingController::class, 'legalContent'])->name('admin.setting.legal.content');
        Route::post('/update', [SettingController::class, 'update'])->name('admin.setting.update');
        Route::get('/change-language', [SettingController::class, 'changeLanguage'])->name('admin.setting.change.language');
    });
    Route::resource('slider', SliderController::class);
    Route::get('/slider-list', [SliderController::class, 'list'])->name('admin.slider.list');

    Route::resource('product', ProductController::class);
    Route::get('/product-list', [ProductController::class, 'list'])->name('admin.product.list');
    

    Route::resource('company', CompanyController::class);
    Route::get('/company-list', [CompanyController::class, 'list'])->name('admin.company.list');
    
    Route::resource('portfolio', PortfolioController::class);
    Route::get('/portfolio-list', [PortfolioController::class, 'list'])->name('admin.portfolio.list');

    Route::resource('project', ProjectController::class);
    Route::get('/project-list', [ProjectController::class, 'list'])->name('admin.project.list');
    Route::resource('about', AboutController::class);
    Route::get('/about-list', [AboutController::class, 'list'])->name('admin.about.list');

    Route::resource('partner', PartnerController::class);
    Route::get('/partner-list', [PartnerController::class, 'list'])->name('admin.partner.list');
    Route::resource('blog', BlogController::class);
    Route::get('/blog-list', [BlogController::class, 'list'])->name('admin.blog.list');
    Route::post('/empty-a-table-column',  [SustainabilityController::class, 'emptyATableColumn']);
    Route::resource('sustainability', SustainabilityController::class);
    Route::get('/sustainability-list', [SustainabilityController::class, 'list'])->name('admin.sustainability.list');
    Route::resource('careerpage', CareerpageController::class);
    Route::get('/careerpage-list', [CareerpageController::class, 'list'])->name('admin.careerpage.list');
    Route::resource('careerapply', JobAppliedController::class);
    Route::get('/careerapply-list', [JobAppliedController::class, 'list'])->name('admin.careerapply.list');

    Route::resource('circular', JobCircularController::class);
    Route::get('/circular-list', [JobCircularController::class, 'list'])->name('admin.circular.list');
});
Route::get('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

//public routes
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact-submit', [FrontendController::class, 'contactsubmit'])->name('contact.submit');
Route::get('/company/{slug}', [FrontendController::class, 'singleCompany'])->name('single.company');
Route::get('/product/{slug}', [FrontendController::class, 'singleProduct'])->name('single.product');
Route::get('/news', [FrontendController::class, 'news'])->name('news');
Route::get('/news/{slug}', [FrontendController::class, 'singleNews'])->name('single.news');
Route::get('/sustainability', [FrontendController::class, 'sustainability'])->name('sustainability');
Route::get('/companies', [FrontendController::class, 'companies'])->name('companies');
Route::get('/careers', [FrontendController::class, 'careers'])->name('careers');
Route::get('/careers/{slug}', [FrontendController::class, 'careerSingle'])->name('career.single');
Route::post('/career-submit', [FrontendController::class, 'careerSubmit'])->name('career.submit');
