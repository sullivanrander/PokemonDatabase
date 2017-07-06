<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

	private $request;
	private $user;

	/**
	 * UserController constructor.
	 *
	 * @param $request
	 * @param $user
	 */
	public function __construct(Request $request, User $user ) {
		$this->request = $request;
		$this->user    = $user;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
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
		$fields = [
			'name' => $this->request->nome,
			'email' => $this->request->email,
			'password' => $this->request->senha,
		];

		$validator = Validator( $fields, $this->user->rules );

		if ( $validator->fails() ) {
			return response()->json( [
				'status' => 'Erro na validação dos campos!',
				'errors' => $validator->errors()
			], 400 );
		} else {
			$createUser = $this->user->create( [
				'name'       => $this->request->nome,
				'email'      => $this->request->email,
				'password'   => bcrypt( $this->request->senha ),
				'api_token'  => str_random(60),
			] );

			if ( $createUser ) {
				return $createUser;
			} else {
				return response()->json( [
					'status' => 'Erro ao criar o Usuário!'
				], 500 );
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}
}
