@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    
<div class="card">
              <div class="card-header">
              <h3> Purchase List
              <a class="btn btn-success float-right btn-sm" href="{{route('purchase.add')}}"><i class="fa fa-plus-circle">
              </i>Add Purchase</a>
                </h3>
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
                    <th>Date</th>
                    <th>Supplier</th>
                    <th>Warehouse</th>
                    <th>Purchase Status</th>
                    <th>Grand Total</th>
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($purchaselists as $key => $purchaselist)
                  <tr>
                  <td>{{$key+1}}</td>
                    <td><?php  echo date('d-m-Y h:i A',strtotime($purchaselist->created_at)) ?></td>
                    <td>{{$purchaselist['suplier']['name']}}</td>
                    <td>{{$purchaselist['wareee']['name']}}</td>
                    <td>{{$purchaselist['purchasestatus']['name']}}</td>
                    <td>{{$purchaselist->grand_total}}</td>
                    <td>
                    <a href="{{ route('customer.edit',$purchaselist->id)}}" class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
                  	<a href="{{ route('product.delete',$purchaselist->id)}}" id="delete" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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