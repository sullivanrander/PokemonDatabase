<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {
	private $request;
	private $user;

	/**
	 * UserController constructor.
	 *
	 * @param $request
	 * @param $user
	 */
	public function __construct( Request $request, User $user ) {
		$this->request = $request;
		$this->user    = $user;
	}

	public function login( Request $request ) {
		$user = $this->user->where( [
			[ 'email', '=', $this->request->email ],
		] )->get();

		if ( $user->isNotEmpty() ) {
			if ( Hash::check( $this->request->senha, $user->first()->password ) ) {
				$this->resetToken( $user->first() );

				return response()->json( [
					'token' => $user->first()->api_token,
				] );
			} else {
				return response()->json( [
					'status' => 'Senha inválida!'
				], 400 );
			}
		} else {
			return response()->json( [
				'status' => 'Não há usuário cadastrado para o email: ' . $this->request->email
			], 400 );
		}
	}

	public function resetToken( User $user ) {
		return $user->update( [
			'api_token' => str_random( 60 ),
		] );
	}
}
