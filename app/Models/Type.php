<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 * 
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Movie[] $movies
 *
 * @package App\Models
 */
class Type extends Model
{
	protected $table = 'types';

	protected $fillable = [
		'name',
		'image',
		'description'
	];

	public function movies()
	{
		return $this->hasMany(Movie::class, 'types_id');
	}
}
