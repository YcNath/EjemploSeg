<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interes extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'descripcion'];
    
    public function personas()
    {
        return $this->belongsToMany(persona::class);
    }
}
