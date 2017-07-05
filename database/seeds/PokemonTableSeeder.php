<?php

use Illuminate\Database\Seeder;

class PokemonTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//Aiden Mercer
		//https://www.youtube.com/user/aiMercer
		//You can run this locally using MAMP/XAMP.
		//You do not need to change anything except where it says: "Make sure to use the same names for columns" and the MYSQL username/password/Database Name/and Table
		//2014

		//Port to Laravel 5 seed database by Sullivan Rander

		$pokemonName       = null;
		$pokemonType       = null;
		$pokemonType2      = null;
		$pokemonAbility    = null;
		$pokemonAbility22  = null;
		$pokemonAbility33  = null;
		$pokemonAbility44  = null;
		$pokemonImage      = null;
		$pokemonWeight     = null;
		$pokemonSpeed      = null;
		$pokemonSpD        = null;
		$pokemonSpA        = null;
		$pokemonHP         = null;
		$pokemonEvolutions = null;
		$pokemonAttack     = null;
		$pokemonDefense    = null;
		$pokemonSpeed      = null;
		$pokemonHeight     = null;
		$pokemonCounter    = 1;
		$pokemonQuantity   = 718;

		while ( $pokemonCounter <= $pokemonQuantity ) {
			$pokeGET2 = ( 'http://pokeapi.co/api/v1/pokemon/' . $pokemonCounter . '/' );

			try {
				$pokeread    = file_get_contents( $pokeGET2 );
				$pokeConvert = json_decode( $pokeread, true );

				$pokemonName = $pokeConvert['name'];
				echo 'Pokemon: ' . $pokemonCounter . ' ' . $pokemonName . "\n";

				$pokemonAbility   = isset( $pokeConvert['abilities'][0]['name'] ) ? $pokeConvert['abilities'][0]['name'] : null;
				$pokemonAbility22 = isset( $pokeConvert['abilities'][1]['name'] ) ? $pokeConvert['abilities'][1]['name'] : null;
				$pokemonAbility33 = isset( $pokeConvert['abilities'][2]['name'] ) ? $pokeConvert['abilities'][2]['name'] : null;
				$pokemonAbility44 = isset( $pokeConvert['abilities'][3]['name'] ) ? $pokeConvert['abilities'][3]['name'] : null;
				$pokemonType      = isset( $pokeConvert['types'][0]['name'] ) ? $pokeConvert['types'][0]['name'] : null;
				$pokemonType2     = isset( $pokeConvert['types'][1]['name'] ) ? $pokeConvert['types'][1]['name'] : null;
			} catch ( Exception $e ) {
				echo 'erro no ' . $pokemonCounter . '\n';
				echo $e->getMessage() . '\n';
			};

			$pokemonHP      = $pokeConvert['hp'];
			$pokemonAttack  = $pokeConvert['attack'];
			$pokemonSpA     = $pokeConvert['sp_atk'];
			$pokemonDefense = $pokeConvert['defense'];
			$pokemonSpD     = $pokeConvert['sp_def'];
			$pokemonWeight  = $pokeConvert['weight'];
			$pokemonSpeed   = $pokeConvert['speed'];
			$pokemonHeight  = $pokeConvert['height'];

			DB::table( 'pokemon' )->insert( [
				'name'      => $pokemonName,
				'type'      => $pokemonType,
				'type2'     => $pokemonType2,
				'height'    => $pokemonHeight,
				'weight'    => $pokemonWeight,
				'ability1'  => $pokemonAbility,
				'ability2'  => $pokemonAbility22,
				'ability3'  => $pokemonAbility33,
				'ability4'  => $pokemonAbility44,
				'hp'        => $pokemonHP,
				'attack'    => $pokemonAttack,
				'defense'   => $pokemonDefense,
				'spattack'  => $pokemonSpA,
				'spdefense' => $pokemonSpD,
				'speed'     => $pokemonSpeed,
			] );

			//Used in while look and requests.
			$pokemonCounter ++;

			//Reset variables.
			$pokemonType    = null;
			$pokemonAbility = null;
		}
	}
}
