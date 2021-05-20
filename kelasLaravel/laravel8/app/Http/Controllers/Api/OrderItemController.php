<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class OrderItemController extends Controller
{
    private $ORDER_NOT_FOUND = 'Order not found';
    private $ORDER_ITEM_NOT_FOUND = 'Order item not found';
    private $PRODUCT_NOT_FOUND = 'Product not found';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order_id)
    {
        $order = Order::find($order_id);
        if (empty($order)) {
            return response()->json(['message' => $this->ORDER_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }

        $customer = $order->user->name;
        $order_item = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return response()->json(['message' => 'List order item by customer = ' . $customer  . ' and order_id = ' . $order_id, 'data' => $order_item], Response::HTTP_OK);
    }

    public function list($order_id)
    {
        $data['order'] = Order::with('user')->where('id', $order_id)->firstOrFail();
        $data['title'] = 'Admin Divisima | Order Item';
        $data['titleBread'] = 'Order Item';
        $data['order_item'] = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        $data['products'] = Product::all();

        return view('admin.order_item.SPA_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $order_id)
    {
        $product = Product::find($request->product_id);
        if (empty($product)) {
            return response()->json(['message' => $this->PRODUCT_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        $stock = $product->stock;
        $validator = Validator::make($request->all(), [
            'product_id' => ['required'],
            'qty' => ['required', 'integer', 'gte:1', 'lte:' . $stock],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $order_item = OrderItem::where('order_id', $order_id)->where('product_id', $request->product_id)->first();

        if (!empty($order_item)) {
            if ($order_item->qty == $stock) {
                return  response()->json(['message_full_stock' => 'Product is already, Full Stock']);
            }

            // Update qty in table order item (plus one)
            $order_item = OrderItem::where('id', $order_item->id)->first();
            $order_item->qty += 1;
            $order_item->save();

            // Get order item by order id
            $order_item = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

            return response()->json(['message' => 'Product is already, Successfully edited qty (plus 1)', 'data' => $order_item], Response::HTTP_OK);
        }

        $data = $request->all();
        $data += ['order_id' => $order_id];
        // Insert data in table order item and get
        $order_item = OrderItem::create($data)->with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return response()->json(['message' => 'Order item created', 'data' => $order_item], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['message' => 'Not found'], Response::HTTP_NOT_FOUND);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($order_id, $id)
    {
        $data['titleBread'] = 'Form Edit Order Item';
        $data['order_id'] = $order_id;
        $data['products'] = Product::all();
        $data['row'] = OrderItem::with('product')->where('order_id', $order_id)->where('id', $id)->first();
        return view('admin.order_item.SPA_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order_id, $id)
    {
        $order_item = OrderItem::with('product')->where('id', $id)->where('order_id', $order_id)->first();

        if (empty($order_item)) {
            return response()->json(['message' => $this->ORDER_ITEM_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        $stock = $order_item->product->stock;

        $validator = Validator::make($request->all(), [
            'qty' => 'required|integer|gte:1|lte:' . $stock,
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Update qty in table order item
        $order_item->qty = $request->qty;
        $order_item->save();

        // Get order item by order id
        $data_order_item = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return ($order_item->wasChanged()) ? response()->json(['message' => 'Order item edited', 'data' => $data_order_item], Response::HTTP_OK) : response()->json(['message_not_modified' => 'Not Modified']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id, $id)
    {
        $order_item = OrderItem::with('product')->where('order_id', $order_id)->where('id', $id)->first();
        if (empty($order_item)) {
            return response()->json(['message' => $this->ORDER_ITEM_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        $order_item->delete();

        // Get order item by order id
        $order_item = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return response()->json(['message' => 'Order item deleted', 'data' => $order_item], Response::HTTP_OK);
    }
}
