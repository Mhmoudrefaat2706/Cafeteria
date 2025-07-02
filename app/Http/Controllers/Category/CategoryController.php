<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        $categories = Category::with('products')->get();
        return view('user.menu', compact('categories'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return to_route('category.index');
    }

    // /**
    //  * Display the specified resource.
    //  */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $updated_category = Category::findOrFail($id);
        return view('category.edit', compact('updated_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddCategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->update();
        return to_route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return to_route('category.index');
    }
}
