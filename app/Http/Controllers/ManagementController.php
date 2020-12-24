<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManagementController extends Controller
{
    public function UserList(){
        $users = User::orderBy('id', 'DESC')->get();
        return view('management.user.userlist', compact('users'));
    }

    public function AddUserList(){
        return view('management.user.add_user_list');
    }

    public function UserStore(Request $request){
        $user = New User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->user_name;
        $user->company_name = $request->company_name;
        $user->usertype = $request->usertype;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt('password');
        $user->save();
        return redirect()->route('user.list')->with('message', 'User Create Successfully');
    }

    public function UserEdit($id){
        $user = User::where('id', $id)->first();
        return view('management.user.edit_user', compact('user'));
    }

    public function UpdateUser(Request $request, $id){
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->user_name;
        $user->company_name = $request->company_name;
        $user->usertype = $request->usertype;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('user.list')->with('message', 'User Delete Successfully');
    }

    public function UserDelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.list')->with('message', 'User Deleled Successfully');

    }
}
