<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use App\Models\Category;
use App\Models\Episode;
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

Route::get('/', [IndexController::class,"home"])->name('homepages');
Route::get('/the-loai/{slug}', [IndexController::class,"genre"])->name('genre');

Route::get('/danh-muc/{slug}', [IndexController::class,"category"])->name('category');

Route::get('/phim/{slug}', [IndexController::class,"movie"])->name('movie');
Route::get('/xem-phim/{slug}', [IndexController::class,"watch"])->name('watch');

Route::get('/quoc-gia/{slug}', [IndexController::class,"country"])->name('country');
Route::get('/tap-phim', [IndexController::class,"episode"])->name('episodes');
Route::get('/year/{year}', [IndexController::class,"year"])->name('year');
Route::get('/search', [IndexController::class,"search"])->name('search');


// Route::get('/year/{year}', [MovieController::class,"episode"])->name('episodes');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//admin
Route::resource('category', CategoryController::class);
Route::post('resorting',[CategoryController::class,'resorting'])->name('resorting');
Route::get('/year-update',[MovieController::class,'yearSelected'])->name('yearSelected');
Route::get('/session-update',[MovieController::class,'SessionChange'])->name('SessionChange');


Route::resource('genre', GenreController::class);
Route::resource('movie', MovieController::class);
Route::resource('country', CountryController::class);
Route::resource('episode', EpisodeController::class);
Route::get('episode-movie',[EpisodeController::class,'episodeMovie'])->name('episodeMovie');


