<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

	protected $table = 'pedido';
	protected $primaryKey = 'idpedido';

	public $timestamps = false;
	protected $fillable = [
	
    
	'idfuncionario',
	'idfornecedor',
	'condicaoPagamento',
	'dataPedido',
    'status',            
    'formaPagamento',
    'totalPedido',
    

    ];

	protected $guarded = [];


}
