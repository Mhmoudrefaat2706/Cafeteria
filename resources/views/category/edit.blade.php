@extends('layouts.app')
@section('navbar')
    <li>
        <a class="nav-link" href="{{ route('category.index') }}">
            All Categories
        </a>
    </li>
    <li>
        <a class="nav-link" href="{{ route('product.create') }}">
            All Products
        </a>
    </li>

@endsection
@section('content')
@section('editCategory')

    <section class="edit-category w-100">
        
 <div class="add-product-header d-flex justify-content-center align-items-center text-white">
            <h2>Edit Category</h2>

        </div>
        <div class="edit-category-body mt-5 py-5 container border rounded-3 text-center">
            {{-- <h2>Edit Category</h2> --}}
            <form method="POST" action="{{ route('category.update', $updated_category->id) }}">
                @csrf
                @method('PUT')
                <label for="name">Category Name</label>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control in-add" id="name" name="name"
                        value="{{ old('name', $updated_category->name) }}" />
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label for="description">Category Description</label>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control in-add" id="description" placeholder="Category Description" name="description"
                        value="{{ old('description', $updated_category->description) }}" />
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn-add-category" type="submit">Update Category</button>
            </form>
        </div>
        {{-- <button class="btn-add-category"><a href="{{ route('category.index') }}" class="btn align-item-center" style="color: wheat">
                Back to All Categories
            </a> </button> --}}
        
    </section>
    @endsection