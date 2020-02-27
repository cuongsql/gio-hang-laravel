<?php
namespace App\Http\Repositories\Product;

use App\Product;
use App\Http\Repositories\Product\ProductRepoInterface;
use Illuminate\Support\Facades\Auth;

class ProductRepo implements ProductRepoInterface
{
    protected $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->all();
    }

    public function store($obj)
    {
        $obj->save();
    }

    public function update($obj)
    { 
        return Auth::attempt($obj);
    }


    public function destroy($obj)
    {
        $obj->delete();
    }

    public function findById($id)
    {
        return $this->product->findOrFail($id);
    }
}