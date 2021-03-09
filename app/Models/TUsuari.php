<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TUsuari
 * 
 * @property int $id
 * @property string $nom
 * @property string $llinatges
 * @property string $usuari
 * @property Carbon $created_at
 * 
 * @property Collection|TComentari[] $t_comentaris
 * @property Collection|TPost[] $t_posts
 *
 * @package App\Models
 */
class TUsuari extends Model
{
	protected $table = 't_usuari';
	public $timestamps = false;

	protected $fillable = [
		'nom',
		'llinatges',
		'usuari'
	];

	public function t_comentaris()
	{
		return $this->hasMany(TComentari::class, 'idUsuari');
	}

	public function t_posts()
	{
		return $this->hasMany(TPost::class, 'idUsuari');
	}
}
