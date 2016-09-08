<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;
use CodeCommerce\Http\Requests\OrderRequest;

class AdminOrdersController extends Controller
{
    private $order;
    
    public function __construct(Order $order)
    {
    	$this->order = $order; 
    }
    
    public function index()
    {
    	
    	$orders		= $this->order->paginate(25);
    	return view('admin.orders.index',compact('orders'));
    }

    public function editStatus($id)
    {
    	$order 		= $this->order->find($id);
    	return view('admin.orders.edit_status', compact('order'));
    }
    
    public function updateStatus(OrderRequest $request, $id)
    {
		$this->order->find($id)->update($request->all());
		return redirect()->route('admin.orders.index');
    }
}
