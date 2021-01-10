<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Entities\User;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

        public function view(){
            $id = Auth::user()->id;
            $user = User::find($id);
        return view('user::user.profile-view', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $id = Auth::user()->id;
    	$editData = User::find($id);
        return view('user::user.profile-edit',compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $data = User::find(Auth::user()->id);
  	$data->name = $request->name;
  	$data->email = $request->email;
  	$data->mobile = $request->mobile;
  	$data->address = $request->address;
  	$data->gender = $request->gender;
  	if ($request->file('image')) {
  		$file = $request->file('image');
  		@unlink(public_path('upload/user_images/'.$data->image));
  		$filename =date('YmdHi').$file->getClientORiginalName();
  		$file->move(public_path('upload/user_images'), $filename);
  		$data['image'] = $filename;
  	}
  	     $data->save();
  	      return redirect()->route('profile.view')->with('success', 'Profile update success');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function passwordView(){
        return view('user::user.edit-password');
    }
  
    public function passwordupdate(Request $request){
        if (Auth::attempt(['id'=>Auth::user()->id, 'password'=>$request->current_password])){
  
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profile.view')->with('success' , 'Password changed successfully');
        }else{
            return redirect()->back()->with('error', 'Sorry! your current password dost not match');
        }
  
    }
}
