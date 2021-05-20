<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Divisima | My Profile';
        $data['provinces'] = Province::all();
        return view('user.account.profile', $data);
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
        $passRule = (!empty($request->password)) ? 'same:confirm_password|min:8' : 'same:confirm_password';

        $request->validate([
            'name' => 'required',
            'no_HP' => 'required|numeric|digits_between:10,13',
            'address' => 'required',
            'province_id' => 'required|integer|exists:provinces,id',
            'city_id' => 'required|integer|exists:cities,id',
            'image' => 'mimes:jpg,jpeg,png,gif|max:1048',
            'password' => $passRule,
            'confirm_password' => 'same:password'
        ]);

        $user = User::findOrFail($id);
        if (!empty($request->file('image'))) {
            $old_image = $user->image;
            if ($old_image != 'default.jpg') {
                unlink(public_path('images/users/' . $old_image));
            }
            $imageName = explode('.', $request->file('image')->getClientOriginalName())[0] . "-" . time() . "." . $request->file('image')->extension();
            $request->file('image')->move(public_path('images/users'), $imageName);
            $user->image = $imageName;
        }

        $user->name = $request->name;
        $user->no_HP = $request->no_HP;
        $user->address = $request->address;
        $user->province_id = $request->province_id;
        $user->city_id = $request->city_id;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return ($user->wasChanged()) ? redirect('/user/profile')->with('message', 'Successfully saved') : redirect('/user/profile')->with('message', 'No data has been changed');
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
