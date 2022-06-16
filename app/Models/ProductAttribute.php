<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $table = "product_attribute";
    protected $fillable = ['key','value'];

    public function product()
    {
        $this->hasMany(ProductAttribute::class);
    }
    public function attributeMeta()
    {
        $this->hasMany(ProductAttribute::class);
    }
}
