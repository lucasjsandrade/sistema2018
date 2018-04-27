<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamento';
    protected $primaryKey = 'idagendamento';

    public $timestamps = false; //criação e atualização de registro
    protected $fillable = [

    'status', 'dataOrcamento', 'dataInstalacao', 'dataLancamento', 'horaOrcamento', 'horaInstalacao' 

    ];

    protected $guarded = [];
}
