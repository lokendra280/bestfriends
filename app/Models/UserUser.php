<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserUser extends Model
{
    use HasFactory;
    protected $table ="user_user";
    protected $fillable =['relationship','since','till'];
    public function user()
    {
      $this->hasMany(UserUser::class);  
    }
    public function relationUser()
    {
        $this->hasMany(UserUser::class);
    }
}
