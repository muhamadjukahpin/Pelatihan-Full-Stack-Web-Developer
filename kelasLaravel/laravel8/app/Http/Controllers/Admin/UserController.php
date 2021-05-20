<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $url = '/admin/users/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Admin Divisima | Users';
        $data['titleBread'] = 'Data Users';
        $data['users'] = User::orderBy('id', 'DESC')->paginate(10);
        return view('admin.user.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Admin Divisima | Form Insert User Data';
        $data['titleBread'] = 'Form Insert User Data';
        return view('admin.user.add', $data);
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect($this->url)->with('message', 'successfully entered or added user data');
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
        $data['title'] = 'Admin Divisima | Form Edit User Data';
        $data['titleBread'] = 'Form Edit User Data';
        $data['user'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
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
        $user = User::findOrFail($id);
        $emailRule = ($request->email != $user->email) ? 'required|email|unique:users' : '';
        $passRule = (!empty($request->password)) ? 'same:confirm_password|min:8' : 'same:confirm_password';

        $request->validate([
            'name' => 'required',
            'email' => $emailRule,
            'password' => $passRule,
            'confirm_password' => 'same:password',
        ]);

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        return ($user->wasChanged()) ? redirect($this->url)->with('message', 'successfully edited user data') : redirect($this->url . $id . '/edit')->with('message', 'No data has been changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $order = Order::where('user_id', $user->id)->first();
        if ($order) {
            return redirect($this->url)->with('message-failed', 'cannot delete user');
        }
        $user->delete();
        return redirect($this->url)->with('message', 'successfully deleted user data');
    }
}
