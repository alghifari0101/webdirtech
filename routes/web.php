<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitemapController;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/fix-cache-now', function() {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    return 'Cache cleared! Please go back and try to login.';
});

Route::get('/test-layout', function () {
    return Blade::render('<x-layouts.admin>Test Layout Rendering</x-layouts.admin>');
});

Route::get('/', \App\Livewire\LandingPage::class)->name('home');
Route::get('/tentang-kami', \App\Livewire\AboutUs::class)->name('about');
Route::get('/jasa/install-vps', \App\Livewire\InstallVps::class)->name('service.vps');
Route::get('/jasa/pembuatan-website', \App\Livewire\CreateWebsite::class)->name('service.website');
Route::get('/jasa/migrasi-website', \App\Livewire\WebsiteMigration::class)->name('service.migration');
Route::get('/jasa/google-bisnis', \App\Livewire\GoogleBusiness::class)->name('service.gmb');
Route::get('/jasa/bikin-cv-ats', \App\Livewire\CreateCvAts::class)->name('service.cv');
Route::get('/kontak', \App\Livewire\ContactUs::class)->name('contact');
Route::get('/blog', \App\Livewire\Blog\Index::class)->name('blog');
Route::get('/blog/category/{category}', \App\Livewire\Blog\Index::class)->name('blog.category');
Route::get('/blog/{post}', \App\Livewire\Blog\Detail::class)->name('blog.show');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');
});

Route::post('/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout')->middleware('auth');

// Admin Routes
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/blog', \App\Livewire\Admin\PostManager::class)->name('posts');
    Route::post('/blog/upload-image', [\App\Http\Controllers\Admin\ImageUploadController::class, 'upload'])->name('blog.upload-image');
    Route::get('/blog/categories', \App\Livewire\Admin\CategoryManager::class)->name('categories');
    Route::get('/users', \App\Livewire\Admin\UserManager::class)->name('users');
    Route::get('/pembayaran', \App\Livewire\Admin\PaymentVerification::class)->name('payments');
});

// Member (CV Service) Routes
Route::middleware(['auth', 'isMember'])->prefix('dashboard')->name('member.')->group(function () {
    Route::get('/', \App\Livewire\Member\Dashboard::class)->name('dashboard');
    Route::get('/cv-editor', \App\Livewire\Member\CvEditor::class)->name('cv-editor');
    Route::get('/surat-lamaran', \App\Livewire\Member\CoverLetterEditor::class)->name('cover-letter');
    Route::get('/pembayaran', \App\Livewire\Member\Payment::class)->name('payment');
    Route::get('/profil', \App\Livewire\Member\Profile::class)->name('profile');
});

