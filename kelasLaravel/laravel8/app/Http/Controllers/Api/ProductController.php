<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    private $PRODUCT_NOT_FOUND = 'Product not found';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'DESC')->get();
        return response()->json(['message' => 'List products with order by id DESC', 'data' => $products], Response::HTTP_OK);
    }

    public function loadMore($count, $take)
    {
        $skip = 22 + $count;
        $products = Product::orderBy('id', 'DESC')->get();
        $products = $products->skip($skip)->take($take);
        return response()->json(['message' => 'List products with order by id DESC, skip and take', 'data' => $products], Response::HTTP_OK);
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
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'code' => ['required', 'unique:products'],
            'name' => ['required'],
            'stock' => ['required', 'integer'],
            'varian' => ['required'],
            'image' => ['required', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'description' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $imageName = explode('.', $request->file('image')->getClientOriginalName())[0] . "-" . time() . "." . $request->file('image')->extension();
        $request->file('image')->move(public_path('images/products'), $imageName);

        $data = $request->except(['image']);
        $data += ['image' => $imageName];
        $product = Product::create($data)->with('category')->orderBy('id', 'DESC')->get();

        return response()->json(['message' => 'Product created', 'data' => $product], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category')->find($id);
        return (empty($product)) ? response()->json(['message' => $this->PRODUCT_NOT_FOUND], Response::HTTP_NOT_FOUND) : response()->json(['message' => 'Product by id', 'data' => $product], Response::HTTP_OK);
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
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name' => ['required'],
            'stock' => ['required', 'integer'],
            'varian' => ['required'],
            'image' => ['mimes:jpg,jpeg,png,gif', 'max:2048'],
            'description' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $product = Product::find($id);
        if (empty($product)) {
            return response()->json(['message' => $this->PRODUCT_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }

        if (!empty($request->file('image'))) {
            unlink(public_path('images/products/' . $product->image));
            $imageName = explode('.', $request->file('image')->getClientOriginalName())[0] . "-" . time() . "." . $request->file('image')->extension();
            $request->file('image')->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->varian = $request->varian;
        $product->description = $request->description;
        $product->save();

        $dataProduct = Product::with('category')->orderBy('id', 'DESC')->get();
        return ($product->wasChanged()) ? response()->json(['message' => 'user edited', 'data' => $dataProduct], Response::HTTP_OK) : response()->json(null, Response::HTTP_NOT_MODIFIED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::with('category')->find($id);
        if (empty($product)) {
            return response()->json(['message' => $this->PRODUCT_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        unlink(public_path('images/products/' . $product->image));
        $product->delete();

        $product = Product::with('category')->orderBy('id', 'DESC')->get();
        return response()->json(['message' => 'Product deleted', 'data' => $product]);
    }
}
