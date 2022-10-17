<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News\Categorys;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title', 'slug', 'content', 'banner', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Categorys::class);
    }
}
