<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\BackSliderController;
use App\Http\Controllers\BackUserController;
use App\Http\Controllers\ContactSettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FloorPlanController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryImagesController;
use App\Http\Controllers\GalleryVideosController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HandoverProjectsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogHistoryController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenulistController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\PagecategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectImageController;
use App\Http\Controllers\ProjectVideoController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\VGalleryController;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/ready', [HomeController::class, 'ReadyList'])->name('ready.index');
Route::get('/on-going', [HomeController::class, 'OngoingList'])->name('ongoing.index');
Route::get('/up-coming', [HomeController::class, 'UpCommingList'])->name('upcomming.index');

Route::get('/handover-projects', [HomeController::class, 'HandOverProjects'])->name('hprojects');

Route::get('/contact-us', [HomeController::class, 'ContactUs'])->name('contactus.index');
Route::post('/contact-us', [HomeController::class, 'ContactUsPost'])->name('contactus.store');

Route::get('/gallery/photo', [HomeController::class, 'PhotoGallery'])->name('gallery.photo.index');
Route::get('/interior/photo', [HomeController::class, 'interiorGallery'])->name('interior.photo.index');
Route::get('/gallery/video', [HomeController::class, 'VideoGallery'])->name('gallery.video.index');
Route::get('/gallery/client', [HomeController::class, 'ClientGallery'])->name('gallery.client.index');

Route::get('/projects', [HomeController::class, 'AllProjects'])->name('projects');
Route::get('/project/{id}', [HomeController::class, 'ProjectDetails'])->name('project.details');

Route::get('/about-us', [HomeController::class, 'AboutUs'])->name('aboutus.index');
Route::get('/land-wanted', [HomeController::class, 'LandWanted'])->name('land.wanted');
Route::get('/disclaimer', [HomeController::class, 'disclaimerPage'])->name('disclaimer.index');

Route::get('/send-whatsapp', [WhatsAppController::class, 'sendWhatsAppMessage']);

Auth::routes();

// admin auth routes

Route::namespace('Admin')->name('admin.')->middleware(['guest:admin'])->group(function () {
    Route::get('kt-login', [AdminAuthController::class, 'getLogin'])->name('login');
    Route::post('kt-login', [AdminAuthController::class, 'postLogin'])->name('login_post');

    // Route::get('kt-register', [AdminAuthController::class, 'register_view'])->name('register_view');
    // Route::post('kt-register', [AdminAuthController::class, 'register'])->name('register_post');
});

Route::get('logout', [AdminAuthController::class, 'postLogout'])->name('post_logout');

// admin routes

Route::middleware(['auth:admin', 'getpermissioninfo'])->prefix('kt-admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin_dashboard');

    // status routes start
    Route::get('userstatus/{id}', [BackUserController::class, 'userstatus']);
    Route::get('sliderstatus/{id}', [BackSliderController::class, 'sliderstatus']);

    // search route

    Route::get('user/search', [BackUserController::class, 'search'])->name('user_search');
    Route::get('group/search', [GroupController::class, 'search'])->name('group_search');
    Route::get('module/search', [ModulesController::class, 'search'])->name('module_search');
    Route::get('page/search', [PageController::class, 'search'])->name('page_search');
    Route::get('image_gallery/search', [GalleryController::class, 'search'])->name('image_gallery');
    Route::get('image/search', [GalleryImagesController::class, 'search'])->name('image_search');
    Route::get('video_gallery/search', [VGalleryController::class, 'search'])->name('video_gallery');
    Route::get('video/search', [GalleryVideosController::class, 'search'])->name('video_search');
    Route::get('post/search', [PostController::class, 'search'])->name('post_search');
    Route::get('menu/search', [MenuController::class, 'search'])->name('menu_search');
    Route::get('menulist/search', [MenulistController::class, 'search'])->name('menulist_search');
    Route::get('page_category/search', [PagecategoryController::class, 'search'])->name('pagecategory_search');
    Route::get('post_category/search', [PostCategoryController::class, 'search'])->name('postcategory_search');

    // multiple delete routes start
    Route::delete('images/multi_delete/{id}', [GalleryImagesController::class, 'multi_destroy'])->name('multi_destory');
    Route::delete('videos/multi_delete/{id}', [GalleryVideosController::class, 'multi_destroy'])->name('multi_destory');
    Route::delete('menu/multi_delete/{id}', [MenulistController::class, 'multi_destroy'])->name('multi_destory');

    // multiple delete routes end
    Route::get('post_permission/{id}', [PostController::class, 'post_permission'])->name('toogle_post_permission');

    // user profile routes start
    Route::get('settings/users', [UserSettingsController::class, 'view'])->name('user_view');
    Route::post('settings/users', [UserSettingsController::class, 'update'])->name('user');
    // user profile routes end

    route::get('settings/general', [GeneralSettingsController::class, 'view'])->name('general_view');
    route::post('settings/general', [GeneralSettingsController::class, 'update'])->name('general');

    Route::get('userlog', [LogHistoryController::class, 'index'])->name('userlog');

    Route::post('imagedropzone', [GalleryImagesController::class, 'dzone'])->name('imagedropzone');
    Route::post('videodropzone', [GalleryVideosController::class, 'dzonev'])->name('videodropzone');

    // projects list routes
    Route::get('project/ongoing', [ProjectController::class, 'OnGoingList'])->name('project.ongoing');
    Route::get('project/ready', [ProjectController::class, 'ReadyList'])->name('project.ready');
    Route::get('project/up-coming', [ProjectController::class, 'UpCommingList'])->name('project.upcomming');

    // project images routes
    Route::post('project/imagedropzone', [ProjectImageController::class, 'dzone'])->name('project.imagedropzone');
    Route::get('project/{project}/images', [ProjectImageController::class, 'list'])->name('project_image.list');
    Route::post('projectimage/store', [ProjectImageController::class, 'store'])->name('project_image.store');
    Route::delete('projectimage/{projectImage}', [ProjectImageController::class, 'destroy'])->name('project_image.destroy');

    // project floor plan routes
    Route::post('project/fplandropzone', [FloorPlanController::class, 'dzone'])->name('project.fplandropzone');
    Route::get('project/fplan/{project}', [FloorPlanController::class, 'list'])->name('project_fplan.list');
    Route::post('projectfplan/store', [FloorPlanController::class, 'store'])->name('project_fplan.store');
    Route::delete('projectfplan/{floorPlan}', [FloorPlanController::class, 'destroy'])->name('project_fplan.destroy');

    // Project Floor Plan Video
    Route::get('project/videos/{project}', [ProjectVideoController::class, 'list'])->name('project_video.list');
    Route::post('project/videos', [ProjectVideoController::class, 'store'])->name('project_video.store');
    Route::delete('project/videos/{projectVideo}', [ProjectVideoController::class, 'destroy'])->name('project_video.destroy');



    Route::resource('user', BackUserController::class);
    Route::resource('group', GroupController::class)->except(['show']);
    Route::resource('module', ModulesController::class)->except(['show']);
    Route::resource('page', PageController::class);
    Route::resource('category', PagecategoryController::class);
    Route::resource('post', PostController::class);
    Route::resource('service', ServicesController::class);
    Route::resource('post_category', PostCategoryController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('menulist', MenulistController::class);
    Route::resource('slider', BackSliderController::class);
    Route::resource('galleries', GalleryController::class)->except(['create', 'edit']);
    Route::resource('images', GalleryImagesController::class)->except(['create', 'index', 'show', 'edit']);
    Route::resource('vgalleries', VGalleryController::class)->except(['create', 'edit']);
    Route::resource('videos', GalleryVideosController::class)->except(['create', 'index', 'show', 'edit']);
    Route::resource('contactsetting', ContactSettingController::class)->except(['create', 'store', 'show', 'edit', 'destroy']);
    Route::resource('project', ProjectController::class)->except(['index']);
    Route::resource('handover-project', HandoverProjectsController::class);
    Route::resource('management', ManagementController::class);
});
