<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Room;
use App\Http\Requests\StoreOrder;

use Number;
use function Laravel\Prompts\alert;

class AdminAddOrderController extends Controller
{


    public function __construct()
    {
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function calculateTotal($cartitems)
    {

        $cartitems = session('cart', []);
        $total = 0;
        foreach ($cartitems as $cartitem) {
            $total += $cartitem['price'] * $cartitem['quantity'];
        }
        return $total;
    }
    public function index(Request $request)
    {
        $cartitems = session('cart', []);
        $total = $this->calculateTotal($cartitems);
        $search_value = $request->input('input_search');

        if ($request->filled($search_value) && is_numeric($search_value)) {
            return redirect()->back()->with('error', 'Please enter a valid product name!');
        }

        $products = Product::all();
        $rooms = Room::all();
        $users = User::all();
        $results = [];

        if ($search_value) {
            $results = Product::where('name', 'like', "%{$search_value}%")->get();
        }
        return view('dashboard.addorder', compact('products', 'results', 'rooms', 'users', 'cartitems', 'total'));
    }


    public function addToCart(string $id)
    {
        $element = Product::find($id);
        session()->push('cart', [
            'id' => $element->id,
            'name' => $element->name,
            'price' => $element->price,
            'quantity' => $element->quantity,
        ]);
        $cartitems = session('cart', []);
        return redirect()->route('products', compact('cartitems', ));
    }

    public function removeFromCart($id)
    {
        $cartitems = session('cart', []);
        $cartitems = array_filter($cartitems, fn($item) => $item['id'] != $id);
        session(['cart' => array_values($cartitems)]);
        return redirect()->route('products');
    }
    /**
     * Show the form for creating a new resource.
     */

    public function decreaseQuantity($id)
    {
        $cartitems = session('cart', []);
        foreach ($cartitems as &$item) {
            if ($item['quantity'] == 0 || !is_numeric($item['quantity'])) {
                return redirect()->back()->with('Qerror', 'Quantity must be number and starts from 1');
            } else if ($item['quantity'] > 1 || $item['id'] == $id) {
                $item['quantity'] -= 1;
            }
        }
        session(['cart' => $cartitems]);
        return redirect()->back();
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
        return redirect()->back();
    }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrder $request)
    {
        $cartitems = session('cart', []);
        $total = $this->calculateTotal($cartitems);
        $room = Room::find($request->room_id);
        $user = User::find($request->user_id);



        $quantity = array_sum(array_column($cartitems, 'quantity'));
        $order = Order::create([
            'notes' => $request->notes,
            'amount' => $total,
            'room_id' => $room->id,
            'user_id' => $user->id,
            'date' => now(),
            'quantity' => $quantity,
        ]);

        foreach ($cartitems as $cartitem) {
            $order->products()->attach($cartitem['id'], [
                'quantity' => $cartitem['quantity'],
                'price' => $cartitem['price'],
                'name' => $cartitem['name'],
            ]);
        }
        session()->forget('cart');
        return redirect()->route('products')->with('message', 'Order confirmed');

    }

    /**
     * Display the specified resource.
     */
    public function showOrders(Request $request)
    {
        $ordersall = Order::orderBy('created_at', 'desc')->get();

        $orders = [];


        foreach ($ordersall as $orderItem) {
            $products = OrderProduct::where('order_id', $orderItem->id)->get();
            $user = User::find($orderItem->user_id);
            $orders[] = [
                'orderId' => $orderItem->id,
                'orderDate' => $orderItem->created_at,
                'userName' => $user->name,
                'roomNumber' => $orderItem->room_id,
                'extNum' => $user->ext_num ,
                'products' => $products,
                'orderStatus' => $orderItem->status,
                'total' => $orderItem->amount
            ];
        }
        return view('dashboard.orders', compact('orders'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderupdate = Order::find($id);
        $orderupdate->update([
            'status' => 'done'
        ]);

        return redirect()->route('orders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
