<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personal';
    protected $primaryKey = 'id_personal';
    public $incrementing = true;
    protected $fillable = [
        'cedula', 'nombres', 'apellidos', 'telefono', 'cargo'
    ];
}
