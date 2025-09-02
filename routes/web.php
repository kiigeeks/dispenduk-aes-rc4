<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeopleController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/cms/login', 'index')->name('admin-login')->middleware('guest');
    Route::post('/cms/login', 'authenticate')->name('admin-authenticate');
    Route::get('/cms/logout', 'logout')->name('admin-logout');
});


Route::prefix('cms')
    ->middleware('admin')
    ->group(function () {
		Route::get('/', function () {
			return redirect()->route('admin-home');
		});
        
        Route::controller(AdminController::class)->group(function () {
			Route::get('/dashboard', 'index')->name('admin-home');
			Route::get('/profile', 'profile')->name('admin-profile');
			Route::put('/profile/{user}', 'updateProfile')->name('admin-profile-update');
			Route::get('/employees', 'employees')->name('admin-employees');
			Route::get('/employees/create', 'create')->name('admin-employees-create');
			Route::post('/employees', 'store')->name('admin-employees-store');
			Route::get('/employees/{user}', 'detail')->name('admin-employees-detail');
			Route::delete('/employees/{user}', 'destroy')->name('admin-employees-destroy');
			Route::put('/employees/{user}', 'update')->name('admin-employees-update');
        });

        Route::resource('/people', PeopleController::class);
//         Route::resource('/statistiks', StatistikController::class);
//         Route::resource('/heroes', HeroController::class);
//         Route::resource('/master', MasterWebController::class);
//         Route::resource('/testimonials', TestimonialController::class);
//         Route::resource('/galleries', OurGalleryController::class);
//         Route::resource('/contacts', ContactController::class);
//         Route::resource('/sosmeds', SosialMediaController::class);
//         Route::resource('/partners', PartnerController::class);
//         Route::resource('/posts', PostController::class);
//         Route::resource('/post-galleries', GalleryPostController::class);
//         Route::resource('/programs', ProgramController::class);
//         Route::resource('/facility/categories', CategoryFacilityController::class);
//         Route::resource('/facility/facilities', FacilityController::class);
//         Route::resource('/faqs', FaqController::class);
});