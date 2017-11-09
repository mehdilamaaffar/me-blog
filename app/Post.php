<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'content',
        'meta_description',
        'is_draft',
    ];

    protected $dates = ['deleted_at'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public static function posts($where = null)
    {
        if (! is_null($where)) {
            list($column, $value) = $where;

            return static::with(['author', 'category'])
                         ->where($column, $value)
                         ->paginate(5);
        }

        return static::with(['author', 'category'])->paginate(5);
    }

    public function getContentExcerptAttribute()
    {
        return str_limit($this->content, 300);
    }
}
