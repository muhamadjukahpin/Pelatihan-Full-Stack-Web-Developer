<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Divisima | Category';
        $data['products'] = Product::orderBy('id', 'DESC')->paginate(12);
        $data['categories'] = Category::with('sub_categories')->get();
        return view('category', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        $products = Product::with('category')->with('sub_category')->where('category_id', $category_id)->orderBy('id', 'DESC')->get();
        return response()->json(['message' => 'List products with category_id=' . $category_id . ' by id DESC', 'data' => $products], Response::HTTP_OK);
    }

    public function showCategoryName($category_name)
    {
        $category_name = urldecode($category_name);
        $category_id = Category::where('name', $category_name)->firstOrFail();
        dd(urldecode($category_name), $category_id);
        $products = Product::where('category_id', $category_id)->orderBy('id', 'DESC')->get();
    }

    public function showSubCategory($category_id, $sub_category_id)
    {
        $products = Product::with('category')->with('sub_category')->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->orderBy('id', 'DESC')->get();
        return response()->json(['message' => 'List products with category_id=' . $category_id . ' and sub_category_id=' . $sub_category_id . ' by id DESC', 'data' => $products], Response::HTTP_OK);
    }

    public function sortPrice($sort)
    {
        $products = Product::with('category')->with('sub_category')->orderBy('price', $sort)->get();
        return response()->json(['message' => 'List products by price ' . $sort, 'data' => $products], Response::HTTP_OK);
    }

    public function sortPriceCategory($sort, $category_id)
    {
        $products = Product::with('category')->with('sub_category')->where('category_id', $category_id)->orderBy('price', $sort)->get();
        return response()->json(['message' => 'List products by Price ' . $sort . ' where category_id=' . $category_id, 'data' => $products], Response::HTTP_OK);
    }

    public function sortPriceCategoryAndSubCategory($sort, $category_id, $sub_category_id)
    {
        $products = Product::with('category')->with('sub_category')->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->orderBy('price', $sort)->get();
        return response()->json(['message' => 'List products by Price ' . $sort . ' where category_id=' . $category_id . 'and sub_category_id=' . $sub_category_id, 'data' => $products], Response::HTTP_OK);
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
    public function destroy($id)
    {
        //
    }
}
