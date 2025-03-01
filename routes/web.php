<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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

// Ejercicio 1

// Crea 5 Rutas Distintas Cuya URI Sea /Ejercicio1 Pero El Método Http Sea Cada Uno De Los Siguientes:
//     • GET
//     • POST
//     • PUT
//     • PATCH
//     • DELETE

// Cuando El Servidor Recibe Una Petición A Esa Ruta, Debe Devolver Una Respuesta En Texto Plano Con El Nombre Del Método Seguido De Ok. Por Ejemplo, La Petición Post /Ejercicio1 Debe Devolver POST OK, Y Así Sucesivamente.

Route::get('/ejercicio1', function () {
    return "GET OK";
});

Route::post('/ejercicio1', function () {
    return "POST OK";
});

Route::put('/ejercicio1', function () {
    return "PUT OK";
});

Route::patch('/ejercicio1', function () {
    return "PATCH OK";
});

Route::delete('/ejercicio1', function () {
    return "DELETE OK";
});
