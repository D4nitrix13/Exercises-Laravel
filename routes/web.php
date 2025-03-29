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

Route::get('/ejercicio1', function () {
    return "GET OK";
});

Route::post('/ejercicio1', function () {
    return "POST OK";
});

// * Ejercicio 3 [Pipe 1]
// Route::post(
//     uri: "/ejercicio3",
//     action: function (Request $request) {
//         $request->validate(
//             rules: [
//                 'name' => 'required|string|max:64',
//                 'description' => 'required|string|max:512',
//                 'price' => 'required|numeric|min:0.01',
//                 'has_battery' => 'required|boolean',

//                 'battery_duration' => 'required_if:has_battery,true|numeric|min:1',

//                 'colors' => 'required|array',
//                 'colors.*' => 'string',

//                 'dimensions' => 'required|array',
//                 'dimensions.width' => 'required|numeric|min:0.01',
//                 'dimensions.height' => 'required|numeric|min:0.01',
//                 'dimensions.length' => 'required|numeric|min:0.01',
//                 'accessories' => 'required|array',
//                 'accessories.*' => 'required|array',
//                 'accessories.*.name' => 'required|string',
//                 'accessories.*.price' => 'required|numeric|min:0.01',
//             ]

//         );
//         return response()->json(data: [
//             "message" => "Finish"
//         ]);
//     }
// );

// * Ejercicio 3 - Definición de ruta y validación en Laravel [Pipe 2]
// Route::post(
//     uri: "/ejercicio3",
//     action: function (Request $request) {
//         // Alternativa de validación
//         $request->validate([
//             'name' => 'required|string|max:64',
//             'description' => 'required|string|max:512',
//             'price' => 'required|numeric|gt:0',
//             'has_battery' => 'required|boolean',
//             'battery_duration' => 'required_if:has_battery,true|numeric|gt:0',
//             'colors' => 'required|array',
//             'colors.*' => 'required|string',
//             'dimensions' => 'required|array',
//             'dimensions.width' => 'required|numeric|gt:0',
//             'dimensions.length' => 'required|numeric|gt:0',
//             'dimensions.height' => 'required|numeric|gt:0',
//             'accessories' => 'required|array',
//             'accessories.*' => 'required|array',
//             'accessories.*.name' => 'required|string',
//             'accessories.*.price' => 'required|numeric|gt:0',
//         ]);
//     }
// );


// Ejercicio 3 - Definición de ruta y validación en Laravel [List 1]
// Route::post(
//     uri: "/ejercicio3",
//     action: function (Request $request) {
//         // Alternativa de validación
//         $request->validate([
//             'name' => [
//                 'required',  // Campo obligatorio
//                 'string',    // Debe ser una cadena de texto
//                 'max:64'     // Longitud máxima de 64 caracteres
//             ],

//             'description' => [
//                 'required',  // Campo obligatorio
//                 'string',    // Debe ser una cadena de texto
//                 'max:512'    // Longitud máxima de 512 caracteres
//             ],

//             'price' => [
//                 'required',  // Campo obligatorio
//                 'numeric',   // Debe ser un número
//                 'min:0.01'   // Debe ser al menos 0.01
//             ],

//             'has_battery' => [
//                 'required',  // Campo obligatorio
//                 'boolean'    // Debe ser verdadero o falso
//             ],

//             'battery_duration' => [
//                 'required_if:has_battery,true',  // Obligatorio si has_battery es true
//                 'numeric',   // Debe ser un número
//                 'min:1'      // Debe ser al menos 1
//             ],

//             'colors' => [
//                 'required',  // Campo obligatorio
//                 'array'      // Debe ser un array
//             ],
//             'colors.*' => [
//                 'string'     // Cada elemento del array debe ser una cadena de texto
//             ],

//             'dimensions' => [
//                 'required',  // Campo obligatorio
//                 'array'      // Debe ser un array
//             ],
//             'dimensions.width' => [
//                 'required',  // Campo obligatorio
//                 'numeric',   // Debe ser un número
//                 'min:0.01'   // Debe ser al menos 0.01
//             ],
//             'dimensions.height' => [
//                 'required',
//                 'numeric',
//                 'min:0.01'
//             ],
//             'dimensions.length' => [
//                 'required',
//                 'numeric',
//                 'min:0.01'
//             ],

//             'accessories' => [
//                 'required',  // Campo obligatorio
//                 'array'      // Debe ser un array
//             ],
//             'accessories.*' => [
//                 'required',  // Cada accesorio debe ser un array
//                 'array'
//             ],
//             'accessories.*.name' => [
//                 'required',  // Campo obligatorio
//                 'string'     // Debe ser una cadena de texto
//             ],
//             'accessories.*.price' => [
//                 'required',  // Campo obligatorio
//                 'numeric',   // Debe ser un número
//                 'min:0.01'   // Debe ser al menos 0.01
//             ],
//         ]);
//     }
// );


// Ejercicio 3 - Definición de ruta y validación en Laravel [List 1]
Route::post(
    uri: "/ejercicio3",
    action: function (Request $request) {
        // Alternativa de validación
        $request->validate([
            'name' => ['required', 'string', 'max:64'],
            'description' => ['required', 'string', 'max:512'],
            'price' => ['required', 'numeric', 'gt:0'],
            'has_battery' => ['required', 'boolean'],
            'battery_duration' => ['required_if:has_battery,true', 'numeric', 'gt:0'],
            'colors' => ['required', 'array'],
            'colors.*' => ['required', 'string'],
            'dimensions' => ['required', 'array'],
            'dimensions.width' => ['required', 'numeric', 'gt:0'],
            'dimensions.length' => ['required', 'numeric', 'gt:0'],
            'dimensions.height' => ['required', 'numeric', 'gt:0'],
            'accessories' => ['required', 'array'],
            'accessories.*' => ['required', 'array'],
            'accessories.*.name' => ['required', 'string'],
            'accessories.*.price' => ['required', 'numeric', 'gt:0'],
        ]);
    }
);
