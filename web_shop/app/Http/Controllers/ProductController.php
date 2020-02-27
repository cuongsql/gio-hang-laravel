<?php

namespace App\Http\Controllers;

use App\Http\Services\Category\CategoryServiceInterface;
use App\Http\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(ProductServiceInterface $productService, CategoryServiceInterface $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->getAll();

        return view('admin.product.index', \compact('products'));
    }

    public function formCreate()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.product.create', \compact('categories'));
    }

    public function create(Request $request)
    {
        $this->productService->store($request);

        return redirect()->route('productList');
    }

    public function formEdit($id)
    {
        $categories = $this->categoryService->getAll();
        $product = $this->productService->findById($id);

        return view('admin.product.edit', \compact('product', 'categories'));
    }

    public function update($id, Request $request)
    {
        $category_id = $this->productService->findById($id);
        $this->productService->update($category_id, $request);
        return redirect()->route('productList');
    }

    public function destroy($id)
    {
        $this->productService->destroy($id);
        return back();
    }

    public function search(Request $request)
    {
        $products = $this->productService->search($request->keyword);

        $arr = [];

        foreach($products as $product){
            $obj = new stdClass();
            $obj->name = $product->name;
            $obj->slug = Str::slug($product->name);
            $obj->img = $product->img;;
            $obj->description = $product->description;
            $obj->price = $product->price;
            $obj->category_id = $product->category->name;
            array_push($arr, $obj);
        }
        return response()->json(['data' => $arr]);
    }
}
