<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rentals';
    protected $fillable = ['user_id', 'car_id', 'rental_date', 'end_date', 'total_price', 'status'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
