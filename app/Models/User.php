<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{ 
    use HasFactory;

    public function subscriptions()
{
    return $this->hasMany(Subscription::class, 'user_id', 'user_id');
}

}
