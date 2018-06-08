<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\CreateProductRequest;

class ProductController extends Controller
{
    public function index(){
    	$products= Product::getAll();

    	return view('products.list',
    		['products'=>$products]
    	);
    }
     public function create()
    {
        return view('products.create');
    }
    // public function store(CreateProductRequest $request){
    //     $data=$request->all();
    //     $product= new Product;
    //     $product->name=$data['name'];
    //     $product->price=$data['price'];
    //     $product->quantity=$data['quantity'];
    //     $product->save();
    //     return redirect('product')->with('flag','Thêm mới thành công');
    // }
    public function store(CreateProductRequest $request){
        dd($request);
        $product= new Product;
        $product->name=$data['name'];
        $product->price=$data['price'];
        $product->quantity=$data['quantity'];
        $product->save();
        return response()->json($product);;
    }

    public function show($id)
    {
        $product=Product::find($id);
        return response()->json($product);
        
    } 
    // public function show($id)
    // {
    //     $product=Product::find($id);
    //     return view('products.detail',
    //         ['product'=>$product]);
    // } 
    
    public function destroy($id){
    	Product::where('id',$id)->delete();
    	return response()->json($id);

    }
   
    public function edit($id){
    	$product=Product::find($id);
    	return view('products.edit',
            ['product'=>$product]);
    } 
    // public function update(Request $request,$id){
    //     $data=$request->all();
    //     $product=Product::find($id);
    //     $product->name=$data['name'];
    //     $product->price=$data['price'];
    //     $product->quantity=$data['quantity'];
    //     $product->save();
    //     return redirect('product')->with('flag','Cập nhật thành công');
    // }
    public function update(Request $request,$id){
        $data=$request->all();
        $product=Product::where('id',$id)->update($data);
        
    	return response()->json($product);
    }
}

