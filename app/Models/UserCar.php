<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCar extends Model
{
    use HasFactory;

    protected $table = 'user_car';  // Nama tabel yang baru

    protected $fillable = [
        'user_id', 'car_id', 'status', // Kolom yang ada di tabel user_car
    ];

    // Relasi dengan model Rental
    public function rentals()
    {
        return $this->hasMany(Rental::class, 'user_id');  // Relasi dengan rentals berdasarkan user_id
    }

    // Relasi dengan model Car (mungkin UserCar adalah tabel penghubung antara User dan Car)
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
