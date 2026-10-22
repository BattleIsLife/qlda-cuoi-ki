<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeSeriesHistory extends Model
{
    protected $table="like_series_history";

    protected $fillable = [
        'user_id',
        'series_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function series()
    {
        require $this->belongsTo(Series::class, 'series_id');
    }
}
