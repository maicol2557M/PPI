<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Responsables extends Model
{
    use HasFactory;

    protected $table = 'responsables';
    protected $primaryKey = 'id_responsables';

    protected $fillable = ['administrador', 'id_cedula'];

    protected $casts = [
        'administrador' => 'boolean',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_cedula');
    }

    public function detalles()
    {
        return $this->hasMany(Detalles::class, 'id_responsables');
    }
}
