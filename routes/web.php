<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\ContactSectionSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSectionController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterSocialController;
use App\Http\Controllers\Admin\FooterUsefulLinkController;
use App\Http\Controllers\Admin\FooterHelperController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/** portfolio details */
Route::get('portfolio-details/{id}', [HomeController::class, 'portfolioDetails'])->name('portfolio-details');
Route::get('blog-details/{id}', [HomeController::class, 'blogDetails'])->name('blog-details');
Route::get('blogs', [HomeController::class, 'blogs'])->name('blog');
Route::post('contact', [HomeController::class, 'contact'])->name('contact');

require __DIR__.'/auth.php';

// Admin Routes
Route::group(['middleware' => ['auth'],'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);
    /** service route */
    Route::resource('service', ServiceController::class);
    /** about route */
    Route::get('resume/download', [AboutController::class, 'download'])->name('resume.download');
    Route::resource('about', AboutController::class);
    /** portfolio category route */
    Route::resource('category', CategoryController::class);
    /** portfolio item route */
    Route::resource('portfolio-item', PortfolioItemController::class);
    /** portfolio section setting */
    Route::resource('portfolio-section-setting', PortfolioSectionSettingController::class);
    /**skill section route */
    Route::resource('skill-section-setting', SkillSectionSettingController::class);
    /** skill item route */
    Route::resource('skill-item', SkillItemController::class);
    /** experience route */
    Route::resource('experience', ExperienceController::class);
    /** feedback route */
    Route::resource('feedback', FeedbackController::class);
    /** feedback section route */
    Route::resource('feedback-section-setting', FeedbackSectionController::class);
    /** blog-category route */
    Route::resource('blog-category', BlogCategoryController::class);
    /** blog route */
    Route::resource('blog', BlogController::class);
    /** blog section setting */
    Route::resource('blog-section-setting', BlogSectionSettingController::class);
    /** contact section setting */
    Route::resource('contact-section-setting', ContactSectionSettingController::class);
    /** footer routes */
    /** footer social route */
    Route::resource('footer-social', FooterSocialController::class);
    /** footer info route */
    Route::resource('footer-info', FooterInfoController::class);
    /** contact info route */
    Route::resource('contact-info', ContactInfoController::class);
    /** useful link route */
    Route::resource('useful-link', FooterUsefulLinkController::class);
    /** help link route*/
    Route::resource('help-link', FooterHelperController::class);
    /**  setting route */
    Route::get('settings', SettingController::class)->name('settings.index');
     /** general setting route*/
     Route::resource('general-setting', GeneralSettingController::class);
     /** seo setting route */
     Route::get('seo-settings', [SeoSettingController::class, 'index'])->name('seo-settings.index');
     Route::put('seo-settings/{id}', [SeoSettingController::class, 'update'])->name('seo-settings.update');

});
