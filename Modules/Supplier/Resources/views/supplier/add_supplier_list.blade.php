@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Suuplier</h1>
        </div>
        <div class="col-sm-6">
          <a class="btn btn-success float-right btn-sm" href="{{route('supplier.list')}}"><i class="fa fa-plus-circle"></i>Supplier List</a>
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
              <h3 class="card-title">Add Suuplier</h3>
            </div>
            <form id="quickForm" method="POST" action="{{route('supplier.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Supplier Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Supplier Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputFile">Supplier Document</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="company_name">Organization Name</label>
                    <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Enter Supplier Company Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="vat_number">Vat Number</label>
                    <input type="text" name="vat_number" class="form-control" id="vat_number" placeholder="Enter Supplier Vat Number">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Supplier email">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="phone">Contact Number</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Supplier Phone Number">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Supplier Address">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="Enter Supplier City">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="state">State</label>
                    <input type="text" name="state" class="form-control" id="state" placeholder="Enter Supplier State">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="Enter Supplier Postal Code">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="country">Country</label>
                    <input type="text" name="country" class="form-control" id="country" placeholder="Enter Supplier Country">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection