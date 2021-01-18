@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
<div class="card">
              <div class="card-header">
              <h3>Category list
              <a class="btn btn-success float-right btn-sm" href="{{route('add.category')}}">
              <i class="fa fa-plus-circle"></i>Add Category</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  @if(Session::has('message'))
               <div class="alert alert-success" role="alert">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 {{Session::get('message')}}
               </div>
              @endif
                  <tr>
                  <th>SL</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as  $key => $category)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                    <a href="{{ route('category.edit',$category->id)}}" class="btn btn-sm btn-primary" title="edit"><i class="fa fa-edit"></i></a>
                  	<a href="{{ route('category.delete',$category->id)}}" id="delete" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
@endsection