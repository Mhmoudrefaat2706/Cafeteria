<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Room;
use App\Models\Order;
use App\Http\Requests\StoreUserOrderRequest;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $cartitems = session('cart', []);
        $total = $this->calculateTotal();
        $search_value = $request->input('input_search');

        $products = Product::all();
        $rooms = Room::all();
        $results = [];

        if ($search_value) {
            $results = Product::where('name', 'like', "%{$search_value}%")->get();
        }

        return view('user.home', compact('products', 'results', 'rooms', 'cartitems', 'total'));
    }

    public function calculateTotal()
    {
        $cartitems = session('cart', []);
        return array_reduce($cartitems, fn($total, $item) => $total + $item['price'] * $item['quantity'], 0);
    }

    public function increaseQuantity($id)
    {
        $cartitems = session('cart', []);
        foreach ($cartitems as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] += 1;
            }
        }
        session(['cart' => $cartitems]);
        return back();
    }

    public function decreaseQuantity($id)
    {
        $cartitems = session('cart', []);
        foreach ($cartitems as &$item) {
            if ($item['id'] == $id && $item['quantity'] > 1) {
                $item['quantity'] -= 1;
            }
        }
        session(['cart' => $cartitems]);
        return back();
    }

    public function addToCart($id)
    {
        $cartitems = session('cart', []);
        $found = false;

        foreach ($cartitems as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $product = Product::findOrFail($id);
            $cartitems[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session(['cart' => $cartitems]);
        return redirect()->route('user.home')->with('message', '✅ Product added to cart!');
    }

    public function removeFromCart($id)
    {
        $cartitems = session('cart', []);
        $cartitems = array_filter($cartitems, fn($item) => $item['id'] != $id);
        session(['cart' => array_values($cartitems)]);
        return back()->with('message', '🗑️ Product removed from cart!');
    }

    public function store(StoreUserOrderRequest $request)
    {
   
        $cartitems = session('cart', []);
        if (empty($cartitems)) {
            return redirect()->back()->with('Qerror', 'Cart is empty! Please add products before confirming the order.');
        }

        $total = $this->calculateTotal();

        DB::transaction(function () use ($request, $cartitems, $total) {
            $order = Order::create([
                'notes' => $request->notes,
                'amount' => $total,
                'room_id' => $request->room_id,
                'user_id' => auth()->id(),
                'date' => now(),
                'quantity' => array_sum(array_column($cartitems, 'quantity')),
            ]);

            foreach ($cartitems as $item) {
                $order->products()->attach($item['id'], [
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'name' => $item['name'],
                ]);
            }
        });

        session()->forget('cart');
        return redirect()->route('user.home')->with('message', '✅ Order has been confirmed');
    }
}
