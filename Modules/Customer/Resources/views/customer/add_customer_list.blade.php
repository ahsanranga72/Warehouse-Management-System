@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form id="quickForm" method="POST" action="{{route('customer.store')}}">
                  @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label for="customer_group">Customer Group</label>
                    <input type="text" name="customer_group" class="form-control" id="customer_group">
                  </div>
                    <div class="form-group col-md-6">
                    <label for="name">Customer Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Enter Company Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="balace">Balance</label>
                    <input type="text" name="balace" class="form-control" id="balace" placeholder="Balance">
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="tax_number">Tax</label>
                    <input type="text" name="tax_number" class="form-control" id="tax_number" placeholder="Tax">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
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