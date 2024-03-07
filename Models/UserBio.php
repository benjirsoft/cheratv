<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserBio extends Model
{
    use HasFactory;

    protected $fillable =['user_id', 'description', 'image'];













    public function username()
    {

        return $this->hasOne(User::class, 'id', 'user_id');

    }
}
