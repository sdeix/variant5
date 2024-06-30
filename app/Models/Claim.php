<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'engincapacity',
        'releasedate',
        'model',
        'client',
        'active'
    ];
    public $timestamps = false;
}
