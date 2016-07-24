<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
	private $category;

	public function __construct(Category $category, Product $product)
	{
		$this->category = $category;
		$this->product  = $product;
	}

	public function index()
	{
		$categories = $this->category->all();
		$pFeatured   = $this->product->featured()->get();

		return view('store.index', compact('categories', 'pFeatured'));
	}

	public function product_category($id)
	{
		$categories  = $this->category->all();
		$products    = $this->product->findCategory($id)->get();

		return view('store.product_categories.products',compact('categories','products'));

	}


}
