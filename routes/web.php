<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Page\BikePageController;
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


Route::get('/bikes', [BikePageController::class, 'index'])->name('bikes.index');
Route::get('/bikes/create', [BikePageController::class, 'create'])->name('bikes.create');
Route::get('/bikes/{bike}', [BikePageController::class, 'show'])->name('bikes.show');
Route::get('/bikes/{bike}/edit', [BikePageController::class, 'edit'])->name('bikes.edit');









// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about',function () {
//     return '<h1>About Page</h1>';
// });

// Route::get('/store',function () {
//     $category = request('category');
//     return $category. '현재 스토어를 보고 있습니다.';
// });

// 위처럼 하면 category 파라미터에 script 태그 입력 가능성
// ex ) http://127.0.0.1:8000/store?category=<script>alert('hello')</script>
// strip_tags($category) => category 매개변수에 입력된 태그를 제외해줌

// Route::get('/store',function () {
//     $category = request('category');
//     return strip_tags($category). '현재 스토어를 보고 있습니다.';
// });
// http://127.0.0.1:8000/store?category=<script>alert('hello')</script> 
// alert('hello')현재 스토어를 보고 있습니다.

// Route::get('/store',function () {
//     $category = request('category');
//     if (isset($category)) {
//         return  '현재 스토어에서 '.strip_tags($category).' 카테고리를 보고 있습니다.';
//     } else {
//         return '현재 스토어에서 모든 제품을 보고 있습니다.';
//     }
// });

// $category, $item 값이 다 있어야 함
// Route::get('/store/{category}/{item}', function($category, $item){
//     if (isset($category)) {
//         if (isset($item)) {
//             return  '현재 스토어에서 '.strip_tags($category).' 내 '. $item.' 카테고리를 보고 있습니다.';
//         } else {
//             return  '현재 스토어에서 '.strip_tags($category).' 카테고리를 보고 있습니다.';
//         }
//     } else {
//         return '현재 스토어에서 모든 제품을 보고 있습니다.';
//     }
// });

// Route::get('/store/{category?}/{item?}', function($category=null, $item=null){
//     if (isset($category)) {
//         if (isset($item)) {
//             return  '현재 스토어에서 '.strip_tags($category).' 내 '. $item.' 카테고리를 보고 있습니다.';
//         } else {
//             return  '현재 스토어에서 '.strip_tags($category).' 카테고리를 보고 있습니다.';
//         }
//     } else {
//         return '현재 스토어에서 모든 제품을 보고 있습니다.';
//     }
// });

// Route::get('/contact',function () {
//     return '<h1>contact Page</h1>';
// });

// Route::get('/', [HomeController::class, 'index']);
// Route::get('/about', [HomeController::class, 'about']);
// Route::get('/about/about', [HomeController::class, 'about']);
// Route::get('/contact', [HomeController::class, 'contact']);

// 이름 지정
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

// html에서 laravel 함수 사용 하고 싶으면 {{ }} 쌍중괄호 안에

// Route::get('/bikes', [BikeController::class, 'index'])->name('bikes.index');
// Route::resource('bikes',BikeController::class);