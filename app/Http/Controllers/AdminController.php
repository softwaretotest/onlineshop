<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Product;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin'); //login check
    }

    public function view_catagory()
    {
        $catagory = Catagory::orderBy('id', 'desc')->get();

        return view('admin.catagory', compact('catagory'));
    }

    public function add_catagory(Request $request)
    {
        $catagory = new Catagory;
        $catagory->name = $request->catagory;
        $catagory->save();
        return redirect()->back()->with('message', 'Catagory added successfully');
    }

    public function delete_catagory($id)
    {
        $category = Catagory::find($id);
        $category->delete();
        return redirect()->back()->with('message', 'Catagory deleted successfully');
    }

    public function view_product_unit()
    {
        $product_unit = ProductUnit::orderBy('id', 'desc')->get();

        return view('admin.product_unit', compact('product_unit'));
    }

    public function add_product_unit(Request $request)
    {
        $product_unit = new ProductUnit;
        $product_unit->name = $request->product_unit;
        $product_unit->save();
        return redirect()->back()->with('message', 'Product Unit added successfully');
    }

    public function delete_product_unit($id)
    {
        $product_unit = ProductUnit::find($id);
        $product_unit->delete();
        return redirect()->back()->with('message', 'Product Unit deleted successfully');
    }

    public function show_product()
    {
        $product = Product::orderBy('id', 'desc')->get();
        foreach ($product as $prod) {
            $catagory = Catagory::where('id', $prod->catagory)->first();
            $prod->catagory = $catagory->name;
        }
        return view('admin.product_list', compact(['product']));
    }

    public function view_product()
    {
        $catagory = Catagory::all();
        $product_unit = ProductUnit::all();
        return view('admin.product', compact(['catagory', 'product_unit']));
    }

    public function add_product(Request $request)
    {
        $product = new Product;

        $product->name = $request->name;

        $product->description = $request->description;

        $product->catagory = $request->catagory;

        $product->quantity = $request->quantity;

        $product->unit = $request->product_unit;

        $product->price = $request->price;

        $product->discount_price = $request->discount_price;

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->image->move('product', $imagename);

        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message', 'Product added successfully');
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $catagory = Catagory::orderBy('name', 'asc')->get();
        $product_unit = ProductUnit::orderBy('name', 'asc')->get();
        return view('admin.product_edit', compact(['product', 'catagory', 'product_unit']));
    }

    public function update_product(Request $request)
    {
        $product = Product::find($request->id);

        $product->name = $request->name;

        $product->description = $request->description;

        $product->catagory = $request->catagory;

        $product->quantity = $request->quantity;

        $product->unit = $request->product_unit;

        $product->price = $request->price;

        $product->discount_price = $request->discount_price;

        $image = $request->image;

        if (!is_null($image)) {

            if (File::exists(public_path('product/' . $product->image))) {
                File::delete(public_path('product/' . $product->image));
            }

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('product', $imagename);

            $product->image = $imagename;
        }

        $product->save();

        return redirect()->back()->with('message', 'Product updated successfully');
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        if (File::exists(public_path('product/' . $product->image))) {
            File::delete(public_path('product/' . $product->image));
        }
        $product->delete();

        return redirect()->back()->with('message', 'Product deleted successfully');
    }

}
