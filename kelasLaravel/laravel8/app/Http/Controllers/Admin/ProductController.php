<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\SizeItem;
use App\Models\SubCategory;

class ProductController extends Controller
{
    private $url = '/admin/products/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Admin Divisima | Products';
        $data['titleBread'] = 'Data Products';
        $data['products'] = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin.product.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Admin Divisima | Form Insert Product Data';
        $data['titleBread'] = 'Form Insert Product Data';
        $data['categories'] = Category::all();
        $data['sizes'] = Size::all();
        return view('admin.product.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruleSubCategory = 'required';
        if (!empty($request->category_id)) {
            $sub_categories = SubCategory::where('category_id', $request->category_id)->get();
            $ruleSubCategory = (!empty($sub_categories)) ? 'required|integer|exists:sub_categories,id' : '';
        }
        $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'sub_category_id' => $ruleSubCategory,
            'code' => 'required|unique:products',
            'name' => 'required',
            'stock' => 'required|integer',
            'varian' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'sizes' => 'required',
            'description' => 'required',
        ]);

        $imageName = explode('.', $request->file('image')->getClientOriginalName())[0] . "-" . time() . "." . $request->file('image')->extension();
        $request->file('image')->move(public_path('images/products'), $imageName);
        $slug = str_replace(' ', '-', $request->name) . "-" . time();
        $product = Product::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'code' => $request->code,
            'name' => $request->name,
            'slug' => $slug,
            'stock' => $request->stock,
            'varian' => $request->varian,
            'price' => $request->price,
            'image' => $imageName,
            'description' => $request->description,
        ]);


        $sizes = [];
        foreach ($request->sizes as  $size) {
            array_push($sizes, ['product_id' => $product->id, 'size_id' => $size]);
        }

        SizeItem::insert($sizes);

        return redirect($this->url)->with('message', 'Successfully entered or added product data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Admin Divisima | Detail Product';
        $data['titleBread'] = 'Detail Product';
        $data['product'] = Product::findOrFail($id);
        $data['sizes'] = Size::all();
        $data['product_sizes'] = SizeItem::with('size')->where('product_id', $id)->get();
        return view('admin.product.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Admin Divisima | Form Edit Product Data';
        $data['titleBread'] = 'Form Edit Product Data';
        $data['categories'] = Category::all();
        $data['product'] = Product::findOrFail($id);
        return view('admin.product.edit', $data);
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
        $ruleSubCategory = 'required';
        if (!empty($request->category_id)) {
            $sub_categories = SubCategory::where('category_id', $request->category_id)->get();
            $ruleSubCategory = (!empty($sub_categories)) ? 'required|integer|exists:sub_categories,id' : '';
        }
        $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'sub_category_id' => $ruleSubCategory,
            'name' => 'required',
            'stock' => 'required|integer',
            'varian' => 'required',
            'price' => 'required|numeric',
            'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'required',
        ]);

        $product = Product::findOrFail($id);
        if (!empty($request->file('image'))) {
            unlink(public_path('images/products/' . $product->image));
            $imageName = explode('.', $request->file('image')->getClientOriginalName())[0] . "-" . time() . "." . $request->file('image')->extension();
            $request->file('image')->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }
        $slug = str_replace(' ', '-', $request->name) . "-" . time();

        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->name = $request->name;
        $product->slug = $slug;
        $product->stock = $request->stock;
        $product->varian = $request->varian;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return ($product->wasChanged()) ? redirect($this->url)->with('message', 'Successfully edited product data') : redirect($this->url . $id . '/edit')->with('message', 'No data has been changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        unlink(public_path('images/products/' . $product->image));
        $product->delete();
        return redirect($this->url)->with('message', 'successfully deleted product data');
    }
}
