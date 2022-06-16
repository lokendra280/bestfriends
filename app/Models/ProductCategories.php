<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SoftDeletes;
class ProductCategories extends Model
{
    use HasFactory;
    
    
    protected $table = "product_categories";
    protected $fillable = ['title','description','icon'];
    public function product()
    {
        $this->belongsTo(ProductCategories::class);
    }
}
