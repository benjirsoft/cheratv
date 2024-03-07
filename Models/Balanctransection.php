<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Profile;

class Balanctransection extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'transectionid', 'amount', 'status'];


    public function usersid()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function usersno()
    {
        return $this->hasOne(Profile::class, 'user_id', 'user_id');
    }
}
