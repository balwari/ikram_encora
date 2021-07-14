<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function show() {
        // $id = Auth::id();
        $products = Product::paginate(5);
        return view('products.show')->with('products',$products);
    }
    
    public function create(Request $request) {

        $rules = [
            'name' => 'required|string|min:2|max:50',
            'price' => 'required|string|min:1|max:10',
            'category' => 'required|string',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique'    => ':attribute is already used',
        ];

        $validate =  $this->validate($request, $rules, $customMessages);

        $product = new Product;
        $id = Auth::id();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->added_by = $id;
        $create = $product->save();
        // $create = Product::create($product);

        if(!$create){
            return redirect()->back()->with('err', 'Something went wrong');
        }
        return redirect()->back()->with('message', 'Product added successfully');
    }

    public function update_product($id) {
        $product = product::find($id);
        return view('products.form')->with('product',$product);
    }
    public function update($id, Request $req) {
        $rules = [
            'name' => 'required|string|min:2|max:50',
            'price' => 'required|string|min:1|max:10',
            'category' => 'required|string',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique'    => ':attribute is already used',
        ];

        $validate =  $this->validate($req, $rules, $customMessages);

        $product = product::find($id);
        $id = Auth::id();
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->added_by = $id;
        $product->save();
        return redirect()->route('show')->with('message', 'Product Updated successfully');
    }
    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }
}
