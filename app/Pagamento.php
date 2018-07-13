<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = 'pagamento';
    protected $primaryKey = 'idpagamento';

    public $timestamps = false;
    protected $fillable = [


        'idparcelap',
        'data',
        'valor',
        'jurus',
        'multa',
        'valorTotal',


    ];

    protected $guarded = [];
}
