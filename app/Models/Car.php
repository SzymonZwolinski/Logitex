<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = ['marka', 'model', 'dopuszczalna_masa', 'P_dostepnosc'];
    public $timestamps = false;
}
