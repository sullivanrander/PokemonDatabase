<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller {
	private $request;
	private $pokemon;

	/**
	 * PokemonController constructor.
	 *
	 * @param $pokemon
	 */
	public function __construct( Request $request, Pokemon $pokemon ) {
		$this->request = $request;
		$this->pokemon = $pokemon;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return $this->pokemon->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$validator = Validator( $this->request->all(), $this->pokemon->rules );

		if ( $validator->fails() ) {
			return response()->json( [
				'status' => 'Erro na validação dos campos!',
				'errors' => $validator->errors()
			], 400 );
		} else {
			$createPokemon = $this->pokemon->create( [
				'nome'      => $this->request->nome,
				'tipo'      => $this->request->tipo,
				'ataque'    => $this->request->ataque,
				'defesa'    => $this->request->defesa,
				'agilidade' => $this->request->agilidade,
			] );

			if ( $createPokemon ) {
				return $createPokemon;
			} else {
				return response()->json( [
					'status' => 'Erro ao criar o Pokemon!'
				], 500 );
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Pokemon $pokemon
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( Pokemon $pokemon ) {
		return $pokemon;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Pokemon $pokemon
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Pokemon $pokemon ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Pokemon $pokemon
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Pokemon $pokemon ) {
		$validator = Validator( $this->request->all(), $this->pokemon->rules );

		if ( $validator->fails() ) {
			return response()->json( [
				'status' => 'Erro na validação dos campos!',
				'errors' => $validator->errors()
			], 400 );
		} else {
			$updatePokemon = $pokemon->update( [
				'nome'      => $this->request->nome,
				'tipo'      => $this->request->tipo,
				'ataque'    => $this->request->ataque,
				'defesa'    => $this->request->defesa,
				'agilidade' => $this->request->agilidade,
			] );

			if ( $updatePokemon ) {
				return $pokemon;
			} else {
				return response()->json( [
					'status' => 'Erro ao alterar o Pokemon!'
				], 500 );
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Pokemon $pokemon
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Pokemon $pokemon ) {
		$destroyPokemon = $pokemon->delete();

		if ( $destroyPokemon ) {
			return response()->json( [
				'status' => 'Pokemon deletado com sucesso!'
			] );
		} else {
			return response()->json( [
				'status' => 'Erro ao deleltar o Pokemon!'
			], 500 );
		}
	}
}
