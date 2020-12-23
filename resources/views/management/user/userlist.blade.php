@extends('layouts.master');
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if(Session::has('message'))
      <div class="alert alert-success" role="alert"> 
         {{Session::get('message')}}
      </div>
    @endif

<div class="card">
              <div class="card-header">
                <h3 class="card-title">All User List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>SL</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Company Name</th>
                    <th>Phone Number</th>
                    <th>Roll</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->user_name}}</td>
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
              <!-- /.card-body -->
            </div>
            </div> 
            </div>   
@endsection