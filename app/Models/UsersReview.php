<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersReview
 * 
 * @property int $id
 * @property int $users_id
 * @property int $movies_id
 * @property int $stars
 * @property string|null $comment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Movie $movie
 * @property User $user
 *
 * @package App\Models
 */
class UsersReview extends Model
{
	protected $table = 'users_reviews';

	protected $casts = [
		'users_id' => 'int',
		'movies_id' => 'int',
		'stars' => 'int'
	];

	protected $fillable = [
		'users_id',
		'movies_id',
		'stars',
		'comment'
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
