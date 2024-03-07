<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    use HasFactory;


    protected $fillable = ['sender_id', 'receiver_id', 'amount'];




    public function transectionview()
    {

        return $this->hasMany(Transection::class, 'sender_id', 'id');

    }

    public function balancetransection()
    {

        return $this->hasMany(Transection::class, 'receiver_id', 'id');

    } 

    
}
