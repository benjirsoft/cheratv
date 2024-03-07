<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AccountPaidbalance extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'mobilebankingno', 'amount', 'mobiletransecctionno'];







    public function usersids()
    {

        return $this->hasOne(User::class, 'id', 'user_id');

    }
}
