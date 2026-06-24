<?php

use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DosageTypeController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SpecificationController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TherapeuticClassController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CorePrinciplesController;
use App\Http\Controllers\Frontend\EventController as FrontendEventController;
use App\Http\Controllers\Frontend\GalleryController as FrontendGalleryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ResearchAndDevelopmentController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [AboutController::class, 'index']);
Route::get('/our-core-principles', [CorePrinciplesController::class, 'index']);
Route::get('/research-and-development', [ResearchAndDevelopmentController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/categories', [FrontendCategoryController::class, 'index']);
Route::get('/products', [FrontendProductController::class, 'index']);
Route::get('/products/category/{category:slug}', [FrontendProductController::class, 'category'])->name('frontend.products.category');
Route::get('/products/category/{category:slug}/{subCategory:slug}', [FrontendProductController::class, 'subCategory'])->name('frontend.products.sub-category');
Route::get('/products/{product:slug}', [FrontendProductController::class, 'show']);
Route::get('/team', [TeamController::class, 'index']);
Route::get('/blog', [FrontendBlogController::class, 'index'])->name('frontend.blog.index');
Route::get('/blog/{blog:slug}', [FrontendBlogController::class, 'show'])->name('frontend.blog.show');
Route::get('/events', [FrontendEventController::class, 'index'])->name('frontend.events.index');
Route::get('/events/{event:slug}', [FrontendEventController::class, 'show'])->name('frontend.events.show');
Route::get('/gallery', [FrontendGalleryController::class, 'index']);
Route::get('/contact-us', [ContactController::class, 'index']);

Route::get('/dashboard', function () {
    return view('pages.backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        Route::get('products/bulk-template', [ProductController::class, 'downloadBulkTemplate'])
            ->name('products.bulk-template');
        Route::post('products/bulk-import', [ProductController::class, 'bulkImport'])
            ->name('products.bulk-import');

        Route::resource('products', ProductController::class)
            ->except(['show']);

        Route::resource('events', EventController::class)
            ->except(['show']);

        Route::resource('sliders', SliderController::class)
            ->except(['show']);

        Route::resource('galleries', GalleryController::class)
            ->except(['show']);
    });

    Route::resource('product-categories', CategoryController::class)
        ->except(['show'])
        ->parameters(['product-categories' => 'category']);

    Route::resource('product-sub-categories', SubCategoryController::class)
        ->except(['show'])
        ->parameters(['product-sub-categories' => 'subCategory']);

    Route::resource('dosage-types', DosageTypeController::class)
        ->except(['show'])
        ->parameters(['dosage-types' => 'dosageType']);

    Route::resource('therapeutic-classes', TherapeuticClassController::class)
        ->except(['show'])
        ->parameters(['therapeutic-classes' => 'therapeuticClass']);

    Route::resource('specifications', SpecificationController::class)
        ->except(['show']);

    Route::resource('blog-categories', BlogCategoryController::class)
        ->except(['show'])
        ->parameters(['blog-categories' => 'blogCategory']);

    Route::resource('blogs', BlogController::class)
        ->except(['show']);

    Route::get('settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
