<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EquipmentController as AdminEquipmentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// ─── PUBLIC ROUTES ───────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
Route::get('/equipment/{slug}', [EquipmentController::class, 'show'])->name('equipment.show');

Route::get('/news', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/news/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{id}', [CareerController::class, 'show'])->name('careers.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('lang.switch');

// ─── ADMIN ROUTES ─────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('equipment', AdminEquipmentController::class);
        Route::patch('equipment/{equipment}/toggle', [AdminEquipmentController::class, 'toggle'])->name('equipment.toggle');

        Route::resource('articles', AdminArticleController::class);
        Route::patch('articles/{article}/toggle', [AdminArticleController::class, 'toggle'])->name('articles.toggle');

        Route::resource('careers', AdminCareerController::class);
        Route::patch('careers/{career}/toggle', [AdminCareerController::class, 'toggle'])->name('careers.toggle');

        Route::resource('projects', AdminProjectController::class);
        Route::patch('projects/{project}/toggle', [AdminProjectController::class, 'toggle'])->name('projects.toggle');

        Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        // CKEditor5 image upload
        Route::post('upload/image', [\App\Http\Controllers\Admin\UploadController::class, 'image'])->name('upload.image');
    });
});
