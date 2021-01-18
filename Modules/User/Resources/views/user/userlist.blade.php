@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User List</h1>
        </div>
        <div class="col-sm-6">
          <a class="btn btn-success float-right btn-sm" href="{{route('add.user.list')}}"><i class="fa fa-plus-circle"></i>Add User</a>
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
              <h3 class="card-title">User List</h3>
            </div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                  {{Session::get('message')}}
                </div>
                @endif
                <tr>
                  <th>SL</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Organization Name</th>
                  <th>Contact Number</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}
                  </td>
                  <td>{{$user->company_name}}</td>
                  <td>{{$user->phone}}</td>
                  <td>{{$user->usertype}}</td>
                  <td>Admin</td>
                  <td>
                    <a href="{{ route('user.edit',$user->id)}}" class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('user.delete',$user->id)}}" id="delete" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection