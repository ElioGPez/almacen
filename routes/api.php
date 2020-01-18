<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route to create a new role
Route::post('role', 'JwtAuthenticateController@createRole');
// Route to create a new permission
Route::post('permission', 'JwtAuthenticateController@createPermission');
// Route to assign role to user
Route::post('assign-role', 'JwtAuthenticateController@assignRole');
// Route to attache permission to a role
Route::post('attach-permission', 'JwtAuthenticateController@attachPermission');





Route::middleware('ability:ADMIN,create-users')->group(function () {
    Route::get('categoria/filtro/{filtro}',[
        'uses'  =>  'CategoriaController@filtro',
        'as'    =>  'categoria.filtro',
        ]);
        Route::resource('proveedor','ProveedorController');
        Route::resource('categoria','CategoriaController');
        Route::resource('producto','ProductoController');
        Route::resource('compra','CompraController');
        Route::get('cliente/localidades',[
            'uses'  =>  'ClienteController@localidades',
            'as'    =>  'cliente.localidades',
            ]);    
        Route::resource('cliente','ClienteController');
        Route::get('cuenta/{id}',[
            'uses'  =>  'ClienteController@cuenta',
            'as'    =>  'categoria.cuenta',
            ]);    
        Route::post('pago', 'ClienteController@pago');
        Route::get('venta/informe/{fecha_inicio}/{fecha_fin}', [
            'as' => 'infome',
            'uses' => 'VentaController@obtenerInforme',
        ]);
        Route::get('venta/estadisticas',[
            'uses'  =>  'VentaController@estadistica',
            'as'    =>  'venta.estadistica',
            ]);
        Route::get('venta/productos',[
            'uses'  =>  'VentaController@producto',
            'as'    =>  'venta.producto',
        ]); 
        Route::resource('venta','VentaController');
        // Protected route
    Route::get('users', 'JwtAuthenticateController@index');

});

/*Route::middleware(['ability:ADMIN','create-users'])->group(function () {
    Route::get('users', 'JwtAuthenticateController@index');

});*/
// Authentication route
Route::post('authenticate', 'JwtAuthenticateController@authenticate');
