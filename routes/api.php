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


//Route::middleware( 'auth:api' )->get( '/user', function ( Request $request ) {
//	return $request->user();
//} );


Route::group( [ 'prefix' => 'v1' ], function () {

	//Cadastro
	Route::post( '/cadastro', [ 'as' => 'user.store', 'uses' => 'UserController@store' ] );

	//Login
	Route::post( '/login', [ 'as' => 'login.login', 'uses' => 'LoginController@login' ] );

	//Pokemon
	Route::group( [ 'middleware' => 'auth:api' ], function () {
		Route::get( '/pokemons', [ 'as' => 'pokemon.index', 'uses' => 'PokemonController@index' ] );
		Route::get( '/pokemon/{pokemon}', [ 'as' => 'pokemon.show', 'uses' => 'PokemonController@show' ] );
		Route::post( '/pokemon/add', [ 'as' => 'pokemon.store', 'uses' => 'PokemonController@store' ] );
		Route::put( '/pokemon/{pokemon}', [ 'as' => 'pokemon.update', 'uses' => 'PokemonController@update' ] );
		Route::delete( '/pokemon/{pokemon}', [ 'as' => 'pokemon.destroy', 'uses' => 'PokemonController@destroy' ] );
	} );
} );