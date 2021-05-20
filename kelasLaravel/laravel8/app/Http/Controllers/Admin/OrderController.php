<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $url = '/admin/orders/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Admin Divisima | Orders';
        $data['titleBread'] = 'Data Orders';
        $data['orders'] = DB::table('orders')
            ->select('orders.id', 'orders.user_id', 'users.name', 'users.email')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->orderBy('orders.id', 'DESC')
            ->paginate(10);
        return view('admin.order.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Admin Divisima | Form Add Order';
        $data['titleBread'] = 'Form Add Order';
        $data['users'] = DB::table('users')->get();
        return view('admin.order.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $id = DB::table('orders')->insertGetId([
            'user_id' => $request->user_id,
        ]);

        return redirect($this->url . $id . '/order_item')->with('message', 'Successfully added order');
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
    public function edit($id)
    {
        $data['title'] = 'Admin Divisima | Form Edit Order';
        $data['titleBread'] = 'Form Edit Order';
        $data['users'] = DB::table('users')->get();
        $data['order'] = DB::table('orders')->where('id', $id)->first();
        return view('admin.order.edit', $data);
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
        $request->validate([
            'user_id' => 'required',
        ]);

        $result = DB::table('orders')
            ->where('id', $id)
            ->update([
                'user_id' => $request->user_id,
            ]);

        return ($result > 0) ? redirect($this->url)->with('message', 'Successfully edited order') : redirect($this->url . $id . '/edit')->with('message', 'No data has been changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = DB::table('orders')->where('id', $id)->delete();
        return ($result > 0) ? redirect($this->url)->with('message', 'Successfully deleted order') : redirect($this->url)->with('message-failed', 'Failed deleted order');
    }
}
