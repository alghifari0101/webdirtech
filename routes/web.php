<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitemapController;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/', \App\Livewire\LandingPage::class)->name('home');
Route::get('/tentang-kami', \App\Livewire\AboutUs::class)->name('about');
Route::get('/jasa/install-vps', \App\Livewire\InstallVps::class)->name('service.vps');
Route::get('/jasa/pembuatan-website', \App\Livewire\CreateWebsite::class)->name('service.website');
Route::get('/jasa/migrasi-website', \App\Livewire\WebsiteMigration::class)->name('service.migration');
Route::get('/jasa/google-bisnis', \App\Livewire\GoogleBusiness::class)->name('service.gmb');
Route::get('/kontak', \App\Livewire\ContactUs::class)->name('contact');
Route::get('/blog', \App\Livewire\Blog\Index::class)->name('blog');
Route::get('/blog/category/{category}', \App\Livewire\Blog\Index::class)->name('blog.category');
Route::get('/blog/{post}', \App\Livewire\Blog\Detail::class)->name('blog.show');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
});

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout')->middleware('auth');

// Admin Routes
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/blog', \App\Livewire\Admin\PostManager::class)->name('posts');
    Route::get('/blog/categories', \App\Livewire\Admin\CategoryManager::class)->name('categories');
    Route::get('/users', \App\Livewire\Admin\UserManager::class)->name('users');
});

