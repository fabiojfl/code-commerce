<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use CodeCommerce\Category;

class CheckoutController extends Controller
{
    public function __construct(Category $category)
    {
    	$this->category = $category;
    	
        $this->middleware('auth');
    }

    public function place(Order $orderModel, OrderItem $orderItem)
    {

        if(!Session::has('cart'))
        {
            return false;
        }

        $cart = Session::get('cart');
        
        if($cart->getTotal() > 0)
        {
            $order = $orderModel->create(['user_id' => Auth::user()->id, 'total' => $cart->getTotal()]);

            foreach($cart->all() as $k=>$item)
            {
              $orderItem =  $order->items()->create(['product_id' => $k , 'price' => number_format($item['price'],2,".", ""), 'qtd' => $item['qtd']]);
            }
            
            $cart->clear();
            
            return view('store.checkout', compact('order'));

        }
		
		$categories = $this->category->all();
		
		return view('store.checkout', ['cart'=>'empty', 'categories'=>$categories]);
    }
    
    

}
