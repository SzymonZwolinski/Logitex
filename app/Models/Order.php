<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['ladunek', 'waga','trailer'];
    public $timestamps = false;
}


