<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
            'rating_value',
        ];

    public function onlineClass()
    {
        return $this->belongsTo(OnlineClass::class);
    }
}
