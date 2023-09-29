<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Movie
 * 
 * @property int $id
 * @property int $genres_id
 * @property int $types_id
 * @property string $name
 * @property string $banner
 * @property string $cover
 * @property string $sinopsys
 * @property Carbon $release_date
 * @property string $imdb_url
 * @property string $country
 * @property Carbon $lenght
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Genre $genre
 * @property Type $type
 * @property Collection|Cast[] $casts
 * @property Collection|Director[] $directors
 * @property Collection|User[] $users
 * @property Collection|UsersReview[] $users_reviews
 *
 * @package App\Models
 */
class Movie extends Model
{
	protected $table = 'movies';

	protected $casts = [
		'genres_id' => 'int',
		'types_id' => 'int',
		'release_date' => 'datetime',
		'lenght' => 'datetime'
	];

	protected $fillable = [
		'genres_id',
		'types_id',
		'name',
		'banner',
		'cover',
		'sinopsys',
		'release_date',
		'imdb_url',
		'country',
		'lenght'
	];

	public function genre()
	{
		return $this->belongsTo(Genre::class, 'genres_id');
	}

	public function type()
	{
		return $this->belongsTo(Type::class, 'types_id');
	}

	public function casts()
	{
		return $this->belongsToMany(Cast::class, 'movies_has_casts', 'movies_id', 'casts_id')
					->withPivot('id')
					->withTimestamps();
	}

	public function directors()
	{
		return $this->belongsToMany(Director::class, 'movies_has_directors', 'movies_id', 'directors_id')
					->withPivot('id')
					->withTimestamps();
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_has_movies', 'movies_id', 'users_id')
					->withPivot('id', 'watched')
					->withTimestamps();
	}

	public function users_reviews()
	{
		return $this->hasMany(UsersReview::class, 'movies_id');
	}
}
