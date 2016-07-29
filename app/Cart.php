<?php
/**
 * Created by PhpStorm.
 * User: fabiojs
 * Date: 29/07/16
 * Time: 17:16
 */

namespace CodeCommerce;


class Cart
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    //add
    public function add($id, $name, $price)
    {
        // id -> qtd, price, nome
        $this->items + [

            $id => [
                'qtd'     => isset($this->items[$id]['qtd'])? $this->items[$id]['qtd']++ : 1 ,
                'price'   => $price,
                'name'    => $name

            ]

        ];
    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;

        foreach($this->items as $items)
        {
            $total += $items['qtd'] * $items['price'];
        }

        return $total;
    }


    //remove
    //all
    //getTotal

}