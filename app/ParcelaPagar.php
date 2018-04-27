<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class ParcelaPagar extends Model
{
    
	protected $table = 'parcelapagar';
	protected $primaryKey = 'idparcela';

	public $timestamps = false;
	protected $fillable = [
	
    
	'idcontasp',
	'dataVencimento',
	'valorParcela',
	'valorPago',
    

    ];

	protected $guarded = [];

}
