<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MoviesHasCast
 * 
 * @property int $id
 * @property int $movies_id
 * @property int $casts_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cast $cast
 * @property Movie $movie
 *
 * @package App\Models
 */
class MoviesHasCast extends Model
{
	protected $table = 'movies_has_casts';

	protected $casts = [
		'movies_id' => 'int',
		'casts_id' => 'int'
	];

	protected $fillable = [
		'movies_id',
		'casts_id'
	];

	public function cast()
	{
		return $this->belongsTo(Cast::class, 'casts_id');
	}

	public function movie()
	{
		return $this->belongsTo(Movie::class, 'movies_id');
	}
}
