<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Area extends Model
{
    use HasFactory;
    protected $table ="district";
    protected $fillable=['name','slug'];
    public function area()
    {
       return $this->belongsTo(District::class);
    }
    public function user()
    {
         return $this->hasMany(User::class);
    }
}
