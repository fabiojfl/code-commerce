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
use CodeCommerce\Events\CheckoutEvent;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class CheckoutController extends Controller
{
    public function __construct(Category $category)
    {
    	$this->category = $category;
    	
        $this->middleware('auth');
    }

    public function place(Order $orderModel, OrderItem $orderItem, CheckoutService $checkoutService)
    {

        if(!Session::has('cart'))
        {
            return false;
        }

        $cart = Session::get('cart');
        
        if($cart->getTotal() > 0)
        {
            $checkout = $checkoutService->createCheckoutBuilder();

//            $response = $checkoutService->checkout($checkout);


            $order = $orderModel->create(['user_id' => Auth::user()->id, 'total' => $cart->getTotal(), 'status' => 'Aguardando Pagamento']);

            foreach($cart->all() as $k=>$item)
            {
                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'],2,".",""), $item['qtd']));

                $orderItem =  $order->items()->create(['product_id' => $k , 'price' => number_format($item['price'],2,".", ""), 'qtd' => $item['qtd']]);
            }
            
            $cart->clear();
            
            event(new CheckoutEvent());

            $response = $checkoutService->checkout($checkout->getCheckout());

            return redirect($response->getRedirectionUrl());

        }

		$categories = $this->category->all();
		
		return view('store.checkout', ['cart'=>'empty', 'categories'=>$categories]);
    }
/*
    public function test(CheckoutService $checkoutService)
    {
        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

       return redirect($response->getRedirectionUrl());

    }
    
*/
}
