<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class novel_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'novel_id',
        'sentence',
        'information',
        'page',
    ];
}
