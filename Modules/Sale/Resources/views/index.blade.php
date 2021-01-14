@extends('layouts.master')
@section('content')
<style>
  @media (min-width: 576px) {
    .modal-dialog.order-table-custom-css {
      max-width: 750px;
    }
  }
</style>
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
              <a href="{{ route('sale.edit',$salelist->id)}}" class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
              <a href="{{route('list.view', $salelist->id)}}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalLong" title="view"><i class="fa fa-eye"></i></a>
              <a href="{{ route('sale.delete',$salelist->id)}}" id="delete" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
         
          </tfoot>
      </table>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog order-table-custom-css" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sale Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <section class="content">
          <div class="container-fluid">
            <div class="card card-default">
              <div class="card-body">
                <form name="AddPurchase" id="AddPurchase" action="javascript:void(0)" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="warehouse">Warehouse Name: </label>
                        
                         {{$salelist['wareee']['name']}}
                        
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label for="warehouse"> Customer Name: </label>
                     
                      {{$salelist['customer']['name']}}
                    
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label for="warehouse"> Supplier Name: </label>
                      
                      {{$salelist['purchasestatus']['name']}}
                      
                      </div>
                    </div>
                   
                  </div>
                
                 
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <div class="form-group">
                        <label for="orderTax">Order Tax :  </label>
                        {{$salelist->order_tax_id}}
                      </div>
                    </div>
                    <div class="form-group col-lg-4">
                      <div class="form-group">
                        <label class="orderDiscount" for="orderDiscount">Discount :</label>
                        {{$salelist->order_discount}}
                      </div>
                    </div>
                    <div class="form-group col-lg-4">
                      <div class="form-group">
                        <label for="shippingCost">Shipping Cost</label>
                       
                        {{$salelist->order_shipping_cost}}
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label for="note">Note</label>
                     
                      {{$salelist->note}}
                     
                    </div>
                  </div>
                  
                </form>
                <div class="table">
                        <table id="orderTable" class="table table-bordered table-striped">
                          <thead>
                            <th>Product Name</th>
                            <th>Quantity </th>
                            <th class="rcvcolumn">Received</th>
                            <th>Net Unit Cost</th>
                            <th>Discount</th>
                            <th>Tax</th>
                            <th>Sub Total</th>
                          
                          </thead>
                          <tbody class="tableBody">

                          </tbody>
                          <tfoot>
                            <tr>
                           
                              <td>{{$salelist->product_id}}</td>
                            
                              <td><label class="totalQuantity">{{$salelist->items}}</td>
                              <td class="ftrcvrow">{{$salelist->received_quantity}}</td>
                              <td>{{$salelist->order_shipping_cost}}</td>
                              <td>{{$salelist->order_discount}}</td>
                              <td><label class="totaltax"></label>{{$salelist->order_tax}}</td>
                              <td><label class="grandtotal" id="grandtotal"></label>{{$salelist->grand_total}}</td>
                            </tr>
                          </tfoot>
                          @endforeach
                        </table>
                      </div>
                <div class="table">
                  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" href="{{ url('/list') }}" class="btnprn btn">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection