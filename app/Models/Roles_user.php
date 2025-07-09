<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roles_user extends Model
{
    use HasFactory;

    protected $table = 'usuario_rol'; // Nombre exacto de la tabla

    // Laravel no espera que una tabla intermedia tenga PK compuesta,
    // así que desactivamos timestamps y autoincremento
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = null;
    protected $fillable = [
        'id_cedula',
        'id_roles'
    ];

    // Relaciones inversas
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_cedula');
    }

    public function rol()
    {
        return $this->belongsTo(Roles::class, 'id_roles');
    }
}
