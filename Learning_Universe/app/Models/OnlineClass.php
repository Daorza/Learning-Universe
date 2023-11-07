<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineClass extends Model
{
    use HasFactory;

    protected $table = 'online_classes';
    protected $fillable = [
        'class_title',
        'class_description',
        'class_price',
        'class_picture',
        'category_id',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
