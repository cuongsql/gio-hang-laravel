<?php

namespace App\Http\Services\Product;

use App\Http\Repositories\Product\ProductRepoInterface;
use App\Http\Services\Product\ProductServiceInterface;
use App\Product;
use Illuminate\Support\Str;

class ProductService implements ProductServiceInterface
{
    protected $productRepo;

    public function __construct(ProductRepoInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAll()
    {
        return $this->productRepo->getAll();
    }

    public function store($request)
    {
        $obj = new Product();
        $obj->name = $request->name;
        $obj->slug = Str::slug($request->name);
        $obj->img = $this->uploadImage($request);
        $obj->description = $request->description;
        $obj->content = $request->content;
        $obj->price = $request->price;
        $obj->category_id = $request->category_id;
        $this->productRepo->store($obj);
    }

    public function update($obj, $request)
    {
        $image = $request->img;
        if ($image) {
            unlink('storage/images/' . $obj->img);
            $obj->fill($request->all());
            $obj->slug = Str::slug($request->name);
            $obj->img = $this->uploadImage($request);
        } else {
            $obj->fill($request->all());
            $obj->slug = Str::slug($request->name);
        }

        $this->productRepo->store($obj);
    }

    public function uploadImage($request)
    {
        if (!$request->hasFile('img')) {
            $image_name = 'no_image.jpg';
        } else {
            $image = $request->file('img');
            $image_name = '' . date('H-i-s') . '-' . $image->getClientOriginalName();
            $image->storeAs('public/images/', $image_name);
        }
        return $image_name;
    }

    public function destroy($id)
    {
        $product_id = $this->productRepo->findById($id);
        $this->productRepo->destroy($product_id);
    }

    public function findById($id)
    {
        return $this->productRepo->findById($id);
    }

    public function search($keyword)
    {
        return Product::where('name', 'LIKE', '%' . $keyword . '%')->get();
    }
}
