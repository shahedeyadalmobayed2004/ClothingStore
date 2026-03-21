<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Product::with('category');

        if (request()->filled('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }

        if (request()->filled('category_id')) {
            $query->where('category_id', request('category_id'));
        }

        $products = $query->latest()->paginate(6);
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        ], [
        'name.required' => 'اسم المنتج مطلوب',
        'description.required' => 'الوصف مطلوب',
        'price.required' => 'السعر مطلوب',
        'price.numeric' => 'السعر يجب أن يكون رقمًا',
        'category_id.required' => 'يجب اختيار الفئة',
        'category_id.exists' => 'الفئة المختارة غير موجودة',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'تم إضافة المنتج بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Product $product)
    // {
    //     return redirect()->route('products.index');
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        ], [
        'name.required' => 'اسم المنتج مطلوب',
        'description.required' => 'الوصف مطلوب',
        'price.required' => 'السعر مطلوب',
        'price.numeric' => 'السعر يجب أن يكون رقمًا',
        'category_id.required' => 'يجب اختيار الفئة',
        'category_id.exists' => 'الفئة المختارة غير موجودة',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'تم تحديث المنتج بنجاح!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}
