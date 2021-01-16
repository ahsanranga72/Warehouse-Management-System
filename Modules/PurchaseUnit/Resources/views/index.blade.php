@extends('layouts.master');
@section('content')
<div class="content-wrapper">

  <div class="card">
    <div class="card-header">
      <h3>Purchase Unit list
        <a class="btn btn-success float-right btn-sm" href="{{route('add.purchaseunit')}}">
          <i class="fa fa-plus-circle"></i>Add Purchase Unit</a>
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
            <th>Purchase Unit Name</th>
            <th>Product Unit Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($purchaseunits as $key => $purchaseunit)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$purchaseunit->name}}</td>
            <td>{{$purchaseunit['productunit']['name']}}</td>
            <td>
              <a href="{{ route('purchaseunit.edit',$purchaseunit->id)}}" class="btn btn-sm btn-primary" title="edit">
                <i class="fa fa-edit"></i></a>
              <a href="{{ route('purchaseunit.delete',$purchaseunit->id)}}" id="delete" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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