@extends('layouts.master');
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Customer List</h1>
        </div>
        <div class="col-sm-6">
          <a class="btn btn-success float-right btn-sm" href="{{route('add.customer.list')}}"><i class="fa fa-plus-circle"></i>Add Customer</a>
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
              <h3 class="card-title">Customer List</h3>
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
                  <th>Customer Group</th>
                  <th>Customer Name</th>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>Balance</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($customer as $key => $customers)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$customers->customer_group}}</td>
                  <td>{{$customers->name}}</td>
                  <td>{{$customers->company_name}}</td>
                  <td>{{$customers->email}}</td>
                  <td>{{$customers->phone}}</td>
                  <td>{{$customers->gender}}</td>
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
        </div>
      </div>
    </div>
  </section>
</div>
@endsection