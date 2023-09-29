<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cast
 * 
 * @property int $id
 * @property string $name
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Movie[] $movies
 *
 * @package App\Models
 */
class Cast extends Model
{
	protected $table = 'casts';

	protected $fillable = [
		'name',
		'image'
	];

	public function movies()
	{
		return $this->belongsToMany(Movie::class, 'movies_has_casts', 'casts_id', 'movies_id')
					->withPivot('id')
					->withTimestamps();
	}
}
