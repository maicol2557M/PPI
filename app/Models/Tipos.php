<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tipos extends Model
{
    use HasFactory;

    protected $table = 'tipos';
    protected $primaryKey = 'id_tipos';

    protected $fillable = ['nombre_tipos'];

    public function usuarios()
    {
        return $this->hasMany(User::class, 'id_tipos');
    }

    public function procesos()
    {
        return $this->hasMany(Procesos::class, 'id_tipos');
    }
}
