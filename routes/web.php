<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoiaController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\MarcaController;

Route::get('/', function () { //'Route::get('/')' = Define uma rota ('/') para direcionar solicitações HTTP para o código correspondente que deve ser executado. 
  return view('welcome'); // função que está retornando a view 'welcome' como resposta para a solicitação GET da rota '/'.
});

Route::resource('joia', JoiaController::class); //(--resource)cria várias rotas para um recurso em um único comando.
Route::post('/joia/search', [JoiaController::class, "search"])->name('joia.search');

Route::resource('venda', VendaController::class);
Route::post('/venda/search', [VendaController::class, "search"])->name('venda.search');

Route::resource('marca', MarcaController::class);
Route::post('/marca/search', [MarcaController::class, "search"])->name('marca.search');
