<?php

use App\Http\Controllers\Backend\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Backend\Auth\AdminLoginController;
use App\Http\Controllers\Backend\Auth\AdminRegistrationController;
use App\Http\Controllers\Backend\Auth\AdminResetPasswordController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DoctorManageController;
use App\Http\Controllers\Backend\SiteInfoController;
use App\Http\Controllers\Doctor\DoctorDashboardController;
use App\Http\Controllers\Doctor\DoctorForgotPasswordController;
use App\Http\Controllers\Doctor\DoctorLoginController;
use App\Http\Controllers\Doctor\DoctorResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

//doctor
Route::prefix('/doctor')->as('doctor.')->middleware('guest:doctor')->group(function () {
    Route::get('/login', [DoctorLoginController::class, 'login'])->name('login');
    Route::post('/store-login', [DoctorLoginController::class, 'storeLogin'])->name('storeLogin');

    Route::get('/forgot-password', [DoctorForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password', [DoctorForgotPasswordController::class, 'storeForgotPassword'])->name('storeForgotPassword');

    Route::get('/reset-password/{token}', [DoctorResetPasswordController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset-password', [DoctorResetPasswordController::class, 'storeForgotPassword'])->name('storeResetPassword');
});

Route::prefix('/doctor')->as('doctor.')->middleware('auth:doctor')->group(function () {
    Route::post('/logout', [DoctorLoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DoctorDashboardController::class, 'dashboard'])->name('dashboard');
});

//admin
Route::prefix('/admin')->as('admin.')->middleware('guest:admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'login'])->name('login');
    Route::post('/store-login', [AdminLoginController::class, 'storeLogin'])->name('storeLogin');

    Route::get('/forgot-password', [AdminForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password', [AdminForgotPasswordController::class, 'storeForgotPassword'])->name('storeForgotPassword');

    Route::get('/reset-password/{token}', [AdminResetPasswordController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset-password', [AdminResetPasswordController::class, 'storeForgotPassword'])->name('storeResetPassword');
});

Route::prefix('/admin')->as('admin.')->middleware('auth:admin')->group(function () {
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //admin management
    Route::controller(AdminRegistrationController::class)->group(function () {
        Route::get('/admin-list', 'adminList')->name('adminList');
        Route::get('/create-admin', 'createAdmin')->name('createAdmin');
        Route::post('/store-admin', 'storeAdmin')->name('storeAdmin');
        Route::get('/edit-admin/{admin}', 'editAdmin')->name('editAdmin');
        Route::post('/update-admin/{admin}', 'updateAdmin')->name('updateAdmin');
        Route::post('/admin/active-admin/{admin}', 'activeAdmin')->name('activeAdmin');
        Route::post('/admin/inactive-admin/{admin}', 'inactiveAdmin')->name('inactiveAdmin');
        Route::delete('/delete-admin/{admin}', 'deleteAdmin')->name('deleteAdmin');

    });

    Route::controller(DoctorManageController::class)->prefix('/manage-doctor')->as('manage_doctor.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{doctor}', 'edit')->name('edit');
        Route::put('/update/{doctor}', 'update')->name('update');
        Route::delete('/delete/{doctor}', 'delete')->name('delete');
        Route::post('/active/{doctor}', 'active')->name('active');
        Route::post('/inactive/{doctor}', 'inactive')->name('inactive');
    });

    //site settings
    Route::controller(SiteInfoController::class)->group(function () {
        Route::get('/site-info', 'showSiteInfo')->name('showSiteInfo');
        Route::post('/store-site-general-info', 'storeSiteGeneralInfo')->name('storeSiteGeneralInfo');
        Route::post('/store-site-seo-info', 'storeSiteSEOInfo')->name('storeSiteSEOInfo');
        Route::post('/store-site-social-info', 'storeSiteSocialInfo')->name('storeSiteSocialInfo');
    });
});
