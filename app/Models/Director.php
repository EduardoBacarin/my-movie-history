<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Director
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
class Director extends Model
{
	protected $table = 'directors';

	protected $fillable = [
		'name',
		'image'
	];

	public function movies()
	{
		return $this->belongsToMany(Movie::class, 'movies_has_directors', 'directors_id', 'movies_id')
					->withPivot('id')
					->withTimestamps();
	}
}
