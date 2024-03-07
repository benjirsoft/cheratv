<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outsource extends Model
{
    use HasFactory;
    
    protected $fillable = ['linkid', 'user_id', 'image', 'category', 'status'];
}
