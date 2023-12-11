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

// Rotas do CRUD de Consultas
Route::post('/consultas/cadastrar', 'App\Http\Controllers\ConsultasController@store');
Route::get('/consultas/editar/{id}', 'App\Http\Controllers\ConsultasController@edit');
Route::put('/consultas/atualizar/{id}', 'App\Http\Controllers\ConsultasController@update');
Route::delete('/consultas/deletar/{id}', 'App\Http\Controllers\ConsultasController@destroy');

// Rotas do CRUD de Dados Clínicos
Route::post('/dados-clinicos/cadastrar', 'App\Http\Controllers\DadosClinicosController@store');
Route::get('/dados-clinicos/editar/{id}', 'App\Http\Controllers\DadosClinicosController@edit');
Route::put('/dados-clinicos/atualizar/{id}', 'App\Http\Controllers\DadosClinicosController@update');
Route::delete('/dados-clinicos/deletar/{id}', 'App\Http\Controllers\DadosClinicosController@destroy');

// Rotas para Cálculo de Sensibilidade Insulínica
Route::post('/dados-clinicos/calculo/t1d', 'App\Http\Controllers\DadosClinicosController@calculo')->name("t1d");
Route::post('/dados-clinicos/calculo/t1d-nonfasting', 'App\Http\Controllers\DadosClinicosController@calculo')->name("t1d-nonfasting");
Route::post('/dados-clinicos/calculo/t1d-exAdiponectina', 'App\Http\Controllers\DadosClinicosController@calculo')->name("t1d-exAdiponectina");
Route::post('/dados-clinicos/calculo/nonDiabetic', 'App\Http\Controllers\DadosClinicosController@calculo')->name("nonDiabetic");
Route::post('/dados-clinicos/calculo/nonDiabetic-nonfasting', 'App\Http\Controllers\DadosClinicosController@calculo')->name("nonDiabetic-nonfasting");
Route::post('/dados-clinicos/calculo/nonDiabetic-exAdiponectina', 'App\Http\Controllers\DadosClinicosController@calculo')->name("nonDiabetic-exAdiponectina");

