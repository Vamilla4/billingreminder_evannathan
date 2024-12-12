<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'user_id');
}

public function payments()
{
    return $this->hasMany(Payment::class, 'subscription_id', 'subscription_id');
}

public function frequency()
{
    return $this->belongsTo(Frequency::class, 'frequency_id', 'frequency_id');
}
}
