@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="card">
    <div class="card-header">
      <h3> Sale List
        <a class="btn btn-success float-right btn-sm" href="{{route('add.sale')}}"><i class="fa fa-plus-circle">
          </i>Add Sale</a>
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
            <th>Reference</th>
            <th>Biller</th>
            <th>Customer</th>
            <th>Warehouse</th>
            <th>Grand Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($salelists as $key => $salelist)
          <tr>
            <td>{{$key+1}}</td>
            <td><?php echo date('d-m-Y h:i A', strtotime($salelist->created_at)) ?></td>
            <td>{{$salelist->referent_no}}</td>
            <td>{{$salelist['user']['name']}}</td>
            <td>{{$salelist['customer']['name']}}</td>
            <!-- <td>{{$salelist->sale_status}}</td>
                    <td>{{$salelist->payment_status_id}}</td> -->
            <td>{{$salelist['wareee']['name']}}</td>
            <td>{{$salelist->grand_total}}</td>
            <td>
              <a href="{{ route('customer.edit',$salelist->id)}}" class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
              <a href="{{ route('product.delete',$salelist->id)}}" id="delete" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
          </tfoot>
      </table>
    </div>
  </div>
</div>
</div>
@endsection