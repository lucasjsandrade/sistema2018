<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Recebimento extends Model
{

    protected $table = 'recebimento';
    protected $primaryKey = 'idrecebimento';

    public $timestamps = false;
    protected $fillable = [


        'idparcela',
        'data',
        'valor',
        'valorTotal',


    ];

    protected $guarded = [];

}
