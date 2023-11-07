<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name'];
    protected $table = 'categories';
    public $timestamps = false;

    public function OnlineClass()
    {
        return $this->hasMany(OnlineClass::class);
    }
}
