<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use stdClass;

class ShopController extends Controller
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return view('cart.index', \compact('products'));
    }

    public function addToCart($id)
    {
        $product = $this->productService->findById($id);
        $oldCart = session::has('cart') ? session::get('cart') : 0;
        $newCart = new Cart($oldCart);
        $newCart->add($product);
        Session::put('cart', $newCart);
        // Session::flash('success', 'Thêm sản phẩm khỏi giỏ hàng thành công');
        return redirect()->back();
    }

    public function showCart()
    {
        $cart = session::has('cart') ? session::get('cart') : new Cart(null);
        return view('cart.cart', compact('cart'));
    }

    public function removeItemCart($id)
    {
        $product = new Cart(Session::get('cart'));
        $product->remove($product, $id);
        Session::put('cart', $product);
        return redirect()->back();
    }

    public function updateCart(Request $request, $idProduct)
    {
        $newQty = $request->quantity;
        $product = $this->productService->findById($idProduct);
        $oldCart = session::has('cart') ? session::get('cart') : 0;
        $newCart = new Cart($oldCart);
        $newCart->update($product, $newQty);
        Session::put('cart', $newCart);

        $arr = [];
        $obj = new stdClass;
        $obj->totalPrice = $newCart->totalPrice;
        $obj->totalItemPrice = $newCart->items[$idProduct]['totalPrice'];
        $obj->quantityItem = $newCart->items[$idProduct]['totalQty'];
    
        array_push($arr, $obj);

        return response()->json(['data' => $arr]);
    }
}
