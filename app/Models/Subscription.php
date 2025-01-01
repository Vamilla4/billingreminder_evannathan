<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk',
        'harga',
        'due_date',
        'frequency_id',
        'user_id', // Ensure 'user_id' is fillable
    ];
    
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
public function getRouteKeyName()
{
    return 'subscription_id'; // Use 'subscription_id' as the route key for binding
}


}
