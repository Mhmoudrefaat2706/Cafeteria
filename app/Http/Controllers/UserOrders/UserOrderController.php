<?php

namespace App\Http\Controllers\UserOrders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    
 
public function index(Request $request)
{
    $query = auth()->user()->orders()->with('orderDetails.product');

    if ($request->filled('start_date')) {
        $query->whereDate('created_at', '>=', $request->start_date);
    }
    if ($request->filled('end_date')) {
        $query->whereDate('created_at', '<=', $request->end_date);
    }

    $orders = $query->latest()->paginate(4);

    return view('user.orders.index', compact('orders'));
}

    // // Display a specific order
    // public function show(Order $order)
    // {
    //         if ($order->user_id !== Auth::id()) {
    //         abort(403, 'Please login first to acces your orders');
    //     }

    //     $order->load('orderDetails.product');

    //     return view('orders.show', compact('order'));
    // }


    public function cancel(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if (!$order->canBeCancelled()) {
            return back()->with('error', 'Please login first to acces your orders');
        }

$order->update(['status' => 'cancelled']);

        return back()->with('success', 'Order cancelled successfully.');
    }
}


