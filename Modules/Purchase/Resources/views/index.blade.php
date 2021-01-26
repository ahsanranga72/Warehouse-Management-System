@extends('layouts.master')
@section('content')
<style>
  @media (min-width: 576px) {
    .modal-dialog.order-table-custom-css {
      max-width: 750px;
    }
  }

  @media only print,
  print {
    body.non-print .close,
    body.non-print .content-wrapper,
    body.non-print .modal-footer,
    .modal-backdrop.toPrint {
      display: none !important;
      visibility: hidden !important;
    }

    .modal.toPrint {
      position: relative;
      overflow: hidden;
      visibility: visible;
      width: 100%;
      font-size: 80%;
    }

    .modal.toPrint .nav .li {
      visibility: hidden;
    }

    .modal.toPrint .nav .li.active {
      visibility: visible;
    }
  }
</style>


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
            <td><?php echo date('d-m-Y h:i A', strtotime($purchaselist->created_at)) ?></td>
            <td>{{$purchaselist['suplier']['name']}}</td>
            <td>{{$purchaselist['wareee']['name']}}</td>
            <td>{{$purchaselist['purchasestatus']['name']}}</td>
            <td>{{$purchaselist->grand_total}}</td>
            <td>
              <a href="{{route('purchase.list.edit', $purchaselist->id)}}" class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
              <button id="purchese-view" data-val='{{$purchaselist->id}}'  class="btn btn-sm btn-primary"  title="view"><i class="fa fa-eye"></i></button>
              <a href="{{ route('purchase.delete',$purchaselist->id)}}" id="delete" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog order-table-custom-css" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Purchase Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <section class="content purchase-view-modal">
          
        </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default print" onClick="window.print();return false">Print</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    // Add Print Classes for Modal
    $('.modal').on('shown.bs.modal', function() {
      $('.modal,.modal-backdrop').addClass('toPrint');
      $('body').addClass('non-print');
    });
    // Remove classes
    $('.modal').on('hidden.bs.modal', function() {
      $('.modal,.modal-backdrop').removeClass('toPrint');
      $('body').removeClass('non-print');
    });
  });

  //purchase view
  $(document).on('click', '#purchese-view', function() {
      var productId = $(this).attr('data-val')
        var _token = $('input[name="_token"]').val();
        $('#exampleModalLong').modal();
          $.ajax({
            url: "{{route('purchase.list.view', $purchaselist->id)}}",
            method: "get",
            data: {
              product_id: productId,
            },
            success: function(data) {
              console.log("Data",data)
              $('.purchase-view-modal').html(data)
              //$('#exampleModalLong').modal();
              
            }
          });

    });
  
</script>

@endsection