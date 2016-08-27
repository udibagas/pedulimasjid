<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    const STATUS_UNREAD = 0;
    const STATUS_READ = 1;
    const STATUS_REPLIED = 2;

    public $fillable = ['name', 'email', 'subject', 'body', 'status'];

    public function outbox()
    {
        return $this->hasOne('App\Outbox');
    }

    public function scopeUnread($query)
    {
        return $query->where('status', self::STATUS_UNREAD);
    }

    public function scopeRead($query)
    {
        return $query->where('status', self::STATUS_READ);
    }

    public function scopeReplied($query)
    {
        return $query->where('status', self::STATUS_REPLIED);
    }
}
