<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detalles extends Model
{
    use HasFactory;

    protected $table = 'detalles';
    protected $primaryKey = 'id_detalles';

    protected $fillable = ['id_responsables', 'id_procesos'];

    public function responsable()
    {
        return $this->belongsTo(Responsables::class, 'id_responsables');
    }

    public function proceso()
    {
        return $this->belongsTo(Procesos::class, 'id_procesos');
    }
}
