@extends('dashboard.index')

@section('page_name')
    Admin Add Order For User
@endsection


@section('ordercontent')
@if (session('message'))
    <div id="flash-message" class="alert alert-success position-fixed top-0 end-0 m-3 z-3 shadow" style="min-width: 250px;">
        {{ session('message') }}
    </div>
@endif
    <div class="container mt-4">
        <div class="row">
            <!-- Order Summary Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <!-- Order Items -->
                        <div class="row mb-3">
                            @if (session('Qerror'))
                                <div class="alert alert-danger fs-6">
                                    {{ session('Qerror') }}
                                </div>
                            @endif
                            @foreach ($cartitems as $item)

                                <div class="col-6 position-relative">
                                    <a href="{{ route('removeFromCart', $item['id'])}}">
                                        <button class="btn btn-outline-danger btn-sm position-absolute top-0 end-0 mb-5"
                                            style="margin-right:12px" type="button" title="Remove from cart"
                                            style="z-index: 10;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </a>

                                    <label class="form-label fw-bold">{{$item['name']}}</label>
                                    <div class="input-group">
                                        <a href="{{ route('decreaseQuantity', $item['id']) }}"
                                            class="btn btn-outline-danger btn-sm">-</a>
                                        <input type="number" class="form-control text-center" id="tea-qty"
                                            value="{{$item['quantity']}}" min="0">
                                        <a href="{{ route('increaseQuantity', $item['id']) }}"
                                            class="btn btn-outline-success btn-sm">+</a>
                                    </div>

                                    <small class="text-muted">EGP {{$item['price']}} each</small>
                                </div>
                            @endforeach


                        </div>
                        <form action="{{ route('addOrder')}}" method="POST">
                            @csrf
                            <!-- Notes -->
                            <div class="mb-3">
                                @error('notes')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                                <label class="form-label fw-bold">Notes</label>
                                <textarea class="form-control" rows="3" placeholder="1 Tea Extra Sugar"
                                    name="notes">{{ old('notes') }}</textarea>
                            </div>

                            <!-- Room Selection -->
                            <div class="mb-3">
                                @error('room_id')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                                <label class="form-label fw-bold">Room number</label>
                                <select class="form-select" name="room_id">
                                    <option selected disabled value="{{ old('room_id') }}">1</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{$room->id}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Add to User -->
                            <div class="mb-3">
                                @error('user_id')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                                <label class="form-label fw-bold">Add to user</label>
                                <select class="form-select" name="user_id">
                                    <option selected disabled>Select user</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Total -->
                            <div class="text-center p-3 rounded total-price mb-3">
                                <span id="total-price">
                                    EGP {{$total}} total
                                </span>
                            </div>

                            <!-- Confirm Button -->

                            <button class="btn btn-primary w-100 btn-lg" type="submit">
                                <i class="fas fa-check me-2"></i>Confirm Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Drinks Menu -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0"><i class="fas fa-list me-2"></i>Menu Selection</h5>
                            </div>
                            <div class="col-auto">
                                <div class="input-group">
                                    <form action="{{ route('products') }}" method="GET">
                                        @csrf
                                        <span class="input-group-text">
                                            <button class="btn btn-outline-primary" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                            <input type="text" class="ms-2 form-control" name="input_search"
                                                placeholder="Search drinks...">
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
<!--                             @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif -->
                            @if (!empty($results) && count($results) > 0)
                                @foreach ($results as $result)
                                    <a href="{{ route('addtocart', $result->id) }}"
                                        style="text-decoration:none ; color:var(--medium-brown) !important">

                                        <div class="drink-item p-3 text-center h-100 bg-success-subtle">
                                            <i class="fas fa-mug-hot fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                            <h6 class="fw-bold">{{ $result->name }}</h6>
                                            <span class="badge price-badge">{{ $result->price }} LE</span>
                                        </div>
                                    </a>

                                @endforeach
                            @else
<!--                                 <p class="bg bg-danger-subtle text-white p-3"
                                    style="border-radius:8px !important;  color: brown !important;">No Products Found!</p> -->
                            @endif



                            @foreach ($products as $product)
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ route('addtocart', $product->id) }}"
                                        style="text-decoration:none ; color:var(--medium-brown) !important">
                                        <div class="drink-item p-4 text-center " style="height:180px">
                                            <img class="product-image"
                                                src="{{ asset('images/one size/' . $product->image) }}" />

                                            <h6 class="fw-bold ">{{ $product->name }}</h6>
                                            <span class="badge price-badge">{{ $product->price }} LE</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded',function () {


            const flash=document.getElementById('flash-message');
            if(flash){
            setTimeout(()=>{
                flash.style.transition='opacity 0.5s ease';
                flash.style.opacity='0';
                setTimeout(()=>flash.remove(),500);
            },3000);
        }
    })
    </script>
@endsection
