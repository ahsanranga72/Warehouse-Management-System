@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
              <h3>Add Order Vat
                 <a class="btn btn-success float-right btn-sm" href="{{route('ordertax.view')}}">
                 <i class="fa fa-list"></i>Order Vat List</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form id="quickForm" method="POST" action="{{route('ordertax.store')}}">
                  @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label for="name">Order Vat Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Vat Name">
                    <font style="color: red">
              		  {{($errors->has('name'))?($errors->first('name')):''}}
              		</font>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="tax_number">Order Vat Number %</label>
                    <input type="text" name="tax_number" class="form-control" id="name" placeholder="Enter Vat Number in %">
                    <font style="color: red">
              		  {{($errors->has('tax_number'))?($errors->first('tax_number')):''}}
              		</font>
                  </div>
                </div>
                    </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection