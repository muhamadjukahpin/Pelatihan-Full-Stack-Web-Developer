<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private $USER_NOT_FOUND = 'User not found';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return response()->json([
            'message' => 'List users with order by id DESC',
            'data' => $users,
        ], Response::HTTP_OK);
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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $data = $request->except(['password', 'confirm_password']);
            $data += ['password' => Hash::make($request->password)];
            $user = User::create($data)->orderBy('id', 'DESC')->get();

            return response()->json(['message' => 'user created', 'data' => $user], Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed ' . $e->errorInfo]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return !empty($user) ? response()->json(['message' => 'User by id', 'data' => $user], Response::HTTP_OK) : response()->json(['message' => $this->USER_NOT_FOUND], Response::HTTP_NOT_FOUND);
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
        $user = User::find($id);
        if (empty($user)) {
            return response()->json(['message' => $this->USER_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        $emailRule = ($request->email != $user->email) ? ['required', 'email', 'unique:users'] : [''];
        $passRule = (!empty($request->password)) ? ['same:confirm_password', 'min:8'] : ['same:confirm_password'];
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => $emailRule,
            'password' => $passRule,
            'confirm_password' => ['same:password'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $dataUser = User::orderBy('id', 'DESC')->get();

        return ($user->wasChanged()) ? response()->json(['message' => 'user edited', 'data' => $dataUser], Response::HTTP_OK) : response()->json(null, Response::HTTP_NOT_MODIFIED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return response()->json(['message' => $this->USER_NOT_FOUND], Response::HTTP_NOT_FOUND);
        }
        $order = Order::where('user_id', $user->id)->first();

        if ($order) {
            return response()->json(['message' => 'cannot delete user']);
        }

        $user->delete();
        $user = User::orderBy('id', 'DESC')->get();
        return response()->json(['message' => 'User deleted', 'data' => $user]);
    }
}
