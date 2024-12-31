<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{ 
    use HasFactory;
    protected $primaryKey = 'user_id';

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'name',       // User's name
        'login',      // User's email/login
        'password',   // User's password
    ];

    // Define the relationship with subscriptions
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'user_id', 'user_id');
    }
}
