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
      <div class="card card-default">
        <div class="card-body">
          <form action="{{route('store.product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="productType">Product Type <span class="required-field">*</span></label>
                  <select name="productType" id="productType" class="form-control select2" style="width: 100%;">
                    <option value="1">Alabama</option>
                    <option value="2">Alaska</option>
                    <option value="3">California</option>
                    <option value="4">Delaware</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productName">Product Name <span class="required-field">*</span></label>
                  <input type="productName" name="productName" class="form-control" id="productName" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productCode">Product Code <span class="required-field">*</span></label>
                  <input type="productCode" name="productCode" class="form-control" id="productCode" style="width: 100%;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="barcodeSymbology">Barcode Symbology <span class="required-field">*</span></label>
                  <select name="barcodeSymbology" id="barcodeSymbology" class="form-control select2" style="width: 100%;">
                    <option value="1">Code 128</option>
                    <option value="2">Code 39</option>
                    <option value="3">UPC-A</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="brand">Brand</label>
                  <select name="brand" id="brand" class="form-control select2" style="width: 100%;">
                    <option value="1">HP</option>
                    <option value="2">DELL</option>
                    <option value="3">Lenevo</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="category">Category <span class="required-field">*</span></label>
                  <select name="category" id="category" class="form-control select2" style="width: 100%;">
                    <option value="1">Analog</option>
                    <option value="2">Combo</option>
                    <option value="3">Digital</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="productUnit">Product Unit <span class="required-field">*</span></label>
                    <select name="productUnit" id="productUnit" class="form-control select2" style="width: 100%;" >
                      <option value="1">Select Product Unit</option>
                      <option value="2">Alaska</option>
                      <option value="3">California</option>
                    </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="saleUnit">Sale Unit</label>
                  <select name="saleUnit" id="saleUnit" class="form-control select2" style="width: 100%;">
                    <option value="1">Selct Sale Unit</option>
                    <option value="2">Alaska</option>
                    <option value="3">California</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                    <label for="purchaseUnit">Purchase Unit</label>
                    <select name="purchaseUnit" id="purchaseUnit" class="form-control select2" style="width: 100%;" >
                        <option value="1">Select Purchase Unit</option>
                        <option value="2">Alaska</option>
                        <option value="3">California</option>
                    </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productCost">Product Cost <span class="required-field">*</span></label>
                  <input type="productCost" name="productCost" class="form-control" id="productCost" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productPrice">Product Price <span class="required-field">*</span></label>
                  <input type="productPrice" name="productPrice" class="form-control" id="productPrice" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productTax">Product Tax</label>
                  <input type="productTax" name="productTax" class="form-control" id="productTax" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="taxMethod">Tax Method</label>
                  <select name="taxMethod" id="taxMethod" class="form-control select2"  style="width: 100%;">
                    <option value="1">Exclusive</option>
                    <option value="2">Inclusive</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card card-default">
                  <div class="card-header" style="width: 100%;">
                    <label for="productImage">Product Image</label>
                    <div name="productImage" id="productImage" class="input-images"  ></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card-header" style="width: 100%;">
                  <label for="productDetails">Product Details</label>
                </div>
                <div class="card-body">
                  <textarea class="summernote" name="summernote" id="summernote">
                    
                  </textarea>
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

