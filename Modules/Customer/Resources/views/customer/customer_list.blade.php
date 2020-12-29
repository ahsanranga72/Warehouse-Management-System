@extends('layouts.master');
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer List</h1>
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

<div class="card">
              <div class="card-header">
                <h3 class="card-title">All Customer List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  @if(Session::has('message'))
               <div class="alert alert-success" role="alert">
                 {{Session::get('message')}}
               </div>
              @endif
                  <tr>
                  <th>SL</th>
                    <th>Customer Group</th>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Tax Number</th>
                    <th>Address</th>
                    <th>Balance</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($customer as $customers)
                  <tr>
                  <td>{{$customers->id}}</td>
                    <td>{{$customers->customer_group}}</td>
                    <td>{{$customers->name}}</td>
                    <td>{{$customers->company_name}}</td>
                    <td>{{$customers->email}}</td>
                    <td>{{$customers->phone}}</td>
                    <td>{{$customers->tax_number}}</td>
                    <td>{{$customers->address}}</td>
                    <td>{{$customers->balace}}</td>
                    <td>
                    <a href="{{ route('customer.edit',$customers->id)}}" class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
                  	<a href="{{ route('customer.delete',$customers->id)}}" id="delete" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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