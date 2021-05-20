<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    private $ORDER_NOT_FOUND = 'Order not found';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->with('user')->get();
        return response()->json(['message' => 'List orders with order by id DESC', 'data' => $orders], Response::HTTP_OK);
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $order = Order::create($request->all())->with('user')->orderBy('id', 'DESC')->get();

        return response()->json(['message' => 'Order Created', 'data' => $order], Response::HTTP_CREATED);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $order = Order::find($id);
        if (!empty($order)) {
            response()->json(['message' => $this->ORDER_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        $order->user_id = $request->user_id;
        $order->save();

        $dataOrder = Order::with('user')->orderBy('id', 'DESC')->get();

        return ($order->wasChanged()) ? response()->json(['message' => 'Order edited', 'data' => $dataOrder], Response::HTTP_OK) : response()->json(null, Response::HTTP_NOT_MODIFIED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if (empty($order)) {
            return response()->json(['message' => $this->ORDER_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        $order->delete();

        $order = Order::with('user')->orderBy('id', 'DESC')->get();
        return response()->json(['message' => 'Order deleted', 'data' => $order]);
    }
}
