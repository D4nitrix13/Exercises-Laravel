<?php

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

Route::get('/ejercicio1', function () {
    return "GET OK";
});

Route::post('/ejercicio1', function () {
    return "POST OK";
});

Route::post(
    "/ejercicio2/a",
    fn(Request $request) => $request
);


Route::post(
    "/ejercicio2/b",
    function (Request $request) {
        if (
            !isset($request["price"])
        ) return Response::json(["message" => "The price Field Is Not Present In Json"]);

        # https://stackoverflow.com/questions/17981723/how-to-write-a-php-ternary-operator
        return ($request["price"] <= 0) ? Response::json(["message" => "Price can't be less than 0"])->setStatusCode(422) : $request;
    }
);

# https://stackoverflow.com/questions/38737019/laravel-get-query-string
# https://stackoverflow.com/questions/6490482/are-there-dictionaries-in-php
Route::post("/ejercicio2/c", function (Request $request) {
    $precioOriginal = $request->get("price");
    if (!is_numeric($precioOriginal) || $precioOriginal < 0) {
        return Response::json(["message" => "Invalid or missing price"])->assertStatus(400);
    }

    $descuentos = [
        "SAVE5" => 5,
        "SAVE10" => 10,
        "SAVE15" => 15
    ];

    $codigoDescuento = $request->query("discount");
    $descuentoAplicado = $descuentos[$codigoDescuento] ?? 0;
    $precioFinal = round($precioOriginal * (100 - $descuentoAplicado) / 100, 2);

    return Response::json([
        "name" => $request->input("name", "Unknown"),
        "description" => $request->input("description", "No description"),
        "price" => $precioFinal,
        "discount" => $descuentoAplicado
    ]);
});
