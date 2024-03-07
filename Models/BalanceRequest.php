<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceRequest extends Model
{
    use HasFactory;

    protected $fillable = ['receivenumber', 'paymentmethod', 'user_id', 'amount', 'sendernumber', 'transection', 'status'];
}
