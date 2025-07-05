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
@section('editProduct')

    <section class="edit-product">

        <div class="add-product-header d-flex justify-content-center align-items-center text-white">
            <h2 class="text-white">Edit Product</h2>

        </div>
        <div class="edit-product-header d-flex justify-content-center align-items-center text-white">
        </div>

        <div class="container mt-5">
            <form action="{{ route('product.update', $updated_product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div class="form-group mb-3">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control in-add"
                        value="{{ old('name', $updated_product->name) }}" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                {{-- Price --}}
                <div class="form-group  
                    <label for="price">Price</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control in-add"
                        value="{{ old('price', $updated_product->price) }}">
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                {{-- Image --}}
                <div class="form-group              
                    <label for="image">Product Image</label>
                    <input type="file" name="image" id="image" class="form-control in-add">
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                {{-- Description --}}
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control in-add" rows="2">{{ old('description', $updated_product->description) }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                {{-- Category --}}
                <div class="form-group
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control in-add" required>
                        @foreach ($updated_category as $category)
                            <option value="{{ $category->id }}"
                                {{ $updated_product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn Add btn-primary my-3">Update Product</button>
            </form>
        </div>
        {{-- <button class="btn-add-category">
            <a href="{{ route('product.index') }}" class="btn align-item-center " style="color: wheat">
                Back to All Products
            </a>
        </button> --}}
    </section>
@endsection
