<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Home Redirect
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Portfolio
|--------------------------------------------------------------------------
*/
Route::get('/portofolio', [MainController::class, 'portfolio'])
    ->name('portofolio');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Home
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        return redirect()->route('dashboard.page', [
            'page' => 'home'
        ]);
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Main Dashboard Pages
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard/{page}', [MainController::class, 'dashboard'])
        ->name('dashboard.page');
    // Route::get('/dashboard', [MainController::class, 'dashboard'])
    //     ->name('dashboard.page');

    /*
    |--------------------------------------------------------------------------
    | HOME
    |--------------------------------------------------------------------------
    */
    Route::post('/dashboard/home/update', [MainController::class, 'updateHome'])
        ->name('home.update');

    /*
    |--------------------------------------------------------------------------
    | ABOUT
    |--------------------------------------------------------------------------
    */
    Route::post('/dashboard/about/update', [MainController::class, 'updateAbout'])
        ->name('about.update');

    Route::post('/dashboard/about/edit-mode', function () {
        session(['edit_mode' => true]);
        return back();
    })->name('about.edit.mode');

    Route::post('/dashboard/about/close-mode', function () {
        session()->forget('edit_mode');
        return back();
    })->name('about.close.mode');

    /*
    |--------------------------------------------------------------------------
    | SERVICES
    |--------------------------------------------------------------------------
    */
    Route::post('/dashboard/services/update', [MainController::class, 'updateService'])
        ->name('services.update');

    Route::delete('/dashboard/services/delete/{id}', [MainController::class, 'deleteService'])
        ->name('services.delete');

    /*
    |--------------------------------------------------------------------------
    | PROJECTS
    |--------------------------------------------------------------------------
    */

    // Create Project
    Route::post('/dashboard/projects/store', [MainController::class, 'storeProject'])
        ->name('projects.store');

    // Update Project
    Route::put('/dashboard/projects/update/{id}', [MainController::class, 'updateProject'])
        ->name('projects.update');

        /*
    |--------------------------------------------------------------------------
    | Skill
    |--------------------------------------------------------------------------
    */

// إنشاء + تحديث (نفس الفورم)
Route::post('/dashboard/skills/store-or-update', [MainController::class, 'skillsStoreOrUpdate'])
    ->name('skills.storeOrUpdate');

// حذف
Route::delete('/dashboard/skills/delete/{id}', [MainController::class, 'deleteSkill'])
    ->name('skills.delete');

// فتح صفحة التعديل (هذا هو المهم للـ fill)
Route::get('/dashboard/{page}/edit-skill/{id}', [MainController::class, 'dashboard'])
    ->name('skills.edit');

    
        /*
    |--------------------------------------------------------------------------
    | Contact
    |--------------------------------------------------------------------------
    */
   Route::post('/dashboard/social/store', [MainController::class, 'storeSocial'])
    ->name('social.store');

    Route::delete('/dashboard/social/delete/{id}', [MainController::class, 'deleteSocial'])
    ->name('social.delete');
});