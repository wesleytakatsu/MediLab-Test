<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Person extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = [
        'user_id',
        'nome',
        'numAcesso',
        'visita',
        'patientID',
        'data',
        'modalidade',
        'tipoExame',
        'numero',
        'estado',
        'medSol',
        'laudo',
        'sexo',
        'especial',
        'urgente',
        'restaurado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
