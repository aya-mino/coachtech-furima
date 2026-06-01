<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mypage/profile', function () {
    return '
        <form method="POST" action="/logout">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <button type="submit">ログアウト</button>
        </form>
    ';
});