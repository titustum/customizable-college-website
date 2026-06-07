<?php

namespace App\Models;

use App\Models\Traits\BelongsToInstitution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsCategory extends Model
{
    use BelongsToInstitution, HasFactory;

    protected $fillable = [
        'institution_id',
        'name',
        'slug',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $slug = Str::slug($category->name);

            $count = static::where('slug', 'LIKE', "{$slug}%")->count();

            $category->slug = $count
                ? "{$slug}-".($count + 1)
                : $slug;
        });
    }

    public function newsItems()
    {
        return $this->hasMany(NewsItem::class, 'news_category_id');
    }
}
