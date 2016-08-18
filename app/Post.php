<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_ARCHIVED = 2;
    const TYPE_POST = 0;
    const TYPE_PAGE = 1;

    public $fillable = [
        'title', 'content', 'type',
        'status', 'user_id', 'img', 'category_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', self::STATUS_DRAFT);
    }

    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISHED);
    }

    public function scopeArchived($query)
    {
        return $query->where('status', self::STATUS_ARCHIVED);
    }

    public function scopePage($query)
    {
        return $query->where('type', self::TYPE_PAGE);
    }

    public function scopePost($query)
    {
        return $query->where('type', self::TYPE_POST);
    }
}
