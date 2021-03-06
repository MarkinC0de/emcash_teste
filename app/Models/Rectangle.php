<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rectangle extends Model
{
    use HasFactory;

    protected $table = "rectangle";
    protected $fillable = [
        'area',
        'length',
        'width'
    ];
}
