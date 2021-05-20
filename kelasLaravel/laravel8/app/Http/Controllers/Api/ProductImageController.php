<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProductImageController extends Controller
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
        $product = Product::find($product_id);
        if (empty($product)) {
            return response()->json(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }
        $validator = Validator::make($request->all(), [
            'image' => ['required', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $imageName = explode('.', $request->file('image')->getClientOriginalName())[0] . "-" . time() . "." . $request->file('image')->extension();
        $request->file('image')->move(public_path('images/products/detail_products'), $imageName);

        $product_image = ProductImage::create(['product_id' => $product_id, 'image' => $imageName])->with('product')->where('product_id', $product_id)->orderBy('id', 'DESC')->get();

        return response()->json(['message' => 'Product Image created', 'data' => $product_image], Response::HTTP_CREATED);
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
        $product_images = ProductImage::where('product_id', $product_id)->where('id', $id)->first();
        if (empty($product_images)) {
            return response()->json(['message' => 'Product image not found'], Response::HTTP_NOT_FOUND);
        }
        unlink(public_path('images/products/detail_products/' . $product_images->image));
        $product_images->delete();

        // Get order item by order id
        $product_images = ProductImage::with('product')->where('product_id', $product_id)->orderBy('id', 'DESC')->get();

        return response()->json(['message' => 'Product image  deleted', 'data' => $product_images], Response::HTTP_OK);
    }
}
