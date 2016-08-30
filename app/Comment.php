<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static function typeList()
	{
		return [
			'post' => 'post',
			'masjid' => 'masjid',
		];
	}

	protected $fillable = [
		'name', 'email', 'commentable_id', 'title', 'content',
		'star', 'commentable_type', 'parent_id', 'approved'
	];


	public function commentable()
	{
		return $this->morphTo();
	}

    public function parent()
	{
		return $this->belongsTo('App\Comment', 'parent_id', 'id');
	}

	public function scopeOfType($query, $type)
	{
		return $query->where('commentable_type', $type);
	}

	public function scopeApproved($query)
	{
		return $query->where('approved', 1);
	}

	public function scopeUnapproved($query)
	{
		return $query->where('approved', 0);
	}
}
