<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class novels extends Model
{
    use HasFactory;

    protected $primaryKey = 'novel_id';

    protected $fillable = [
        'user_id',
        'novel_title',
        'novel_information',
    ];

    public function novel_info()
    {
        //　複数持てる
        return $this->hasMany(novel_info::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}