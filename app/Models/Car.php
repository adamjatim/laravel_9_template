<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand', 'image', 'year', 'price'];

    public function owners()
    {
        return $this->belongsToMany(User::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
