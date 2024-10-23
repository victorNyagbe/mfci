<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'description',
        'file'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($article) {
            $article->slug = $article->generateSlug($article->title);
            $article->save();
        });
    }

    private function generateSlug($title)
    {
        $slug = Str::slug($title);

        if (static::where("slug", $slug)->exists()) {
            $max = static::whereName($title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
