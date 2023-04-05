<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Product_categoryController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StudentController;


use App\Mail\Registration;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Verified;

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

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/email/verify/{id}/{hash}', function ($id, $hash, Request $request) {
    
    $user = User::find($id);
    if(!$user) {
        return redirect()->route('login')->withError("Something went wrong please try again!");
    }
    if (! hash_equals((string) $id, (string) $user->getKey())) {
        return redirect()->route('login')->withError("Something went wrong please try again!");
    }

    if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        return redirect()->route('login')->withError("Something went wrong please try again!");
    }

    if (! $user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
        event(new Verified($user));
    }

    return redirect()->route('login')->withSuccess("Email verified successfully.");
})->middleware(['guest'])->name('verification.verify');




Route::get('send-email', function () {
    $user = User::first();
    $user->sendEmailVerificationNotification();
    //dd($user);
    Mail::to('praveensilaych@gmail.com')->send(new Registration($user));

});


Route::get('login',[UserController::class, 'login'])->name('login');
Route::post('loginpost',[UserController::class, 'loginpost'])->name('loginpost');
Route::get('form',[UserController::class, 'register'])->name('register');
Route::post('formpost',[UserController::class, 'formpost'])->name('formpost');
Route::get('/',[FrontendController::class, 'home'])->name('home');
Route::get('categories',[FrontendController::class, 'categories'])->name('categories');
Route::get('categorys/{slug}',[FrontendController::class, 'categorySlug'])->name('category-list');
Route::get('article/{slug}',[FrontendController::class, 'articleSlug'])->name('article-list');
Route::get('contact',[FrontendController::class, 'contact'])->name('contact');
Route::get('product/list',[ProductController::class, 'getProduct'])->name('product.list');
Route::get('products{id}',[FrontendController::class, 'products'])->name('products');

Route::get('cart/{id}',[CartController::class, 'cart'])->name('cart');
Route::get('cartadd',[CartController::class, 'addcart'])->name('addcart');

Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('student',[StudentController::class, 'index'])->name('student');
    Route::get('logout',[UserController::class, 'logout'])->name('logout');
    Route::get('user/list',[UserController::class, 'getUser'])->name('user.list');
    Route::get('banner/list', [BannerController::class, 'getBanner'])->name('banner.list');
    Route::get('category/list', [CategoryController::class, 'getCategory'])->name('category.list');

    Route::get('block/list', [BlockController::class, 'getBlock'])->name('block.list');
    Route::resource('brand',BrandController::class);

    Route::resource('user',UserController::class);
    Route::resource('role',RoleController::class);
    Route::resource('product',ProductController::class);
    Route::resource('product_category',Product_categoryController::class);
    Route::resource('permission',PermissionController::class);
    Route::resource('block',BlockController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('page',PageController::class);
    Route::resource('banner',BannerController::class);
});