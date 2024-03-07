<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlyingSubscriber extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'referid', 'email', 'mobileno', 'packages_id', 'paymentmethod', 'sendernumber', 'transecctionno', 'status'];







    public function Package()
    {

        return $this->hasOne(Package::class, 'id', 'packages_id');

    }
}
