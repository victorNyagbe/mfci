<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AnnexController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\TestimoniesController;
use App\Http\Controllers\Guests\ActivityController as GuestsActivityController;
use App\Http\Controllers\Guests\AlbumController;
use App\Http\Controllers\Guests\ArticleController as GuestsArticleController;
use App\Http\Controllers\Guests\MainController;
use App\Http\Controllers\Guests\MemberController as GuestsMemberController;
use App\Http\Controllers\views\AuthController;
use App\Http\Controllers\processing\AuthController as AuthProcessingController;
use App\Http\Controllers\views\user\MainController as UserMainController;
use App\Http\Middleware\IsAuthenticatedMiddleware;
use App\Models\Activity;
use App\Models\Album;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Content;
use App\Models\Member;
use Illuminate\Support\Facades\Route;


Route::prefix('')->as('guests.')->group(function () {

    Route::get('/', [MainController::class, "welcome"])->name('home');


    Route::prefix("/articles")->as('articles.')->group(function () {
        Route::get('', [GuestsArticleController::class, "index"])->name('index');

        Route::get('/{article}', [GuestsArticleController::class, "show"])->name('show');
    });

    Route::get('activites', [GuestsActivityController::class, 'index'])->name('activities');

    Route::get('membres', [GuestsMemberController::class, 'index'])->name('members');

    Route::prefix('albums/')->as('albums.')->group(function () {
        Route::get('', [AlbumController::class, "index"])->name('index');

        Route::get('/{album}', [AlbumController::class, "show"])->name('show');
    });

    Route::get('/about-us', [MainController::class, "about"])->name('about');

    Route::get('/donation', [MainController::class, "donation"])->name('donation');

    Route::get('nos-annexes', [MainController::class, 'annexe'])->name("annexe");

    Route::get('nos-témoignages', [MainController::class, 'testimonies'])->name("testimonies");

    Route::post('newsletter-mail', [MainController::class, "subscribeToNewsletter"])->name('subscribeToNewsletter');
});

Route::middleware([IsAuthenticatedMiddleware::class])->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthProcessingController::class, 'login'])->name('login.processing');

    Route::get('/forgotten-password', [AuthController::class, 'forgottenPassword'])->name('forgottenPassword');
    Route::post('/forgotten-password', [AuthProcessingController::class, 'forgottenPassword'])->name('forgottenPassword.processing');

    Route::get('/otp-code', [AuthController::class, 'otpCode'])->name('otpCode');
    Route::post('/otp-code', [AuthProcessingController::class, 'otpCode'])->name('otpCode.processing');

    Route::get('/new-password', [AuthController::class, 'newPassword'])->name('newPassword');
    Route::post('/new-password', [AuthProcessingController::class, 'newPassword'])->name('newPassword.processing');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [UserMainController::class, 'dashboard'])->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::resource('/medias', MediaController::class);
        Route::get('/medias/file/{id}/destroy', [MediaController::class, 'destroyFile'])->name('media.destroyFile');
        Route::resource('/banners', BannerController::class);
        Route::resource('/members', MemberController::class);
        Route::resource('/activities', ActivityController::class);
        Route::resource('/annexes', AnnexController::class);
        Route::resource('/articles', ArticleController::class);

        Route::prefix('temoignages/')->group(function () {
            Route::get('', [TestimoniesController::class, 'index'])->name('testimonies.index');

            Route::post('store', [TestimoniesController::class, 'store'])->name('testimonies.store');
        });

        Route::resource('/donations', DonationController::class);
        Route::resource('/about', AboutController::class);
        Route::any('/about-content-file/{contentFile?}', [AboutController::class, 'storeOrUpdateAboutFile'])->name("storeOrUpdateAboutFile");
    });
});
