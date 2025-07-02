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
@section('addProduct')
    <section class="add-product ">

        <div class="add-product-header d-flex justify-content-center align-items-center text-white my-3">
            <h2>Add new Product</h2>
        </div>

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <div class="form-group mb-3">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control in-add" class="form-control"
                    value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            {{-- Price --}}
            <div class="form-group mb-3">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control in-add"
                    value="{{ old('price') }}">
                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
            </div>
            {{-- image --}}
            <div class="form-group mb-3">
                <label for="image">Product Image</label>
                <input type="file" name="image" id="image"class="form-control in-add">
            </div>
            {{-- Description --}}
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control in-add" rows="2"
                    value="{{ old('description') }}"></textarea>
            </div>
            {{-- category --}}
            <div class="form-group mb-3">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control in-add" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </section>

@endsection
