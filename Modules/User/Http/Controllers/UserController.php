<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Entities\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('user::user.userlist', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function AddUserList()
    {
        return view('user::user.add_user_list');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function UserStore(Request $request)
    {
        $user = New User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->name;
        $user->company_name = $request->company_name;
        $user->usertype = $request->usertype;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt('password');
        $user->save();
        return redirect()->route('user.list')->with('message', 'User Create Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function UserEdit($id)
    {
        $user = User::where('id', $id)->first();
        return view('user::user.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function UpdateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->name;
        $user->company_name = $request->company_name;
        $user->usertype = $request->usertype;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('user.list')->with('message', 'User Delete Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function UserDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.list')->with('message', 'User Deleled Successfully');
    }
}
