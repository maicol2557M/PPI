<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_roles';

    protected $fillable = [
        'nombre',
        'descripcion',
        'permisos',
        'estado',
        'modificar',
        'crear',
        'restringir'
    ];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuario_rol', 'id_roles', 'id_cedula');
    }
}
