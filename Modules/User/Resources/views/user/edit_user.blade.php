@extends('layouts.master')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit User</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit User</h3>
            </div>
            <form id="quickForm" action="{{route('user.update', $user->id)}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control" id="first_name" placeholder="Enter First Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control" id="last_name" placeholder="Enter Last Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="user_name">User Name</label>
                    <input type="text" name="user_name" value="{{$user->name}}" class="form-control" id="user_name" placeholder="Enter User Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="company_name">Organization Name</label>
                    <input type="text" name="company_name" value="{{$user->company_name}}" class="form-control" id="company_name" placeholder="Enter Organization Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="usertype">Role</label>
                    <input type="text" name="usertype" value="{{$user->usertype}}" class="form-control" id="usertype" placeholder="Enter Role">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="phone">Contact Number</label>
                    <input type="text" name="phone" value="{{$user->phone}}" class="form-control" id="phone" placeholder="Enter Contact Number">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
        </div>
      </div>
    </div>
  </section>
</div>
@endsection