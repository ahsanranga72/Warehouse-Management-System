@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Customer</h1>
        </div>
        <div class="col-sm-6">
          <a class="btn btn-success float-right btn-sm" href="{{route('customer.list')}}"><i class="fa fa-plus-circle"></i>Customer List</a>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Customer</h3>
            </div>
            <form id="quickForm" method="POST" action="{{route('customer.store')}}">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="customer_group">Customer Group</label>
                    <input type="text" name="customer_group" class="form-control" id="customer_group" placeholder="Enter Customer Group">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Customer Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Customer Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Enter Customer Company Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Customer email">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Customer Phone Number">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="balace">Balance</label>
                    <input type="text" name="balace" class="form-control" id="balace" placeholder="Enter Customer Balance">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="tax_number">Tax</label>
                    <input type="text" name="tax_number" class="form-control" id="tax_number" placeholder="Enter Customer Tax">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Customer Address">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
        </div>
      </div>
    </div>
  </section>
</div>
@endsection