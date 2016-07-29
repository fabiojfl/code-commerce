<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

class StoreController extends Controller
{
	private $category;

	public function __construct(Category $category, Product $product, Tag $tag)
	{
		$this->category = $category;
		$this->product  = $product;
		$this->tag      = $tag;
	}

	public function index()
	{
		$categories   = $this->category->all();
		$pFeatured    = $this->product->featured()->get();
		$pRecommended = $this->product->recommended()->get();

		return view('store.index', compact('categories', 'pFeatured', 'pRecommended'));
	}

	public function category($id)
	{
		$categories  = $this->category->all();
		$category    = $this->category->find($id);
		$products    = $this->product->ofCategory($id)->get();

		return view('store.category',compact('categories','products','category'));

	}

	public function product($id)
	{
		$categories = $this->category->all();
		$product   = $this->product->find($id);
		$tags  = $this->tag->all();

		return view('store.product',compact('categories','product','tags'));
	}


}
