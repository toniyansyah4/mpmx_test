<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    use HasFactory;

    protected $table = 'categorys';

    protected $fillable = [
        'category', 'slug'
    ];
}
