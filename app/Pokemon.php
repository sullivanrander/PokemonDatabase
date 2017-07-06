<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nome', 'tipo', 'ataque', 'defesa', 'agilidade'
	];

	public $rules = [
		'nome' => 'required|max:255',
		'tipo' => 'required|max:255',
		'ataque' => 'required|max:255',
		'defesa' => 'required|max:255',
		'agilidade' => 'required|max:255'
	];
}
