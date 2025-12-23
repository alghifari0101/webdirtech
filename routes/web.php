<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\LandingPage::class)->name('home');
Route::get('/tentang-kami', \App\Livewire\AboutUs::class)->name('about');
Route::get('/layanan/install-vps', \App\Livewire\InstallVps::class)->name('service.vps');
Route::get('/layanan/pembuatan-website', \App\Livewire\CreateWebsite::class)->name('service.website');
Route::get('/layanan/migrasi-website', \App\Livewire\WebsiteMigration::class)->name('service.migration');
Route::get('/layanan/google-bisnis', \App\Livewire\GoogleBusiness::class)->name('service.gmb');
Route::get('/kontak', \App\Livewire\ContactUs::class)->name('contact');
Route::get('/tanya', \App\Livewire\AskPage::class)->name('ask');
Route::get('/tanya/page/{page}', \App\Livewire\AskPage::class)->name('ask.page');
Route::get('/tanya/cari/{search}', \App\Livewire\AskPage::class)->name('ask.search');
Route::get('/tanya/cari/{search}/page/{page}', \App\Livewire\AskPage::class)->name('ask.search.page');
Route::get('/tanya/{ask}', \App\Livewire\AskDetail::class)->name('ask.show');

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
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/asks', \App\Livewire\Admin\AskManager::class)->name('asks');
    Route::get('/users', \App\Livewire\Admin\UserManager::class)->name('users');
});

