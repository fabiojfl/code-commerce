<?php


namespace CodeCommerce;


class Cart
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price)
    {
        $this->items += [
            $id =>
                [
                    'qtd'   => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
                    'price' => $price,
                    'name'  => $name
                ]
        ];

        return $this->items;
    }

    public function edit($id,$name,$price,$qtd)
    {
        $this->items += [

            $id =>
                [
                    'qtd'   => isset($this->items[$id][$qtd]) ? $this->items[$id][$qtd]++ : 1,
                    'price' => $price,
                    'name'  => $name
                ]
        ];

        return $this->items;
    }
	
	public function fedit($id,$name,$price,$qtd,$fvalue)
	{
		$this->items += [

            $id =>
                [
                    'qtd'   => isset($this->items[$id][$qtd]) ? $this->items[$id][$qtd]++ : 1,
                    'price' => $price,
                    'name'  => $name,
					'frete' => $fvalue
                ]
        ];
		
		 return $this->items;
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
	
    public function getFreteTotal()
    {
        $total = 0;
        foreach($this->items as $items)
        {
          $total += $items['qtd'] * $items['price'] + $items['frete'];
        }
        return $ftotal;
    }
	    
    public function setQtd($id, $qtd)
    {
    	if($qtd > 0){
    		$this->items[$id]['qtd'] = $qtd;
    	}
    }
    
	public function clear()
    {
        $this->items = [];
    }
}