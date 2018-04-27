<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
     protected $table = 'cidade';
    protected $primaryKey = 'idcidade';

    public $timestamps = false;
    protected $fillable = [

    'idestado',
    'nomeCidade',
    'status',
    

    ];

    protected $guarded = [];
}
