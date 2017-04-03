<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_article', 'id_category',
    ];
}
