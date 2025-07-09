<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Procesos extends Model
{
    use HasFactory;

    protected $table = 'procesos';
    protected $primaryKey = 'id_procesos';

    protected $fillable = [
        'control_activos',
        'fecha_adquisicion',
        'depreciacion',
        'fecha_ultimo_mantenimiento',
        'fecha_proximo_mantenimiento',
        'proveedor_mantenimiento',
        'valor_mantenimiento',
        'id_tipos',
        'id_cedula'
    ];

        public function tipo()
    {
        return $this->belongsTo(Tipos::class, 'id_tipos');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_cedula');
    }

    public function detalles()
    {
        return $this->hasMany(Detalles::class, 'id_procesos');
    }
}
