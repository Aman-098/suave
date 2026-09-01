<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\SeoPageController;
use App\Http\Controllers\Front\SeoSitemapController;

/*
|--------------------------------------------------------------------------
| SEO landing pages
|--------------------------------------------------------------------------
| New path prefixes only. None of these collide with the 43 URLs already
| live (/, /about-us, /our-fleets, /fleet/{slug}, /gallery, /blogs,
| /blog/{slug}, /contact, /thank-you, /term-and-conditions, /sitemap.xml).
*/

Route::get('/directions', [SeoPageController::class, 'directions'])->name('seo.directions');

Route::get('/services/{slug}', [SeoPageController::class, 'service'])
    ->where('slug', '[a-z0-9-]+')->name('seo.service');

Route::get('/chauffeur-hire/{slug}', [SeoPageController::class, 'area'])
    ->where('slug', '[a-z0-9-]+')->name('seo.area');

Route::get('/wedding-car-hire/{slug}', [SeoPageController::class, 'wedding'])
    ->where('slug', '[a-z0-9-]+')->name('seo.wedding');

Route::get('/luxury-car-hire/{slug}', [SeoPageController::class, 'hire'])
    ->where('slug', '[a-z0-9-]+')->name('seo.hire');

Route::get('/transfers/{slug}', [SeoPageController::class, 'route'])
    ->where('slug', '[a-z0-9-]+')->name('seo.route');

Route::get('/sitemap-seo.xml', [SeoSitemapController::class, 'index'])->name('seo.sitemap');
