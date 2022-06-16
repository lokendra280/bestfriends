<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    use HasFactory;
    protected $table = "user_meta";
    protected $fillable = ['value'];
    public function attributeMeta()
    {
        $this->belongsTo(UserMeta::class);
    }
    public function user()
    {
      $this->hasMany(UserMeta::class);  
    }
}
