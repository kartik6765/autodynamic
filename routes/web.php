<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\AdminAuthenticated;

Route::get('/clear', function () {
    $exitCode = Artisan::call('optimize');
    return "cache cleared";
});

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::match(['get','post'], '/contact-us', [IndexController::class, 'contact'])->name('contact');
Route::get('/about-us', [IndexController::class, 'about'])->name('about');
Route::get('/capabilities-details', [IndexController::class, 'capdetails']);
Route::get('/managing-desk', [IndexController::class, 'managing'])->name('managing');
Route::get('/ventures', [IndexController::class, 'ventures']);
Route::get('/category/{id}', [IndexController::class, 'showSubcategories']);
Route::get('/product-detail/{id}', [IndexController::class, 'productDetails']);
Route::get('/product-listing/{subcategory_id}', [IndexController::class, 'subcategoryListing'])->name('product.listing');
Route::get('/blogs', [IndexController::class, 'blogsListing'])->name('blogs');
Route::get('/blog-detail/{id?}/{slug?}', [IndexController::class, 'blogDetail']);
Route::get('/privacy-policy', [IndexController::class, 'privacypolicy']);
Route::match(['get','post'], '/careers', [IndexController::class, 'career'])->name('career');
Route::get('careers/job-details/{id}/{slug?}', [IndexController::class, 'jobDetails']);
Route::post('submit-job-application/', [IndexController::class, 'submitJobApp']);
Route::get('/like-blog/{id}', [BlogsController::class, 'likeBlog']);
Route::post('/comment-blog/{id}', [BlogsController::class, 'commentBlog']);
Route::get('products', [IndexController::class, 'productsPage']);
Route::get('gallery/{id?}/{slug?}', [IndexController::class, 'gallery']);

Route::get('/services/{id}/{cat_slug}/{service_slug}', [IndexController::class, 'serviceDetailPage']);

Auth::routes();
// Admin Routes
Route::get('/admin', function () { return view('admin/admin_login'); });
Route::get('/login', [AdminController::class, 'getLogin'])->name('adminLogin');
Route::post('/login', [AdminController::class, 'postLogin'])->name('adminLoginPost');
Route::match(['get','post'], '/forgot-password/', [AdminController::class, 'forgotPassword']);
Route::match(['get','post'], '/reset-password/', [AdminController::class, 'resetPassword']);
Route::match(['get','post'],'/changePassword', [AdminController::class, 'changePassword']);
Auth::routes();
Route::middleware([AdminAuthenticated::class])->group(function () {
    //Dashboard
    Route::match(['get','post'], '/admin/dashboard', [AdminController::class, 'viewDashboard']);
    //Admin-Setting
    Route::match(['get','post'], 'admin/admin-setting/', [AdminController::class, 'setting']);
    Route::get('/logout', [AdminController::class, 'logout']);
    Route::match(['get','post'], '/admin/add-admin/', [AdminController::class, 'addAdmin']);
    Route::get('/admin/view-admin', [AdminController::class, 'viewAdmin']);
    Route::match(['get','post'], '/change-admin-status-zero/{id}', [AdminController::class, 'chnageAdminStatusZero']);
    Route::match(['get','post'], '/change-admin-status-one/{id}', [AdminController::class, 'chnageAdminStatusOne']);
    Route::match(['get','post'], '/admin/delete-admin/{id}', [AdminController::class, 'deleteAdmin']);

    // notifications
    Route::match(['get','post'], 'admin/add-notifications/', [NotificationsController::class, 'addNotifications']);
    Route::match(['get','post'], 'admin/edit-notifications/{id}', [NotificationsController::class, 'editNotifications']);
    Route::match(['get','post'], 'admin/view-notifications/', [NotificationsController::class, 'viewNotifications']);
    Route::match(['get','post'], 'admin/delete-notifications/{id}', [NotificationsController::class,'deleteNotifications']);

    // banner
    Route::match(['get','post'], 'admin/add-banner/', [HomepageController::class, 'addBanner']);
    Route::match(['get','post'], 'admin/edit-banner/{id}', [HomepageController::class, 'editBanner']);
    Route::match(['get','post'], 'admin/view-banner/', [HomepageController::class, 'viewBanner']);
    Route::match(['get','post'], 'admin/delete-banner/{id}', [HomepageController::class,'deleteBanner']);

    // about
    Route::match(['get','post'], 'admin/add-about/', [HomepageController::class, 'addAbout']);
    Route::match(['get','post'], 'admin/edit-about/{id}', [HomepageController::class, 'editAbout']);
    Route::match(['get','post'], 'admin/view-about/', [HomepageController::class, 'viewAbout']);
    Route::match(['get','post'], 'admin/delete-about/{id}', [HomepageController::class,'deleteAbout']);

    // stats
    Route::match(['get','post'], 'admin/add-stats/', [HomepageController::class, 'addStats']);
    Route::match(['get','post'], 'admin/edit-stats/{id}', [HomepageController::class, 'editStats']);
    Route::match(['get','post'], 'admin/view-stats/', [HomepageController::class, 'viewStats']);
    Route::match(['get','post'], 'admin/delete-stats/{id}', [HomepageController::class,'deleteStats']);

    // whykpca
    Route::match(['get','post'], 'admin/add-whykpca/', [HomepageController::class, 'addWhykpca']);
    Route::match(['get','post'], 'admin/edit-whykpca/{id}', [HomepageController::class, 'editWhykpca']);
    Route::match(['get','post'], 'admin/view-whykpca/', [HomepageController::class, 'viewWhykpca']);
    Route::match(['get','post'], 'admin/delete-whykpca/{id}', [HomepageController::class,'deleteWhykpca']);

    // industry
    Route::match(['get','post'], 'admin/add-industry/', [HomepageController::class, 'addIndustry']);
    Route::match(['get','post'], 'admin/edit-industry/{id}', [HomepageController::class, 'editIndustry']);
    Route::match(['get','post'], 'admin/view-industry/', [HomepageController::class, 'viewIndustry']);
    Route::match(['get','post'], 'admin/delete-industry/{id}', [HomepageController::class,'deleteIndustry']);

    // aboutpage
    Route::match(['get','post'], 'admin/add-aboutpage/', [AboutController::class, 'addAboutpage']);
    Route::match(['get','post'], 'admin/edit-aboutpage/{id}', [AboutController::class, 'editAboutpage']);
    Route::match(['get','post'], 'admin/view-aboutpage/', [AboutController::class, 'viewAboutpage']);
    Route::match(['get','post'], 'admin/delete-aboutpage/{id}', [AboutController::class,'deleteAboutpage']);

    // story
    Route::match(['get','post'], 'admin/add-story/', [AboutController::class, 'addStory']);
    Route::match(['get','post'], 'admin/edit-story/{id}', [AboutController::class, 'editStory']);
    Route::match(['get','post'], 'admin/view-story/', [AboutController::class, 'viewStory']);
    Route::match(['get','post'], 'admin/delete-story/{id}', [AboutController::class,'deleteStory']);

    // core
    Route::match(['get','post'], 'admin/add-core/', [AboutController::class, 'addCore']);
    Route::match(['get','post'], 'admin/edit-core/{id}', [AboutController::class, 'editCore']);
    Route::match(['get','post'], 'admin/view-core/', [AboutController::class, 'viewCore']);
    Route::match(['get','post'], 'admin/delete-core/{id}', [AboutController::class,'deleteCore']);

    // vision
    Route::match(['get','post'], 'admin/add-vision/', [AboutController::class, 'addVision']);
    Route::match(['get','post'], 'admin/edit-vision/{id}', [AboutController::class, 'editVision']);
    Route::match(['get','post'], 'admin/view-vision/', [AboutController::class, 'viewVision']);
    Route::match(['get','post'], 'admin/delete-vision/{id}', [AboutController::class,'deleteVision']);

    // spread
    Route::match(['get','post'], 'admin/add-spread/', [AboutController::class, 'addSpread']);
    Route::match(['get','post'], 'admin/edit-spread/{id}', [AboutController::class, 'editSpread']);
    Route::match(['get','post'], 'admin/view-spread/', [AboutController::class, 'viewSpread']);
    Route::match(['get','post'], 'admin/delete-spread/{id}', [AboutController::class,'deleteSpread']);

    // partners
    Route::match(['get','post'], 'admin/add-partners/', [PartnersController::class, 'addPartners']);
    Route::match(['get','post'], 'admin/edit-partners/{id}', [PartnersController::class, 'editPartners']);
    Route::match(['get','post'], 'admin/view-partners/', [PartnersController::class, 'viewPartners']);
    Route::match(['get','post'], 'admin/delete-partners/{id}', [PartnersController::class,'deletePartners']);

    // services
    Route::match(['get', 'post'],'/admin/add-services/', [ServiceController::class,'addServices']);
    Route::get('/admin/view-services/', [ServiceController::class,'viewServices']);
    Route::match(['get','post'],'/admin/delete-services/{id}',[ServiceController::class,'deleteServices']);
   
    Route::match(['get','post'],'/admin/edit-services/{id}',[ServiceController::class,'editServices']);
    Route::match(['get','post'], 'admin/services/add-category', [ServiceController::class, 'add']);
    Route::match(['get','post'], 'admin/services/store', [ServiceController::class, 'store']);
    Route::match(['get','post'], 'admin/services/edit/{id}', [ServiceController::class, 'edit']);
    Route::match(['get','post'],'admin/services/update/{id}', [ServiceController::class, 'update']);
    Route::match(['get','post'],'admin/services/destroy/{id}', [ServiceController::class, 'destroy']);
    Route::match(['get','post'],'admin/services/view/', [ServiceController::class, 'view']);

    // gallery
    Route::match(['get','post'], 'admin/add-gallery/', [GalleryController::class, 'addGallery']);
    Route::match(['get','post'], 'admin/edit-gallery/{id}', [GalleryController::class, 'editGallery']);
    Route::match(['get','post'], 'admin/view-gallery/', [GalleryController::class, 'viewGallery']);
    Route::match(['get','post'], 'admin/delete-gallery/{id}', [GalleryController::class,'deleteGallery']);

    // blogs
    Route::match(['get','post'], 'admin/add-blogs/', [BlogsController::class, 'addBlogs']);
    Route::match(['get','post'], 'admin/edit-blogs/{id}', [BlogsController::class, 'editBlogs']);
    Route::match(['get','post'], 'admin/view-blogs/', [BlogsController::class, 'viewBlogs']);
    Route::match(['get','post'], 'admin/delete-blogs/{id}', [BlogsController::class,'deleteBlogs']);
    Route::get('admin/blog-comments/{id}', [BlogsController::class,'blogComments']);
    Route::post('admin/comment-status/{id}', [BlogsController::class,'commentStatus']);
    Route::get('admin/delete-comment/{id}', [BlogsController::class,'commentDelete']);

    // career
    Route::match(['get','post'], 'admin/add-career/', [CareerController::class, 'addCareer']);
    Route::match(['get','post'], 'admin/edit-career/{id}', [CareerController::class, 'editCareer']);
    Route::match(['get','post'], 'admin/view-career/', [CareerController::class, 'viewCareer']);
    Route::match(['get','post'], 'admin/delete-career/{id}', [CareerController::class,'deleteCareer']);

    // opportunities
    Route::match(['get','post'], 'admin/add-opportunities/', [CareerController::class, 'addOpportunities']);
    Route::match(['get','post'], 'admin/edit-opportunities/{id}', [CareerController::class, 'editOpportunities']);
    Route::match(['get','post'], 'admin/view-opportunities/', [CareerController::class, 'viewOpportunities']);
    Route::match(['get','post'], 'admin/delete-opportunities/{id}', [CareerController::class,'deleteOpportunities']);
    Route::match(['get','post'], 'admin/view-applications/{id}', [CareerController::class,'viewJobApplications']);

    // News
    Route::match(['get','post'], 'admin/edit-news/{id}', [AdminController::class, 'editNews']);
    Route::match(['get','post'], 'admin/view-news/', [AdminController::class, 'viewNews']);
    Route::match(['get','post'], 'admin/add-news/', [AdminController::class, 'addNews']);
    Route::match(['get','post'], 'admin/delete-news/{id}', [AdminController::class,'deleteNews']);

    // Clients
    Route::match(['get','post'], 'admin/edit-client/{id}', [AdminController::class, 'editClient']);
    Route::match(['get','post'], 'admin/view-client/', [AdminController::class, 'viewClient']);
    Route::match(['get','post'], 'admin/add-client/', [AdminController::class, 'addClient']);
    Route::match(['get','post'], 'admin/delete-client/{id}', [AdminController::class,'deleteClient']);    

    // Events
    Route::match(['get','post'], 'admin/edit-event/{id}', [AdminController::class, 'editEvent']);
    Route::match(['get','post'], 'admin/view-event/', [AdminController::class, 'viewEvent']);
    Route::match(['get','post'], 'admin/add-event/', [AdminController::class, 'addEvent']);
    Route::match(['get','post'], 'admin/delete-event/{id}', [AdminController::class,'deleteEvent']);

    // Expo
    Route::match(['get','post'], 'admin/edit-expo/{id}', [AdminController::class, 'editExpo']);
    Route::match(['get','post'], 'admin/view-expo/', [AdminController::class, 'viewExpo']);
    Route::match(['get','post'], 'admin/add-expo/', [AdminController::class, 'addExpo']);
    Route::match(['get','post'], 'admin/delete-expo/{id}', [AdminController::class,'deleteExpo']);

    // contact
    Route::match(['get','post'], 'admin/add-contact/', [ContactController::class, 'addContact']);
    Route::match(['get','post'], 'admin/edit-contact/{id}', [ContactController::class, 'editContact']);
    Route::match(['get','post'], 'admin/view-contact/', [ContactController::class, 'viewContact']);
    Route::match(['get','post'], 'admin/delete-contact/{id}', [ContactController::class,'deleteContact']);

    // Enquiry
    Route::match(['get','post'], 'admin/view-joinus-enq/', [ContactController::class, 'viewJoinusEnq']);
    Route::match(['get','post'], 'admin/delete-joinus-enq/{id}', [ContactController::class, 'deleteJoinusEnq']);
});


//OTHER ROUTES
Route::match(['get','post'], '/admin-login-check', [AdminController::class, 'login']);
Route::post('/admin-reset-password', [AdminController::class, 'resetPassword']);

Route::get('/admin-forgot-password', function () {
    return view('admin/admin-forgot-password');
});

Route::get('/admin-login', function () {
    return view('admin/admin_login');
});
