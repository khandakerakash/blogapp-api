<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 */
class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'post_id',
        'name',
        'image',
        'description'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_id');
    }
}
