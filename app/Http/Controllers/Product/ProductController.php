<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use Faker\Provider\bn_BD\Address;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $categories = Category::with('products')->get();
        return view('user.home', compact('categories'));
    }

    public function index()
    {
        $products  = Product::paginate(5);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $selectedCategory = request()->input('category_id');
        $product = Product::all();
        return view('product.add', compact('product', 'categories', 'selectedCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request)
    {
        $categories = Category::all();
        $selectedCategory = request()->input('category_id');


        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // اسم مميز
            $destinationPath = public_path('images/one size');
            $image->move($destinationPath, $imageName);

            $product->image = $imageName;
        }
        $product->save();
        return to_route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $updated_product = Product::findOrFail($id);
        $updated_category = Category::all();
        return view('product.edit', compact('updated_product', 'updated_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

 if ($request->hasFile('image')) {

    $oldImagePath = public_path('images/one size/' . $product->image);
    if (file_exists($oldImagePath)) {
        unlink($oldImagePath);
    }

    $image = $request->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $destinationPath = public_path('images/one size');
    $image->move($destinationPath, $imageName);

    $product->image = $imageName;
}

        $product->update();
        return to_route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return to_route('product.index');
    }
}
