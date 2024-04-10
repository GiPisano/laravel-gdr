<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function characters()
    {
        return $this->hasMany(Characters::class);
    }
    use HasFactory;
}
