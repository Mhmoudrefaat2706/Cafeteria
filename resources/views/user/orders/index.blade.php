@extends('layouts.app')
@section('content')

@section('navbar')
    {{-- <li>
        <a class="nav-link" href="{{ route('user.home') }}">
            Home
        </a>
    </li> --}}
    {{-- <li>
        <a class="nav-link" href="{{ route('user.orders') }}">
            My Orders
        </a>
    </li> --}}
    <li>
        <a class="nav-link" href="{{ route('user.menu') }}">
            Menu
        </a>
    </li>
@endsection

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">My Orders</h2>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($orders->isEmpty())
                        <div class="alert ">
                            <span>
                                @if (request('start_date') || request('end_date'))
                                    No orders found for the selected date range.
                                @else
                                    You haven't placed any orders yet.
                                @endif
                            </span>
                            <a href="{{ route('user.orders') }}" class="btn btn-outline-secondary btn-sm ms-3">
                                Back to All Orders
                            </a>
                        </div>
                    @else
                        <form method="GET" action="{{ route('user.orders') }}" class="row g-2 mb-4">
                            <div class="col-md-3">
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ request('start_date') }}" placeholder="Start Date">
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ request('end_date') }}" placeholder="End Date">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn">Filter</button>
                                <a href="{{ route('user.orders') }}" class="btn">Reset</a>
                            </div>
                        </form>
                        <div class="table-responsive" style="width: 100%">
                            <table class="table">
                                <thead class="">
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->created_at->format('M d, Y') }}
                                                {{-- button --}}
                                                <button type="button" style="border: none" data-bs-toggle="collapse"
                                                    data-bs-target="#orderDetails{{ $order->id }}"
                                                    aria-expanded="false"
                                                    aria-controls="orderDetails{{ $order->id }}">
                                                    {{-- icon --}}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-plus"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                    </svg>
                                                    {{-- icon --}}
                                                </button>
                                            </td>
                                            <td>
                                                <span
                                                    class="
                                                    @if ($order->status === 'processing') text-warning
                                                    @elseif($order->status === 'done') text-success
                                                    @elseif($order->status === 'cancelled') text-danger @endif">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>{{ number_format($order->amount, 2) }} EGP</td>

                                            <td>

                                                @if ($order->canBeCancelled())
                                                    <form action="{{ route('orders.cancel', $order) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <button type="submit" class=" border-0 btn-sm"
                                                            onclick="return confirm('Are you sure you want to cancel this order?')">
                                                            <a href=""><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="16" height="16" fill="currentColor"
                                                                    class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                                    <path
                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                                </svg></a>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="collapse" id="orderDetails{{ $order->id }}">
                                            <td colspan="6">
                                                <div class="p-3">
                                                    <div class="row g-3">
                                                        @foreach ($order->orderDetails as $detail)
                                                            <div class="col-6 col-md-3">
                                                                <div class="card border-0 text-center">
                                                                    <div class="position-relative">
                                                                        @if ($detail->product && $detail->product->image)
                                                                            <img src="{{ asset('images/one size/' . $detail->product->image) }}"
                                                                                alt="Product Image"
                                                                                class="img-fluid rounded shadow-sm"
                                                                                style="height: 70px; width: 70px; object-fit: cover; margin: auto;">

                                                                            <span class="badge top-0 end-0 m-2">
                                                                                {{ number_format($detail->price, 2) }}EGP
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <div class="card-body p-2">
                                                                        <div class="fw-bold">
                                                                            {{ $detail->product->name ?? $detail->name }}
                                                                        </div>
                                                                        <div class="text-muted ">Amount
                                                                            {{ $detail->quantity }}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            {{ $orders->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
