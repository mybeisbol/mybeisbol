<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'title', 'author', 'text', 'image_path', 'published_by', 'update_by', 'count_visit', 'is_published',
    ];
}
