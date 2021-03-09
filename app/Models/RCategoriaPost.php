<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RCategoriaPost
 * 
 * @property int $idPost
 * @property int $idCategoria
 * 
 * @property ACategorium $a_categorium
 * @property TPost $t_post
 *
 * @package App\Models
 */
class RCategoriaPost extends Model
{
	protected $table = 'r_categoria_post';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idPost' => 'int',
		'idCategoria' => 'int'
	];

	protected $fillable = [
		'idPost',
		'idCategoria'
	];

	public function a_categorium()
	{
		return $this->belongsTo(ACategorium::class, 'idCategoria');
	}

	public function t_post()
	{
		return $this->belongsTo(TPost::class, 'idPost');
	}
}
