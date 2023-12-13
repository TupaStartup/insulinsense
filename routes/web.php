<?php

use Illuminate\Support\Facades\Route;
use resources\css;

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
    return view('index');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/consultas', function () {
    return view('consultas');
});

Route::get('/pacientes', function () {
    return view('pacientes');
});

Route::get('/novaconsulta', function () {
    return view('novaconsulta');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/login', function () {
    return view('login');
});