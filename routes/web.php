<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\OneController;
use App\Http\Livewire\Admin\AdminDashboerdComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboerdComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeComponent::class);
Route::get('/cart', CartComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/checkout', CheckoutComponent::class);
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('user/dashboard', UserDashboerdComponent::class)->name('user.dashboard');
});
/* For Admin Dashboard  */
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('admin/dashboard', AdminDashboerdComponent::class)->name('admin.dashboard');
});
Route::get('alia', [BaseController::class, 'index']);
