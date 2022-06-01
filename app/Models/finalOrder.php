<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalOrder extends Model
{
    
    protected $table = 'final_orders';
    protected $primaryKey = 'id';
    protected $fillable = ['id_naczepy','id_pojazdu','id_zamowienia','waga','ilosc_ladunku',];
    const CREATED_AT = 'data_dodania';
}


