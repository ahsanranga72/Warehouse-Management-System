@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
<div class="card">
              <div class="card-header">
              <h3>Order Vat list
              <a class="btn btn-success float-right btn-sm" href="{{route('add.ordertax')}}">
              <i class="fa fa-plus-circle"></i>Add Order Vat</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  @if(Session::has('message'))
               <div class="alert alert-success" role="alert">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 {{Session::get('message')}}
               </div>
              @endif
                  <tr>
                  <th>SL</th>
                    <th>Vat Name</th>
                    <th>Vat Number %</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($ordertaxs as  $key => $ordertax)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$ordertax->name}}</td>
                    <td>{{$ordertax->tax_number}}</td>
                    <td>
                    <a href="{{ route('ordertax.edit',$ordertax->id)}}" class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
                  	<a href="{{ route('ordertax.delete',$ordertax->id)}}" id="delete" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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