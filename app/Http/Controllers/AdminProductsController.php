<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;

class AdminProductsController extends Controller {

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        //$categories = $this->product->lists('name', 'id');
        return view('admin.products.create');
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $input['featured'] = $request->get('featured') ? true : false;
        $input['recommend'] = $request->get('recommend') ? true : false;
        $product = $this->product->fill($input);
        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        return view('admin.products.edit',compact('product'));
    }

    public function update($id, ProductRequest $request)
    {
        $input = $request->all();
        $input['featured'] = $request->get('featured') ? true : false;
        $input['recommend'] = $request->get('recommend') ? true : false;
        $this->product->find($id)->update($input);

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $this->product->find($id)->delete();
        return redirect()->route('admin.products.index');
    }

}
