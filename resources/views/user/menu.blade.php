@extends('layouts.app')
@section('content')

@section('navbar')
    <li>
        <a class="nav-link" href="{{ route('user.home') }}">
            Home
        </a>
    </li>
    <li>
        <a class="nav-link" href="{{ route('user.orders') }}">
            My Orders
        </a>
    </li>
    <li>
        <a class="nav-link" href="{{ route('user.menu') }}">
            Menu
        </a>
    </li>
@endsection

@section('our-menu')
    <div class="menu-header d-flex justify-content-center align-items-center text-white">
        <h1 class="text-center text-white">our menu</h1>
    </div>
    <!-- end img -->
    <div id="menu-body" class="menu-body pt-5">
        @foreach ($categories as $category)
            <div class="category mt-5 pt-5">
                <div class="container">
                    <!-- start category looping -->
                    <div class="category-header text-center">
                        <h2 class="category-name">{{ $category->name }}</h2>
                        <div class="category-icon">
                            <img src="{{asset('images/one size/ic.png')}}" alt=""
                            style="border-radius: 50%; align-content:center; width:40px; height: 40px;">

                            {{-- @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}"
                                    style="border-radius: 50%; align-content:center ;width:80px; height: 80px;"
                                    alt="Product Image">
                            @endif --}}
                        </div>
                    </div>
                    <!-- end category looping -->

                    <div class="category-body">
                        <div class="row row-gap-5 col">
                            <!-- start product looping -->
                            @foreach ($category->products as $product)
                                <div class="col-md-6">
                                    <div>
                                        <div class="menu-item d-flex align-items-center justify-content-between">
                                            
                                            @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                style="border-radius: 50%; align-content:center; width:80px; height: 80px;"
                                                alt="Product Image">
                                        @endif
                                            <div class="item-info">
                                                <h4>{{ $product->name }}</h4>
                                                <p>{{ $product->description }}</p>
                                            </div>
                                            <h2 class="item-price">${{ number_format($product->price, 2) }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- end product looping -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
