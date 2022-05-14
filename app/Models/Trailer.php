<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    
    protected $table = 'trailers';
    protected $primaryKey = 'id';
    protected $fillable = ['kubatura', 'waga', 'liczba_osi', 'szerokosc', 'dlugosc', 'wysokosc', 'dostepnosc'];
    public $timestamps = false;
}


