<?php
namespace CodeCommerce\Http\Controllers;
use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    private $cart;
    private $product;
    public function __construct(Cart $cart, Product $product)
    {
        $this->cart     = $cart;
        $this->product  = $product;
    }
    public function index()
    {
        if(!Session::has('cart'))
        {
            Session::set('cart', $this->cart);
        }
        return view('store.cart', ['cart' => Session::get('cart')]);
    }
    public function add($id)
    {
        $cart = $this->getCart();
        $product = $this->product->find($id);
        $cart->add($id, $product->name, $product->price);
        Session::set('cart', $cart);
        return redirect()->route('store.cart');
    }
    public function destroy($id)
    {
        $cart = $this->getCart();
        $cart->remove($id);

        Session::set('cart', $cart);

        return redirect()->route('store.cart');
    }
    /**
     * @return Cart
     */
    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }
    public function update(Requests\CartRequest $request, $id)
    {
        $qtd = $request->get("qtd");

        $cart = $this->getCart();
        $cart->setQtd($id, $qtd);

        Session::set('cart', $cart);
        return redirect()->route('store.cart');
    }
}