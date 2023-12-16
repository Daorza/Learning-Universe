<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail_title',
        'detail_subtitle',
        'detail_text',
        'detail_image',
        'material_id',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }
}
