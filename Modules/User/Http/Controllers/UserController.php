<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Entities\User;

class UserController extends Controller
{
    public function view()
    {
        $data['alldata'] = User::all();
        return view('user::user.user-view', $data);
    }
    public function add()
    {
        return view('user::user.add-view');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email'
        ]);
        $data = new User();

        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('users.view')->with('success', 'Data add success');
    }

    public function edit($id)
    {
        $editData = User::find($id);
        return view('user::user.edit-data', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('users.view')->with('success', 'Data update success');
    }

    public function delete($id)
    {
        $data = User::find($id);
        /*if (file_exists('public/upload/user_images/' .$user->image) AND ! empty($user->image)) {
                    unlink('public/upload/user_images/' . $user->image);
                }*/
        $data->delete();
        return redirect()->route('users.view')->with('success', 'Data deleted success');
    }
}
