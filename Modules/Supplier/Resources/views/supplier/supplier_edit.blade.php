@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Supplier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Supplier</li>
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
                <h3 class="card-title">Edit Supplier</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form id="quickForm" method="POST" action="{{route('supplier.store')}}">
                  @csrf
                <div class="card-body">
                    <div class="row">
                   
                    <div class="form-group col-md-6">
                    <label for="name">Supplier Name</label>
                      <input type="text" name="name" value="{{$supplier->name}}" class="form-control" id="name" placeholder="Enter name">
                  </div>

                  <div class="form-group col-md-4">
              				<label for="image">Supplier Image</label>
              				<input type="file" name="image" class="form-control" id="image">
              			</div>
              			<div class="form-group col-md-2">
              				<img id="showImage" src="{{ url('upload/no-image.png')}}" style="width: 150px; height: 160px;border: 1px solid #000">
              			</div>

                  <div class="form-group col-md-6">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" value="{{$supplier->company_name}}" class="form-control" id="company_name" placeholder="Enter Company Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="vat_number">Vat Number</label>
                    <input type="email" name="vat_number" value="{{$supplier->vat_number}}" class="form-control" id="vat_number" placeholder="Enter email">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{$supplier->email}}" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  
                  
                  <div class="form-group col-md-6">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" value="{{$supplier->phone}}" class="form-control" id="phone" placeholder="phone">
                  </div>
                
                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{$supplier->address}}" class="form-control" id="address" placeholder="address">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" name="city" value="{{$supplier->city}}" class="form-control" id="city" placeholder="city">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="state">State</label>
                    <input type="text" name="state" value="{{$supplier->state}}" class="form-control" id="state" placeholder="state">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="country">Country</label>
                    <input type="text" name="country" value="{{$supplier->country}}" class="form-control" id="country" placeholder="country">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" name="postal_code" value="{{$supplier->postal_code}}" class="form-control" id="postal_code" placeholder="postal_code">
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