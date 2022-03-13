<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class novel extends Model
{
    use HasFactory;

    protected $fillable = [
        'information',
        'sentence'
    ];
}
