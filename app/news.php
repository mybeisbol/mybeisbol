<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author', 'text', 'imagen_path', 'is_active', 'count_visit', 'resumen', 'update_by', 'id_categories',
    ];
}
