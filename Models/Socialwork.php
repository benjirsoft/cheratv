<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialwork extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'category', 'qty', 'amount', 'link', 'user_id', 'description'];
    
    
    
    public function outsource() {
        
        return $this->belongsTo(Outsource::class, 'user_id', 'id');
    }
}
