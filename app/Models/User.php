<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    use HasFactory;

    protected $table = 'usuarios'; // Nombre exacto de la tabla
    protected $primaryKey = 'id_cedula';
    public $incrementing = false; // Porque no es autoincremental
    protected $keyType = 'bigint';

    protected $fillable = [
        'id_cedula',
        'nombre',
        'direccion_domicilio',
        'numero_telefonico',
        'correo_electronico',
        'password',
        'detalle_de_proceso',
        'juez',
        'secretario',
        'num_proceso',
        'fecha_inicio_proceso',
        'fecha_vencimiento_proceso',
        'estado_proceso',
        'ultima_actividad_proceso',
        'proxima_actividad',
        'fecha_maximo_actividad',
        'audiencias',
        'fecha_audiencia',
        'link_audiencia',
        'datos_audiencia',
        'id_tipos'
    ];

    // 🔗 Relaciones

    public function tipo()
    {
        return $this->belongsTo(Tipos::class, 'id_tipos');
    }

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'usuario_rol', 'id_cedula', 'id_roles');
    }

    public function responsables()
    {
        return $this->hasMany(Responsables::class, 'id_cedula');
    }

    public function procesos()
    {
        return $this->hasMany(Procesos::class, 'id_cedula');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
