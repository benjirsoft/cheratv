<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SubscriberRequestwidthrawal extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount', 'mobilebankingno', 'pin', 'transectionid'];



    public function userprofile()
    {


        return $this->hasOne(User::class, 'id', 'user_id');

    }

}
