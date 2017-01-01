<?php

namespace CodeCommerce;

// fazer aparecer o cep por aqui e naão por cartController

class FreteTotal extends Cart
{
    private $cepfrete;

    public function __construct()
    {
        $this->cepfrete = [];
    }

    public function addFrete($destino, $id)
    {
        $this->cepfrete += [

            $id =>
                [
                    'destino'  => $destino
                ]
        ];

        return $this->cepfrete;
    }

    public function all()
    {
        return $this->cepfrete;
    }

/*
    public function getTotalFrete()
    {
        $totalFrete = 0;
        foreach($this->freteItems as $items)
        {
            $totalFrete += $items['qtd'] * $items['price'] + $items['vfrete'];
        }
        return $totalFrete;
    }
*/
}