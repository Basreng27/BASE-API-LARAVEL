<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comics extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
