@extends('layouts.master');
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supplier List</h1>
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
                <h3 class="card-title">All Suplier List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
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
                    <td>{{$supplier->image}}
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
              <!-- /.card-body -->
            </div>
            </div> 
            </div>   
@endsection