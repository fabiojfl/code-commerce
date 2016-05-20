<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminProductsController extends Controller {

    private $product;
    private $tag;

    public function __construct(Product $product, Tag $tag)
    {
        $this->product = $product;
        $this->tag = $tag;
    }

    public function index()
    {
        $products = $this->product->paginate(5);
        //$plists   = $this->product->getNameDescriptionAttribute();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        //$categories = $this->product->lists('name', 'id');
        return view('admin.products.create');
    }

    public function store(ProductRequest $request)
    {
        //dd($request->all());
        //$product->sync($tagsIDs);

        $input['featured']  = $request->get('featured')  ? true : false;
        $input['recommend'] = $request->get('recommend') ? true : false;
        $input['tag']       = $request->get('tag');

        $input      = $request->all();
        $product    = $this->product->fill($input);
        $product    =  $this->product->setTagAttribute($input['tag']);

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

    public function images($id)
    {
        $product = $this->product->find($id);
        return view('admin.products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->product->find($id);
        return view('admin.products.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, $id,ProductImage $productImage)
    {
        $file       = $request->file('image');
        $extension  = $file->getClientOriginalExtension();
        $image      =  $productImage->create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('admin.products.images',['id' => $id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension))
        {
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('admin.products.images',['id' => $product->id]);
    }
}
