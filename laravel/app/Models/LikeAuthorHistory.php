<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeAuthorHistory extends Model
{
    protected $table="like_author_history";

    protected $fillable = [
        'user_id',
        'author_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function author()
    {
        require $this->belongsTo(User::class, 'author_id');
    }
}
