<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserHasMovie
 * 
 * @property int $id
 * @property int $users_id
 * @property int $movies_id
 * @property bool $watched
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Movie $movie
 * @property User $user
 *
 * @package App\Models
 */
class UserHasMovie extends Model
{
	protected $table = 'user_has_movies';

	protected $casts = [
		'users_id' => 'int',
		'movies_id' => 'int',
		'watched' => 'bool'
	];

	protected $fillable = [
		'users_id',
		'movies_id',
		'watched'
	];

	public function movie()
	{
		return $this->belongsTo(Movie::class, 'movies_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
