<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Triangle extends Model
{
    use HasFactory;

    protected $table = "triangle";
    protected $fillable = [
        'area',
        'base',
        'height'
    ];
}
