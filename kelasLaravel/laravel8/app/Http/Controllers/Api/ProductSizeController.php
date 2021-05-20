<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SizeItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($product_id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'size' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $product_size = SizeItem::where('product_id', $product_id)->where('size_id', $request->size)->first();
        if (!empty($product_size)) {
            return response()->json(['message' => 'size is already'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $product_sizes = SizeItem::create(['product_id' => $product_id, 'size_id' => $request->size])->with('product')->with('size')->where('product_id', $product_id)->get();

        return response()->json(['message' => 'Product Size created', 'data' => $product_sizes], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $id)
    {
        $product_size = SizeItem::where('product_id', $product_id)->where('id', $id)->first();
        if (empty($product_size)) {
            return response()->json(['message' => 'Product size not found'], Response::HTTP_NOT_FOUND);
        }
        $product_size->delete();

        // Get order item by order id
        $product_sizes = SizeItem::with('product')->with('size')->where('product_id', $product_id)->get();

        return response()->json(['message' => 'Product size deleted', 'data' => $product_sizes], Response::HTTP_OK);
    }
}
