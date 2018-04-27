<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class ParcelaReceber extends Model
{
    protected $table = 'parcelareceber';
	protected $primaryKey = 'idparcela';

	public $timestamps = false;
	protected $fillable = [
	
    
	'idcontasr',
	'dataVencimento',
	'valorParcela',
	'valorRecebido',
    

    ];

	protected $guarded = [];
}
