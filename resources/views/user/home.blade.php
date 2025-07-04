@extends('layouts.app')

@section('page_name')
    My Order
@endsection

@section('content')

{{-- ✅ Floating flash message at top right --}}
@if (session('message'))
    <div id="flash-message" class="alert alert-success position-fixed top-0 end-0 m-3 z-3 shadow" style="min-width: 250px;">
        {{ session('message') }}
    </div>
@endif

<div class="container mt-4">
    <div class="row">
        <!-- Order Summary -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-shopping-cart me-2"></i>Order Summary</h5>
                </div>
                <div class="card-body">

                    {{-- Show quantity error --}}
                    @if (session('Qerror'))
                        <div class="alert alert-danger fs-6">{{ session('Qerror') }}</div>
                    @endif

                    {{-- Show current order if there are items --}}
                    @if (count($cartitems) > 0)
                        <div class="mb-4">
                            <div class="bg-light p-3 rounded">
                                <h6 class="fw-bold mb-3">🛒 Your current order:</h6>
                                <div class="row row-cols-1 row-cols-md-2 g-3">
                                    @foreach ($cartitems as $item)
                                        <div class="col">
                                            <div class="border p-2 rounded position-relative h-100 bg-white">
                                                <strong>{{ $item['name'] }}</strong><br>
                                                <small>Price: {{ $item['price'] }} LE</small>
                                                <div class="input-group mt-2">
                                                    <a href="{{ route('user.decreaseQuantity', $item['id']) }}" class="btn btn-outline-danger btn-sm">-</a>
                                                    <input type="number" class="form-control text-center" value="{{ $item['quantity'] }}" readonly>
                                                    <a href="{{ route('user.increaseQuantity', $item['id']) }}" class="btn btn-outline-success btn-sm">+</a>
                                                </div>
                                                <a href="{{ route('user.removeFromCart', $item['id']) }}">
                                                    <button class="btn btn-sm btn-danger position-absolute top-0 end-0">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Order form --}}
                    <form action="{{ route('user.addOrder') }}" method="POST" id="order-form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Extra sugar..." name="notes">{{ old('notes') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Room</label>
                            <select class="form-select" name="room_id" id="room-select" required>
                                <option selected disabled value="">Select room</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center p-3 rounded total-price mb-3">
                            <span id="total-price">
                                EGP {{ $total }} total
                            </span>
                        </div>

                        <button
                            id="confirm-btn"
                            class="btn btn-primary w-100 btn-lg"
                            type="submit"
                            disabled
                        >
                            <i class="fas fa-check me-2"></i>Confirm Order
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <!-- Drinks -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-list me-2"></i>Menu</h5>
                    <form action="{{ route('user.home') }}" method="GET" class="input-group w-50">
                        <input type="text" name="input_search" class="form-control" placeholder="Search drinks...">
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @if (!empty($results))
                            @foreach ($results as $result)
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ route('user.addToCart', $result->id) }}" style="text-decoration: none;">
                                        <div class="drink-item p-3 text-center bg-light h-100">
                                            <img class="product-image" src="{{ asset('images/one size/' . $result->image) }}" />
                                            <h6 class="fw-bold">{{ $result->name }}</h6>
                                            <span class="badge price-badge">{{ $result->price }} LE</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif

                        @foreach ($products as $product)
                            <div class="col-md-3 col-sm-6">
                                <a href="{{ route('user.addToCart', $product->id) }}" style="text-decoration: none;">
                                    <div class="drink-item p-3 text-center bg-light h-100">
                                        <img class="product-image" src="{{ asset('images/one size/' . $product->image) }}" />
                                        <h6 class="fw-bold">{{ $product->name }}</h6>
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

{{-- ✅ Flash message script + confirm button --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // ✅ Hide success message after 2 seconds
        const flash = document.getElementById('flash-message');
        if (flash) {
            setTimeout(() => {
                flash.style.transition = 'opacity 0.5s ease';
                flash.style.opacity = '0';
                setTimeout(() => flash.remove(), 500);
            }, 3000);
        }

        // ✅ Confirm button only works if there are products and a room is selected
        const confirmBtn = document.getElementById('confirm-btn');
        const roomSelect = document.getElementById('room-select');
        const hasCartItems = {{ count($cartitems) > 0 ? 'true' : 'false' }};

        function toggleConfirmButton() {
            const roomSelected = roomSelect.value !== '';
            confirmBtn.disabled = !(hasCartItems && roomSelected);
        }

        roomSelect.addEventListener('change', toggleConfirmButton);
        toggleConfirmButton();
    });
</script>

@endsection