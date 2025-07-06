@extends('dashboard.index')

@section('page_name')
    All orders
@endsection

@section('orders')

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-primary-custom mb-0">
                        <i class="fas fa-clipboard-list me-2"></i>
                        Orders Dashboard
                    </h2>
                    <form action="{{route('products')}}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark">
                            <i class="fas fa-plus me-2"></i>
                            New Order
                        </button>
                    </form>
                </div>

                <!-- Orders List -->
                <div class="orders-container">
                    <!-- Order 1 -->
                    @foreach ($orders as $order)
                        <div class="card order-card mb-4">
                            <div class="card-header order-header order-header-allorders">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <small class="text-muted">Order Date</small>
                                        <div class="fw-semibold">{{$order['orderDate']}}</div>
                                    </div>
                                    <div class="col-md-3">
                                        <small class="text-muted">Customer Name</small>
                                        <div class="fw-semibold">{{$order['userName']}}</div>
                                    </div>
                                    <div class="col-md-2">
                                        <small class="text-muted">Room Number</small>
                                        <div class="fw-semibold">{{$order['roomNumber']}}</div>
                                    </div>
                                    <div class="col-md-2">
                                        <small class="text-muted">EXT Number</small>
                                        <div class="fw-semibold">{{$order['extNum']}}</div>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <form action="{{ route('deliverorder', $order['orderId']) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            @if($order['orderStatus'] == "processing")
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-truck me-1"></i>
                                                    Deliver
                                                </button>
                                            @elseif($order['orderStatus'] == "done")
                                                <button type="submit" class="btn btn-secondary  btn-sm" disabled>
                                                    <i class="fas fa-check me-1"></i>
                                                    Delivered
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Products -->
                                    @foreach ($order['products'] as $product)
                                        <div class="col-6 col-md-3 mb-3">
                                            <div class="beverage-item text-center">
                                                <div class="beverage-icon">
                                                    <i class="fas fa-mug-hot"></i>
                                                </div>
                                                <div class="beverage-price badge bg-warning">{{$product['price']}} LE</div>
                                                <div class="beverage-name">{{$product['name']}}</div>
                                                <div class="beverage-quantity">
                                                    <span class="text-muted">Quantity:</span>
                                                    <span class="badge bg-secondary text-black">
                                                        {{$product['quantity']}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 text-end">
                                        <h5 class="total-amount mb-0">
                                            <span class="text-muted">Total: EGP</span>
                                            <span class="text-primary-custom">{{$order['total']}}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection