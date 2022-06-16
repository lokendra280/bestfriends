<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeMeta extends Model
{
    use HasFactory;
    protected $table ="attribute_meta";
    protected $fillable=['key','type','josn','display_name'];
    public function productAttribute()
    {
       return $this->belongsTo(ProductAttribute::class);
    }
}
