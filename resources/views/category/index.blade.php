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
    <div class="container">
        {{-- <h1>Categories</h1> --}}
        {{-- <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Create New Category</a> --}}

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
                                <h2>Category <b>Details</b></h2>
                            </div>

                            <div class="col-sm-4">
                                <a href="{{ route('category.create') }}" class="btn btn-primary mb-3 ">Create New
                                    Category</a>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                {{-- <th>Status</th> --}}
                                {{-- <th>Edit</th>
                                <th>Delete</th> --}}
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>

                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}" class="edit" title="Add"
                                            data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        {{-- delete --}}
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border:none"> <a class="delete" type="submit"
                                                    title="Delete"title="Add" data-toggle="tooltip"><i
                                                        class="material-icons">&#xE872;</i></a></button>

                                        </form>
                                    </td>
                                    {{-- <td>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td> --}}

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $categories->links() }}
                    </div>
                </div>
            @endsection
