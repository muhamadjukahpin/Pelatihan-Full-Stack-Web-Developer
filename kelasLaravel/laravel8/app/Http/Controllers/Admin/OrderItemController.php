<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{
    private $url1 = '/admin/orders/', $url2 = '/order_item/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($order_id)
    {
        $data['order'] = DB::table('orders', 'o')
            ->select('o.id', 'o.date_order', 'users.name', 'users.email')
            ->join('users', 'o.user_id', '=', 'users.id')
            ->where('o.id', $order_id)
            ->first();

        if (empty($data['order'])) {
            return redirect('/admin/orders/create')->with('message', "no order, please insert order");
        }

        $data['title'] = 'Admin Divisima | Order Item';
        $data['titleBread'] = 'Order Item';
        $data['order_item'] = DB::table('order_item', 'oi')
            ->select('oi.*', 'products.name')
            ->join('orders', 'oi.order_id', '=', 'orders.id')
            ->join('products', 'oi.product_id', '=', 'products.id')
            ->orderBy('oi.id', 'DESC')
            ->where('order_id', $order_id)
            ->get();
        $data['products'] = DB::table('products')->get();

        return view('admin.order_item.list', $data);
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
        $rule_qty = 'required|integer';
        if (!empty($request->product_id)) {
            $product_idAndStock = explode('-', $request->product_id);
            $product_id = $product_idAndStock[0];
            $stock = $product_idAndStock[1];
            $rule_qty = 'required|integer|gte:1|lte:' . $stock;
        }

        $qty = $request->qty;
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => $rule_qty,
        ]);

        $order_item = DB::table('order_item')->where('product_id', $product_id, '', 'and')->where('order_id', $order_id)->first();
        Product::where('id', $product_id)->where('stock', $stock)->firstOrFail();

        if (!empty($order_item)) {
            if ($order_item->qty == $stock) {
                return redirect($this->url1 . $order_id . $this->url2)->with('message-failed', 'Product is already, Full Stock');
            }
            // Update stock in table product (minus 1)
            // $product->stock -= 1;
            // $product->save();

            // Update qty in table order item (plus one)
            DB::table('order_item')
                ->where('id', $order_item->id)
                ->update([
                    'qty' => $order_item->qty + 1,
                ]);

            return redirect($this->url1 . $order_id . $this->url2)->with('message', 'Product is already, Successfully edited qty (plus 1)');
        }

        // Update stock in table product (minus qty)
        // $product->stock -= $qty;
        // $product->save();

        // Insert data in table order item
        DB::table('order_item')->insert([
            'order_id' => $order_id,
            'product_id' => $product_id,
            'qty' => $qty,
        ]);

        return redirect($this->url1 . $order_id . $this->url2)->with('message', 'Successfully added order item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($order_id, $id)
    {
        $data['title'] = 'Admin Divisima | Form Edit Order Item';
        $data['titleBread'] = 'Form Edit Order Item';
        $data['order_id'] = $order_id;
        $data['products'] = DB::table('products')->get();
        $data['row'] = DB::table('order_item')
            ->select('order_item.id', 'order_item.qty', 'products.name', 'products.stock')
            ->join('products', 'order_item.product_id', '=', 'products.id')
            ->where('order_item.id', $id)
            ->first();

        if (empty($data['row'])) {
            return abort(404);
        }
        return view('admin.order_item.edit', $data);
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
        $order_item = DB::table('order_item')->where('id', $id, '', 'and')->where('order_id', $order_id)->first();
        if (empty($order_item)) {
            return abort(404);
        }
        $product = Product::findOrFail($order_item->product_id);

        $request->validate([
            'qty' => 'required|integer|gte:1|lte:' . $product->stock,
        ]);

        $new_qty = $request->qty;

        // Update qty in table order item
        $result = DB::table('order_item')
            ->where('id', $id)
            ->update([
                'qty' => $new_qty,
            ]);

        return ($result > 0) ? redirect($this->url1 . $order_id . $this->url2)->with('message', 'Successfully edited order item') : redirect($this->url1 . $order_id . $this->url2 . $id . '/edit')->with('message', 'No data has been changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id, $id)
    {
        $result = DB::table('order_item')->where('id', $id, '', 'and')->where('order_id', $order_id)->delete();
        return ($result > 0) ? redirect($this->url1 . $order_id . $this->url2)->with('message', 'Successfully deleted order item') : redirect($this->url1 . $order_id . $this->url2)->with('message-failed', 'Failed deleted order item');
    }
}
