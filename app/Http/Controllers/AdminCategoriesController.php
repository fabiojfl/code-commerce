<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;



class AdminCategoriesController extends Controller {

	private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->paginate(15);
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->category->fill($input);
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->category->find($id)->update($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('admin.categories.index');
    }


}
