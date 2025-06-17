<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //

    function shoes()
    {
        $data = Product::paginate(8); // Changed to 8 products per page
        $data->withPath('/laravel-Shoesly/public/shoes');
        return view('shoes', ['products' => $data]);
    }

    function index()
    {
        $allProducts = Product::all();
        $count = $allProducts->count();
        
        if ($count > 0) {
            // If we have products, get random ones (up to 6)
            if ($count >= 6) {
                $data = $allProducts->random(6);
            } else {
                // If less than 6 products, use all of them
                $data = $allProducts;
            }
        } else {
            // If no products, return an empty collection
            $data = collect([]);
        }
        
        return view('product', ['products' => $data]);
    }

    function detail($id)
    {
        $data = Product::find($id);
        
        // Get related products (same category, excluding current product)
        $relatedProducts = Product::where('category', $data->category)
                                ->where('id', '!=', $id)
                                ->take(4)
                                ->get();
        
        return view('detail', [
            'product' => $data,
            'relatedProducts' => $relatedProducts
        ]);
    }

    function search(Request $req)
    {
        $data= Product::
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }

    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/cartlist');

        }
        else
        {
            return redirect('/login');
        }
    }

    static function cartItem()
    {
        if (!Session::has('user')) {
            return 0;
        }
        
        try {
            $userId = Session::get('user')['id'];
            return Cart::where('user_id', $userId)->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    function cartList()
    {
        if(session()->has('user')){
        $userId= Session::get('user')['id'];
       $data=  DB::table('cart')
         ->join('products','cart.product_id','products.id')
         ->select('products.*','cart.id as cart_id')
         ->where('cart.user_id',$userId)
         ->get();

         return view('cartlist',['products'=>$data]);
        }else{
            return redirect('/');
        }
    }

    function removeCart($id)
    {
        try {
            // Check if the cart item exists and belongs to the current user
            if(session()->has('user')) {
                $userId = Session::get('user')['id'];
                $cartItem = Cart::where('id', $id)
                    ->where('user_id', $userId)
                    ->first();
                    
                if($cartItem) {
                    Cart::destroy($id);
                    return redirect('cartlist')->with('success', 'Item removed from cart successfully');
                } else {
                    // Cart item not found or doesn't belong to current user
                    return redirect('cartlist')->with('error', 'Item not found in your cart');
                }
            } else {
                // User not logged in
                return redirect('login')->with('error', 'Please login to remove items from cart');
            }
        } catch (\Exception $e) {
            // Log error and redirect
            \Log::error('Cart removal error: ' . $e->getMessage());
            return redirect('cartlist')->with('error', 'Could not remove item from cart');
        }
    }

    function orderNow()
    {
        try {
            if(session()->has('user')) {
                $userId = Session::get('user')['id'];
                $products = DB::table('cart')
                    ->join('products','cart.product_id','products.id')
                    ->select('products.*','cart.id as cart_id')
                    ->where('cart.user_id',$userId)
                    ->get();
                
                // Check if cart is empty
                if($products->isEmpty()) {
                    return redirect('cartlist')->with('error', 'Your cart is empty. Please add items before checkout.');
                }
                
                $totalprice = 0;
                foreach($products as $item){
                    $totalprice += $item->price;
                }
                
                return view('ordernow',[
                    'products' => $products,
                    'totalprice' => $totalprice
                ]);
            } else {
                return redirect('login')->with('error', 'Please login to proceed to checkout');
            }
        } catch (\Exception $e) {
            \Log::error('Order processing error: ' . $e->getMessage());
            return redirect('cartlist')->with('error', 'There was a problem processing your order');
        }
    }

    function orderPlace(Request $req)
    {
        $userId= Session::get('user')['id'];
        $allCart=Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart)
        {
            $order= new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->address=$req->address;
            $order->status="pending";
            $order->payment_method=$req->payment;
            $order->payment_status="pending";
            $order->save();
        }
        Cart::where('user_id',$userId)->delete();
        return redirect('/');
        // return $req->input();
    }

    function myOrder()
    {
        if(session()->has('user')){
        $userId= Session::get('user')['id'];
        $orders= DB::table('orders')
          ->join('products','orders.product_id','products.id')
          ->where('orders.user_id',$userId)
          ->get();
        return view('myorder',['orders'=>$orders]);

        }else{
            return redirect('/');
        }

    }

    function cartb()
    {
        if(session()->has('user')){
        $userId= Session::get('user')['id'];
       $data=  DB::table('cart')
         ->join('products','cart.product_id','products.id')
         ->select('products.*','cart.id as cart_id','cart.product_price')
         ->where('cart.user_id', $userId)
         ->get();

         return view('ordernow',['products'=>$data]);
        }else{
            return redirect('/');
        }
    }

    function addInCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->product_price=$req->product_price;

            $cart->save();
            return redirect('/ordernow');

        }
        else
        {
            return redirect('/login');
        }
    }

    public function create()
    {
        return view('add_product');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle main image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_main.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $data['image'] = 'images/products/'.$imageName;
        }
        
        // Handle gallery image uploads
        if ($request->hasFile('gallery')) {
            $gallery = $request->file('gallery');
            $galleryName = time().'_gallery1.'.$gallery->getClientOriginalExtension();
            $gallery->move(public_path('images/products'), $galleryName);
            $data['gallery'] = 'images/products/'.$galleryName;
        }
        
        if ($request->hasFile('gallery2')) {
            $gallery2 = $request->file('gallery2');
            $gallery2Name = time().'_gallery2.'.$gallery2->getClientOriginalExtension();
            $gallery2->move(public_path('images/products'), $gallery2Name);
            $data['gallery2'] = 'images/products/'.$gallery2Name;
        }
        
        if ($request->hasFile('gallery3')) {
            $gallery3 = $request->file('gallery3');
            $gallery3Name = time().'_gallery3.'.$gallery3->getClientOriginalExtension();
            $gallery3->move(public_path('images/products'), $gallery3Name);
            $data['gallery3'] = 'images/products/'.$gallery3Name;
        }

        Product::create($data);

        return redirect('/')->with('success', 'Product added successfully!');
    }
}
