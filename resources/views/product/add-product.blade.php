@extends('layouts.home')
@section('stylesheets')
<style>
.required-field{
  color:red;
}
</style>
<link rel="stylesheet" href="{{ asset('public/assets/plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Product</h1>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group" >
                  <label>Product Type <span class="required-field">*</span></label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-">
                <div class="form-group">
                  <label for="productName">Product Name <span class="required-field">*</span></label>
                  <input type="productName" name="productName" class="form-control" id="productName">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productCode">Product Code <span class="required-field">*</span></label>
                  <input type="productCode" name="productCode" class="form-control" id="productCode">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group" >
                  <label>Barcode Symbology <span class="required-field">*</span></label>
                  <select class="form-control select2">
                    <option>Code 128</option>
                    <option>Code 39</option>
                    <option>UPC-A</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                  <label>Category <span class="required-field">*</span></label>
                  <select class="form-control select2">
                    <option>Analog</option>
                    <option>Combo</option>
                    <option>Digital</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                    <label>Product Unit <span class="required-field">*</span></label>
                    <select class="form-control select2" >
                      <option selected="selected">Select Product Unit</option>
                      <option>Alaska</option>
                      <option>California</option>
                    </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group" >
                  <label>Sale Unit</label>
                  <select class="form-control select2">
                    <option selected="selected">Selct Sale Unit</option>
                    <option>Alaska</option>
                    <option>California</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                    <label>Purchase Unit</label>
                    <select class="form-control select2" >
                        <option selected="selected">Select Purchase Unit</option>
                        <option>Alaska</option>
                        <option>California</option>
                    </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productCost">Product Cost <span class="required-field">*</span></label>
                  <input type="productCost" name="productCost" class="form-control" id="productCost">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productPrice">Product Price <span class="required-field">*</span></label>
                  <input type="productPrice" name="productPrice" class="form-control" id="productPrice">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productTax">Product Tax</label>
                  <input type="productTax" name="productTax" class="form-control" id="productTax">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                  <label>Tax Method</label>
                  <select class="form-control select2" >
                    <option selected="selected">Exclusive</option>
                    <option>Inclusive</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <label>Product Image</label>
                <div class="input-images"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="card-header">
                    <label>Summernote</label>
                  </div>
                  <div class="card-body">
                    <textarea id="summernote">
                     
                    </textarea>
                  </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
  </section> 
</div>


@endsection

@push('scripts')
<script src="{{ asset('public/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // alert("dwe")
    $('.input-images').imageUploader({
      imagesInputName: 'images',
      preloadedInputName: 'preloaded',
      label: 'Drag & Drop files here or click to browse'
    });

    $('#summernote').summernote();

    $('.select2').select2({
      theme: 'bootstrap4'
    })

    // $('.select2bs4').select2({
    //   theme: 'bootstrap4'
    // })

  })   
</script>
@endpush

