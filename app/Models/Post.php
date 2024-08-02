<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'body',
        'image',
        'slug',
        'statatus'
    ];

    /**
     * Get the user that owns the post.
     * @return \App\Models\User The related user model.
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
