<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'content',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
