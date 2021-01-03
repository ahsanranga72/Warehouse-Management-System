@extends('layouts.master')
@section('content')
<div class="content-wrapper">

  <div class="card">
    <div class="card-header">
      <h3> Product list
        <a class="btn btn-success float-right btn-sm" href="{{route('add.product')}}"><i class="fa fa-plus-circle"></i>Add Product</a>
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
            <th>Image</th>
            <th>Name</th>
            <th>Code</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($productlists as $key => $productlist)
          <tr>
            <td>{{$key+1}}</td>
            <td>
              <img src="{{(!empty($productlist->product_image))?url('/upload/product_images/'.$productlist->product_image):url('/upload/no-image.png')}}" height="100px" width="120px"></td>
            <td>{{$productlist->product_name}}</td>
            <td>{{$productlist->product_code}}</td>
            <td>{{$productlist['brands']['name']}}</td>
            <td>{{$productlist['categories']['name']}}</td>
            <td>{{$productlist->stock_quantity}}</td>
            <td>{{$productlist->product_unit}}</td>
            <td>{{$productlist->product_price}}</td>
            <td>
              <a href="{{ route('products.edit',$productlist->id)}}" class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
              <a href="{{ route('product.delete',$productlist->id)}}" id="delete" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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