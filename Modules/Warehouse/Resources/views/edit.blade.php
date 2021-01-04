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
              <h3>Edit Warehouse
                 <a class="btn btn-success float-right btn-sm" href="{{route('warehouse.view')}}">
                 <i class="fa fa-list"></i>Warehouse List</a>
                </h3>
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form id="quickForm" method="POST" action="{{route('warehouse.update', $warehouse->id)}}">
                  @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label for="name">Edit Warehouse </label>
                    <input type="text" name="name" value="{{$warehouse->name}}" class="form-control" id="name" 
                    placeholder="Enter name">
                    <font style="color: red">
              		  {{($errors->has('name'))?($errors->first('name')):''}}
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