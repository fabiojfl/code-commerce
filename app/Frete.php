<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Frete extends Model
{
    protected $fillable = [
		'product_id',
		'tipo',             
        'formato',      
        'cep_destino' , 
        'cep_origem',   
        'peso',              
        'comprimento',       
        'altura',            
        'largura' ,          
        'diametro',         
	];
	
/*	
    $dados = [
        'tipo'              => 'sedex', // opções: `sedex`, `sedex_a_cobrar`, `sedex_10`, `sedex_hoje`, `pac`, 'pac_contrato', 'sedex_contrato' , 'esedex'
        'formato'           => 'caixa', // opções: `caixa`, `rolo`, `envelope`
        'cep_destino'       => '89062086', // Obrigatório
        'cep_origem'        => '89062080', // Obrigatorio
        //'empresa'         => '', // Código da empresa junto aos correios, não obrigatório.
        //'senha'           => '', // Senha da empresa junto aos correios, não obrigatório.
        'peso'              => '1', // Peso em kilos
        'comprimento'       => '16', // Em centímetros
        'altura'            => '11', // Em centímetros
        'largura'           => '11', // Em centímetros
        'diametro'          => '0', // Em centímetros, no caso de rolo
        // 'mao_propria'       => '1', // Não obrigatórios
        // 'valor_declarado'   => '1', // Não obrigatórios
        // 'aviso_recebimento' => '1', // Não obrigatórios
    ];

    echo Correios::frete($dados);
	*/
	
	 public function product()
    {
        return $this->belongsTo('CodeCommerce\Product');
    }
	
	
}
