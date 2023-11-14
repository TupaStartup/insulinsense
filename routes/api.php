<?php

use Illuminate\Support\Facades\Route;

// Rotas do CRUD de Pacientes

Route::post('/pacientes/cadastrar', 'App\Http\Controllers\PacientesController@store');
Route::get('/pacientes/editar/{id}', 'App\Http\Controllers\PacientesController@edit');
Route::put('/pacientes/atualizar/{id}', 'App\Http\Controllers\PacientesController@update');
Route::delete('/pacientes/deletar/{id}', 'App\Http\Controllers\PacientesController@destroy');

// Rotas do CRUD de Médicos

Route::post('/medicos/cadastrar', 'App\Http\Controllers\MedicosController@store');
Route::get('/medicos/editar/{id}', 'App\Http\Controllers\MedicosController@edit');
Route::put('/medicos/atualizar/{id}', 'App\Http\Controllers\MedicosController@update');
Route::delete('/medicos/deletar/{id}', 'App\Http\Controllers\MedicosController@destroy');