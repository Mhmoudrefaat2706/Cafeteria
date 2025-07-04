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
    <div class="container w-100">
        {{-- <h1>Products</h1> --}}
        {{-- <a href="{{ route('product.create') }}" class="btn btn-primary mb-3 ">Create New Product</a> --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="table-responsive">
                <div class="table-wrapper" style="width:100%;">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Product <b>Details</b></h2>
                            </div>

                            <div class="col-sm-4">
                                <a href="{{ route('product.create') }}" class="btn Add btn-primary mb-3">Create New Product</a>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered w-100 ">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                                {{-- <th>Edit</th>
                                <th>Delete</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                style="border-radius: 50%;" class="h-50 w-50"
                                                alt="Product Image">
                                        @endif
                                    </td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" class="edit" title="Add"
                                            data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        {{-- delete --}}
                                        {{-- <a href="{{ route('product.destroy', $product->id) }}" class="delete"
                                            title="Add" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a> --}}

                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border: none"> <a class="delete" type="submit"
                                                    title="Delete"title="Add" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE872;</i></a></button>

                                        </form>
                                    </td>
                                    {{-- <td> --}}
                                    {{-- <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form> --}}
                                    {{-- </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            @endsection
