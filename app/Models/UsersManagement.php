<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersManagement extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name','nazwisko' ,'email','password', 'type'];
    public $timestamps = false;
}
