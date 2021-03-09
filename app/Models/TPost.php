<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TPost
 * 
 * @property int $id
 * @property string $titol
 * @property string $imatge
 * @property string $descripcio
 * @property string $contingut
 * @property int $idUsuari
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TUsuari $t_usuari
 * @property RCategoriaPost $r_categoria_post
 * @property Collection|TComentari[] $t_comentaris
 *
 * @package App\Models
 */
class TPost extends Model
{
	protected $table = 't_post';

	protected $casts = [
		'idUsuari' => 'int'
	];

	protected $fillable = [
		'titol',
		'imatge',
		'descripcio',
		'contingut',
		'idUsuari'
	];

	public function t_usuari()
	{
		return $this->belongsTo(TUsuari::class, 'idUsuari');
	}

	public function r_categoria_post()
	{
		return $this->hasOne(RCategoriaPost::class, 'idPost');
	}

	public function t_comentaris()
	{
		return $this->hasMany(TComentari::class, 'idPost');
	}
}
