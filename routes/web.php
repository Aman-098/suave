<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController as Home;
use App\Http\Controllers\Front\FleetController as Fleet;
use App\Http\Controllers\Front\ContactController as FrontContact;
use App\Http\Controllers\Front\BlogController as FrontBlog;
use App\Http\Controllers\Front\SeoController as Seo;
use App\Http\Controllers\Front\SitemapController as Sitemap;


// Admin Controllers
use App\Http\Controllers\AuthController as Auth;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\SliderController as AdminSlider;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\CategoryController as Category;
use App\Http\Controllers\Admin\ContactController as Contact;
use App\Http\Controllers\Admin\BlogController as AdminBlog;
use App\Http\Controllers\Admin\CmsController as AdminCms;



// Frontend Routes
Route::get('/',[Home::class,'index'])->name('home');

Route::get('/about-us',[Seo::class,'about_us'])->name('about');

Route::get('/our-fleets',[Fleet::class,'index'])->name('fleets');
Route::get('/fleet/{slug}',[Fleet::class,'fleet_detail'])->name('fleet.detail');
Route::post('/save/booking',[Fleet::class,'save_booking'])->name('booking.save');

Route::get('/contact',[FrontContact::class,'index'])->name('contact');
Route::post('/save/contact-form',[FrontContact::class,'save_form'])->name('contact.save');
Route::post('/quote-form',[FrontContact::class,'footer_form'])->name('footer.save');
Route::get('/thank-you',[FrontContact::class,'thank_you'])->name('thankyou');

Route::get('/gallery',[Seo::class,'gallery'])->name('gallery');

Route::get('/blogs',[FrontBlog::class,'index'])->name('blog');
Route::get('/blog/{slug}',[FrontBlog::class,'blog_detail']);

Route::get('/sitemap.xml', [Sitemap::class, 'index'])->name('sitemap');

Route::get('/term-and-conditions',[Seo::class,'term_condition'])->name('terms');


// Admin Routes
Route::match(['get', 'post'], '/sysadmin',[Auth::class,'login_user'])->name('login');
Route::match(['get', 'post'], '/logout',[Auth::class,'logout_user'])->name('logout.user');

Route::middleware(['auth:admin','admin'])->group(function () {

    Route::get('sysadmin/dashboard',[AdminDashboard::class,'index'])->name('admin.dashboard');
    Route::match(['get','post'],'/edit-order/{id}',[AdminDashboard::class,'edit_order'])->name('edit.order');

    Route::get('sysadmin/categories',[Category::class,'index'])->name('admin.cat');
    Route::post('/categories/add',[Category::class,'add_category'])->name('admin.cat-add');
    Route::match(['get','post'],'/edit-category/{id}',[Category::class,'edit_category'])->name('edit.category');
    Route::delete('delete-categories/{id}',[Category::class,'delete_category'])->name('category.delete');

    Route::get('sysadmin/show-fleet',[AdminProduct::class,'index'])->name('admin.product');
    Route::post('/fleet/add',[AdminProduct::class,'add_product'])->name('admin.product-add');
    Route::match(['get','post'],'/edit-fleet/{id}',[AdminProduct::class,'edit_product'])->name('edit.product');
    Route::delete('delete-fleet/{id}',[AdminProduct::class,'delete_product'])->name('product.delete');


    Route::get('sysadmin/manage-blogs',[AdminBlog::class,'index'])->name('admin.blogs');
    Route::post('/blog/add',[AdminBlog::class,'add_blog'])->name('admin.blog-add');
    Route::match(['get','post'],'/edit-blog/{id}',[AdminBlog::class,'edit_blog'])->name('edit.blog');
    Route::delete('delete-blog/{id}',[AdminBlog::class,'delete_blog'])->name('blog.delete');

    Route::get('sysadmin/contacts-enquiry',[Contact::class,'index'])->name('admin.contact');

    Route::get('sysadmin/manage-gallery',[AdminCms::class,'videos'])->name('admin.video');
    Route::post('/gallery/add',[AdminCms::class,'add_video'])->name('admin.video-add');
    Route::match(['get','post'],'/edit-gallery/{id}',[AdminCms::class,'edit_video'])->name('edit.video');
    Route::delete('delete-gallery/{id}',[AdminCms::class,'delete_video'])->name('video.delete');




});


// SEO landing pages (services, areas, wedding areas, transfers, directions)
require __DIR__.'/seo.php';
