<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table ="district";
    protected $fillable=['name','slug'];

    public function area()
    {
        return $this->hasMany(Area::class);
    }
}
