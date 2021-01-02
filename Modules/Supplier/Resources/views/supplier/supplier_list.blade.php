@extends('layouts.master');
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Supplier List</h1>
        </div>
        <div class="col-sm-6">
          <a class="btn btn-success float-right btn-sm" href="{{route('add.supplier.list')}}"><i class="fa fa-plus-circle"></i>Add Supplier</a>
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
                  <th> SL</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Company Name</th>
                  <th>Vat Number</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($suppliers as $supplier)
                <tr>
                  <td>{{$supplier->id}}</td>
                  <td><img src="{{(!empty($supplier->image))?url('upload/supplier_images/'.$supplier->image):url('upload/no-image.png')}}" height="130px" width="120px"></td>
                  </td>
                  <td>{{$supplier->name}}</td>
                  <td>{{$supplier->company_name}}</td>
                  <td>{{$supplier->vat_number}}</td>
                  <td>{{$supplier->email}}</td>
                  <td>{{$supplier->phone}}</td>
                  <td>{{$supplier->address}}</td>
                  <td>
                    <a href="{{ route('supplier.edit',$supplier->id)}}" class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('supplier.delete',$supplier->id)}}" id="delete" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
 @endsection