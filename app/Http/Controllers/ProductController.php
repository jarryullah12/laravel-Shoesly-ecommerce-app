<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Validator;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    //

    function index()
    {
        try {
            // Get all products without joining with orders
            $data = Product::all();
            
            return view('product',['products'=>$data]);
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error in ProductController@index: ' . $e->getMessage());
            
            // Fallback to just showing products
            $data = Product::all();
            return view('product',['products'=>$data]);
        }
    }

    function addnew(Request $req)
    {

        $rules=array(
            "name"=>'required | string | max:500',
            "price"=>'required | integer | max:500',
            "category"=>'required | string | max:500',
            "description"=>'required | string | max:500',
            "short_description"=>'required | string | max:500',
            "gallery"=>'required | mimes:jpeg,jpg,png',
            "gallery2"=>'required | mimes:jpeg,jpg,png',
            "gallery3"=>'required | mimes:jpeg,jpg,png',
        );

        $validator=Validator::make($req->all(),$rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file=$req->file('gallery');
        $file2=$req->file('gallery2');
        $file3=$req->file('gallery3');

        $extension=$file->getClientOriginalExtension();
        $extension2=$file2->getClientOriginalExtension();
        $extension3=$file3->getClientOriginalExtension();

        $filename=time().'1.'.$extension;
        $filename2=time().'2.'.$extension2;
        $filename3=time().'3.'.$extension3;

        $file->move('uploads/products/',$filename);
        $file2->move('uploads/products/',$filename2);
        $file3->move('uploads/products/',$filename3);

        $product=new Product;
        $product->name=$req->name;
        $product->price=$req->price;
        $product->category=$req->category;
        $product->description=$req->description;
        $product->short_description=$req->short_description;
        $product->gallery=$filename;
        $product->gallery2=$filename2;
        $product->gallery3=$filename3;
        $product->save();

        return redirect('/product');
    }

    function create()
    {
        return view('addnewproducts');
    }

    function showpro($id)
    {
        $data=Product::find($id);
        return view('showpro',['product'=>$data]);
    }

    function delete($id)
    {
        Product::destroy($id);
        return redirect('/product');
    }

    function editpro($id)
    {
        $data=Product::find($id);
        return view('editpro',['product'=>$data]);
    }

    function update(Request $req)
    {
        $rules=array(
            "name"=>'required | string | max:500',
            "price"=>'required | integer | max:500',
            "category"=>'required | string | max:500',
            "description"=>'required | string | max:500',
            "short_description"=>'required | string | max:500',
            "gallery"=>'mimes:jpeg,jpg,png',
            "gallery2"=>'mimes:jpeg,jpg,png',
            "gallery3"=>'mimes:jpeg,jpg,png',
        );

        $validator=Validator::make($req->all(),$rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product=Product::find($req->id);
        $product->name=$req->name;
        $product->price=$req->price;
        $product->category=$req->category;
        $product->description=$req->description;
        $product->short_description=$req->short_description;

        if($req->hasFile('gallery'))
        {
            $file=$req->file('gallery');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'1.'.$extension;
            $file->move('uploads/products/',$filename);
            $product->gallery=$filename;
        }

        if($req->hasFile('gallery2'))
        {
            $file2=$req->file('gallery2');
            $extension2=$file2->getClientOriginalExtension();
            $filename2=time().'2.'.$extension2;
            $file2->move('uploads/products/',$filename2);
            $product->gallery2=$filename2;
        }

        if($req->hasFile('gallery3'))
        {
            $file3=$req->file('gallery3');
            $extension3=$file3->getClientOriginalExtension();
            $filename3=time().'3.'.$extension3;
            $file3->move('uploads/products/',$filename3);
            $product->gallery3=$filename3;
        }

        $product->save();
        return redirect('/product');
    }
}







