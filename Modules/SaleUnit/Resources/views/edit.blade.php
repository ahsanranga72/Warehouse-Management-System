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
              <h3>Edit Sale Unit
                <a class="btn btn-success float-right btn-sm" href="{{route('saleunit.view')}}">
                  <i class="fa fa-list"></i>Sale Unit List</a>
              </h3>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->

          <form id="quickForm" method="POST" action="{{route('saleunit.update', $saleunit->id)}}">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Edit Sale Unit</label>
                  <input type="text" name="name" value="{{$saleunit->name}}" class="form-control" id="name" placeholder="Enter name">
                  <font style="color: red">
                    {{($errors->has('name'))?($errors->first('name')):''}}
                  </font>
                </div>
                <div class="form-group col-md-6">
                  <label for="parent_id">Product Unit <span class="required-field">*</span></label>
                  <select name="parent_id" id="parent_id" class="form-control select" style="width: 100%;">
                    <option value="">--Select a Product Unit--</option>
                    @foreach ($productunits as $key => $productunit)
                    <option value="{{ $productunit->id }}" selected>{{ $productunit->name }}</option>
                    @endforeach
                  </select>
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