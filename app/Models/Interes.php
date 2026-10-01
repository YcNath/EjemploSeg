<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Interes extends Model
{
    use HasFactory;

    protected $table = 'interes';

    protected $fillable = ['nombre', 'descripcion'];

    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class);
    }
}
