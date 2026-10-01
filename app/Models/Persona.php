<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'email'];

    public function intereses(): BelongsToMany
    {
        return $this->belongsToMany(Interes::class);
    }
}
