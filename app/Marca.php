<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marca';
    protected $primaryKey = 'codigo';

    public $timestamps = false;
    protected $fillable = [

    'nome',
  

    ];

    protected $guarded = [];
}
