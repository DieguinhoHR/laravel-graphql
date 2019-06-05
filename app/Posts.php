<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'title',
        'active',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
