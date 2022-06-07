<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class final_order_location extends Model
{
    
    protected $table = 'final_orders_location';
    protected $primaryKey = 'id';
    protected $fillable = ['id_zamowienia','nadawca', 'kraj','miasto'];
    public $timestamps = false;

}
