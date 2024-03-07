<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'sponsor_id', 'packages_id', 'mobileNo', 'label'];







    public function Package()
    {

        return $this->hasOne(Package::class, 'id', 'packages_id');

    }

    public function usermail()
    {

        return $this->hasOne(User::class, 'id', 'user_id');

    }


}
