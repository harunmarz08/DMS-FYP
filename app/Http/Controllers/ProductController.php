<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function insert(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'test' => 'nullable',
        ]);

        $newProduct = Product::create($data);

        return redirect(route('product.index'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]);
    }

    public function update(Product $product ,Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'test' => 'nullable',
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success',"Product Updated Successfully");
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('success',"Product Deleted Successfully");

    }
    public function handleRoute1(Request $request)
    {
        dd($request);
        return redirect()->back()->with('status', 'Submitted to Route 1');
    }

    public function handleRoute2(Request $request)
    {
        dd($request);
        return redirect()->back()->with('status', 'Submitted to Route 2');
    }

    public function handleRoute3(Request $request)
    {
        dd($request);
        return redirect()->back()->with('status', 'Submitted to Route 3');
    }
}
