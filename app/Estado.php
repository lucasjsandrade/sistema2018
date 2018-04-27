<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    
 protected $table = 'estado';
    protected $primaryKey = 'idestado';

    public $timestamps = false;
    protected $fillable = [
    'idpais',
    'nomeEstado',
    'sigla',
    'status',
    
    
   

    ];

    protected $guarded = [];


}
