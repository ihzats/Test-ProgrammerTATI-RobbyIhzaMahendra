<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $fillable=[
        'code',
        'name',
        'coordinate',
        'google_place_id'
    ];
    protected $casts = [
        'coordinates' => 'array'
    ];
}