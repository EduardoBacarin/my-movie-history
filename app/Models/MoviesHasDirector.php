<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MoviesHasDirector
 * 
 * @property int $id
 * @property int $movies_id
 * @property int $directors_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Director $director
 * @property Movie $movie
 *
 * @package App\Models
 */
class MoviesHasDirector extends Model
{
	protected $table = 'movies_has_directors';

	protected $casts = [
		'movies_id' => 'int',
		'directors_id' => 'int'
	];

	protected $fillable = [
		'movies_id',
		'directors_id'
	];

	public function director()
	{
		return $this->belongsTo(Director::class, 'directors_id');
	}

	public function movie()
	{
		return $this->belongsTo(Movie::class, 'movies_id');
	}
}
