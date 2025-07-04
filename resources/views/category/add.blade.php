@extends('layouts.app')
@section('navbar')
    <li>
        <a class="nav-link" href="{{ route('category.index') }}">
            All Categories
        </a>
    </li>
    <li>
        <a class="nav-link" href="{{ route('product.index') }}">
            All Products
        </a>
    </li>

@endsection
@section('content')
@section('addCategory')

    <section class="add-category w-100">
        <div class="add-category-header d-flex justify-content-center align-items-center text-white">
            <h2 class="text-white">Add new category</h2>
        </div>

        <div class="add-category-body mt-5 py-5 container border rounded-3 text-center">
            <form method="POST" action="{{ route('category.store') }}">
                @csrf
                <label for="name">Category Name</label>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control in-add" id="name" name="name"
                        value="{{ old('name') }}" />
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label for="description">Category Description</label>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control in-add" id="description" placeholder="Category Description"
                        name="description" value="{{ old('description') }}" />
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="Add btn-add-category" type="submit">Add Category</button>
            </form>
        </div>
    </section>
@endsection
