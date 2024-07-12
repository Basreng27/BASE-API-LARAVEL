<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    // public function comics()
    // {
    //     return $this->belongsTo(Comics::class);
    // }
}
