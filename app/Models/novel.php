<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class novel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'novel_title',
        'information',
    ];

    public function novel_info()
    {
        //　複数持てる
        return $this->hasMany(novel_info::class);
    }
}
