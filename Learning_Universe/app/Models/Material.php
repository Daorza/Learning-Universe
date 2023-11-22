<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';
    protected $fillable = [
        'material_title',
        'material_description',
    ];

    public function OnlineClasses()
    {
        return $this->belongsTo(OnlineClass::class, 'online_Class_id', 'id');
    }
}
