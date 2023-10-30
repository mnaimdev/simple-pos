<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;


class POSController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $customers = Customer::all();
        $carts = Cart::all();
        $branches = Branch::all();

        return view('backend.pos.index', [
            'products'  => $products,
            'customers' => $customers,
            'carts'     => $carts,
            'branches'  => $branches,
        ]);
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'product_id'        => 'required',
            'quantity'          => 'required',
        ]);

        $product = Product::find($request->product_id);


        if ($request->quantity < $product->product_store) {
            Cart::create($validate);

            $notification = array(
                'message'       => 'Cart added successfully',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        } else {
            $notification = array(
                'message'       => 'Out of Stock',
                'alert-type'    => 'warning',
            );

            return back()->with($notification);
        }
    }



    public function invoice(Request $request)
    {

        $request->validate([
            'customer_id'       => 'required',
        ]);

        $customer = Customer::find($request->customer_id);
        $carts = Cart::all();
        $branch = Branch::find($request->branch_id);

        return view('backend.pos.invoice', [
            'customer'  => $customer,
            'carts'     => $carts,
            'branch'    => $branch,
        ]);
    }


    public function order(Request $request)
    {

        $data = array();

        $order_id = '#POS' . rand(10000000000, 900000000000);
        $invoice_number = '#Invoice' . rand(111111111, 99999999999999);

        $data['order_id']            = $order_id;
        $data['customer_id']         = $request->customer_id;
        $data['order_date']          = $request->order_date;
        $data['order_status']        = $request->order_status;
        $data['sub_total']           = $request->sub_total;
        $data['vat']                 = $request->vat;
        $data['total']               = $request->total;
        $data['invoice_number']      = $invoice_number;
        $data['payment_method']      = $request->payment_method;
        $data['pay']                 = $request->pay;
        $data['due']                 = $request->due;
        $data['branch_id']           = $request->branch_id;

        Order::create($data);

        $carts = Cart::all();

        foreach ($carts as $cart) {
            OrderDetail::create([
                'order_id'              => $order_id,
                'product_id'            => $cart->product_id,
                'quantity'              => $cart->quantity,
            ]);
        }

        DB::table('carts')->delete();

        $notification = array(
            'message'       => 'Order Completed Successfully',
            'alert-type'    => 'success',
        );


        return redirect()->route('pos')->with($notification);
    }


    public function pending()
    {
        $pending_orders = Order::where('order_status', 'pending')->latest()->get();

        return view('backend.pos.pending', [
            'pending_orders' => $pending_orders,
        ]);
    }


    public function details($id)
    {
        $order = Order::find($id);
        $order_id = $order->order_id;

        $order_details = OrderDetail::where('order_id', $order_id)->get();

        return view('backend.pos.order_details', [
            'order_details'     => $order_details,
            'order'             => $order,
        ]);
    }


    public function status_update(Request $request)
    {
        $order_id = Order::find($request->id)->order_id;

        $products = OrderDetail::where('order_id', $order_id)->get();

        Order::find($request->id)->update([
            'order_status' => 'complete',
        ]);

        foreach ($products as $product) {
            Product::where('id', $product->product_id)->decrement('product_store', $product->quantity);
        }

        $notification = array(
            'message'       => 'Order Status Updated',
            'alert-type'    => 'success',
        );

        return redirect()->route('pending.order')->with($notification);
    }


    public function complete()
    {
        $orders = Order::where('order_status', 'complete')->latest()->get();

        return view('backend.pos.complete', [
            'orders'    => $orders,
        ]);
    }

    public function download($order_id)
    {

        $order = Order::find($order_id);
        $order_details = OrderDetail::where('order_id', $order->order_id)->get();

        $pdf = Pdf::loadView('download', [
            'order' => $order,
            'order_details' => $order_details,
        ]);

        return $pdf->download('order.pdf');
    }
}
