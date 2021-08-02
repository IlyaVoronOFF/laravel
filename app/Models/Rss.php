<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rss extends Model
{
    protected $table = 'resourses';

    protected $fillable = [
        'id',
        'name',
        'url',
    ];
}
