<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }
    public function getAddToCart (Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart-> add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('product.index')->with('success', 'Product added successfully.');
    }

    public function getCart() {
        if (Session::has('cart')){
            $cart = Session::get('cart');
            return view('shop.shoppingcart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        }
    
        return view('shop.shoppingcart', ['products' => [], 'totalPrice' => 0]);
    }

    public function reduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
    
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
    
        return redirect()->route('product.shoppingcart');
    }
    
    public function removeItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
    
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
    
        return redirect()->route('product.shoppingcart');
    }

    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
            /* 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' */
        ]);

        error_log($request->name);
        error_log($request->qty);
        error_log($request->price);
        error_log($request->description);
        error_log($request->image);

        if(!empty($request->file())){
            error_log('test');
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);

            $newProduct = Product::create([
                'name' => $request->name,
                'qty' => $request->qty,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imageName,
            ]);
        }

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product ->update($data);

        return redirect(route('product.index'))->with('success','Product updated successfully');
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success','Product deleted successfully');
    }
}
