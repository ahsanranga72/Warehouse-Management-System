@extends('layouts.master')
@section('stylesheets')
<style>
  .required-field {
    color: red;
  }
</style>
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h3>Edit Product
        <a class="btn btn-success float-right btn-sm" href="{{route('products.list')}}"><i class="fa fa-list"></i>Product List</a>
      </h3>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-body">
            <form id="quickForm" method="POST" action="{{route('products.update', $productlists->id)}}">
                  @csrf
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productType">Product Type <span class="required-field">*</span></label>
                  <select name="product_type" id="productType" class="form-control select2" style="width: 100%;">
                    <option value="">--Select Product Type--</option>
                    @foreach ($data as $key)
                    <option value="{{ $key->id }}" selected>{{ $key->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productName">Product Name <span class="required-field">*</span></label>
                  <input placeholder="Enter product name" 
                  name="product_name" value="{{$productlists->product_name}}" type="text" 
                   class="form-control" id="productName" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productCode">Product Code <span class="required-field">*</span></label>
                  <input placeholder="Enter product code" name="product_code" 
                  value="{{$productlists->product_code}}" type="text" 
                   class="form-control" id="productCode" style="width: 100%;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="barcodeSymbology">Barcode Symbology <span class="required-field">*</span></label>
                  <select name="barcode_symbology" id="barcodeSymbology" class="form-control select2" 
                  style="width: 100%;">
                    <option value="">--Select Barcode Symbology--</option>
                    @foreach ($bar as $key)
                    <option value="{{ $key->id }}" selected>{{ $key->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="brand">Brand <span class="required-field">*</span></label>
                  <select name="brand" id="brand" class="form-control select2" style="width: 100%;">
                    <option value="">--Select a Brand--</option>
                    @foreach ($brand as $key)
                    <option value="{{ $key->id }}" selected>{{ $key->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="category">Category <span class="required-field">*</span></label>
                  <select name="category" id="category" class="form-control select2" style="width: 100%;">
                    <option value="">--Select a Category--</option>
                    @foreach ($category as $key)
                    <option value="{{ $key->id }}" selected>{{ $key->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productUnit">Product Unit <span class="required-field">*</span></label>
                  <select name="product_unit" id="productUnit" class="form-control select2" 
                  style="width: 100%;">
                    <option value="">--Select a Product Unit--</option>
                    @foreach ($prounit as $key)
                    <option value="{{ $key->id }}" selected>{{ $key->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="saleUnit">Sale Unit</label>
                  <select name="sale_unit" id="saleUnit" class="form-control select2" style="width: 100%;">
                    <option value="">--Selct Sale Unit--</option>
                    @foreach ($salunit as $key)
                    <option value="{{ $key->id }}" selected>{{ $key->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="purchaseUnit">Purchase Unit</label>
                  <select name="purchase_unit" id="purchaseUnit" class="form-control select2" 
                  style="width: 100%;">
                    <option value="">--Select Purchase Unit--</option>
                    @foreach ($purunit as $key)
                    <option value="{{ $key->id }}" selected>{{ $key->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productCost">Product Cost <span class="required-field">*</span></label>
                  <input placeholder="Enter product cost" name="product_cost" 
                  value="{{$productlists->product_cost}}" type="number"  class="form-control" id="productCost" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productPrice">Product Price <span class="required-field">*</span></label>
                  <input placeholder="Enter product price" name="product_price" value="{{$productlists->product_price}}" type="number" name="productPrice" class="form-control" id="productPrice" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="alertQuantity">Notify Quantity</label>
                  <input placeholder="Enter Alert Quantity" name="alert_quantity" 
                  value="{{$productlists->alert_quantity}}" type="number" name="alertQuantity" 
                  class="form-control" id="alertQuantity" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productTax">Product Tax</label>
                  <input placeholder="Enter product tax" name="product_tax" type="number" 
                  value="{{$productlists->product_tax}}"  class="form-control" id="productTax" 
                  style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="taxMethod">Tax Method</label>
                  <select name="tax_method" id="taxMethod" class="form-control select2" style="width: 100%;">
                    <option value="">--Select Tax Method--</option>
                    @foreach ($tax as $key)
                    <option value="{{ $key->id }}" selected>{{ $key->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="warehouse">Warehouse <span class="required-field">*</span></label>
                  <select name="warehouse" id="warehouse" class="form-control select2" style="width: 100%;">
                    <option value="">--Select a warehouse--</option>
                    @foreach ($warehouse as $key)
                    <option value="{{ $key->id }}" selected>{{ $key->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card card-default">
                  <div class="card-header" style="width: 100%;">
                    <label for="productImage">Product Image</label>
                    <div class="input-images" name="product_image" >
                    <img id="showImage" src="{{(!empty($productlists->product_image))?url('upload/product_images/'.$productlists->product_image):url('upload/no-image.png')}}" style="width: 50px; height: 60px;border: 1px solid #000">
                    </div>

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
                  <textarea class="summernote" name="product_details"  id="summernote">{{$productlists->product_details}}

                  </textarea>
                </div>
              </div>

            </div>
            <div class="row ">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary ">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
</div>


@endsection


@push('scripts')
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {

    // alert("dwe")
    $('.input-images').imageUploader({
      imagesInputName: 'images',
      preloadedInputName: 'preloaded',
      //acceptedFiles: null,
      label: 'Drag & Drop files here or click to browse',
      //extensions: ['.png'],
      //mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
    });

    $('#summernote').summernote({
      height: 200,
    });

    $('.select2').select2({
      theme: 'bootstrap4'
    });

    $('#AddProduct').validate({
      rules: {
        productType: {
          required: true,
        },
        productName: {
          required: true,
        },
        productCode: {
          required: true,
        },
        barcodeSymbology: {
          required: true,
        },
        brand: {
          required: true,
        },
        category: {
          required: true,
        },
        productUnit: {
          required: true,
        },
        productCost: {
          required: true,
          min: 1,
        },
        productPrice: {
          required: true,
          min: 1,
        },
        warehouse: {
          required: true,
          remote: {
            url: "{{route('product.duplicatecheck')}}",
            type: "get",
            data: {
              product_code: function() {
                return $('input[name="productCode"]').val();
              }
            }
          }
        },
      },
      messages: {
        productType: {
          required: "Please select Product Type",
        },
        productName: {
          required: "Please enter Product Name",
        },
        productCode: {
          required: "Please enter Product Code",
        },
        barcodeSymbology: {
          required: "Please select Barcode Symbology",
        },
        brand: {
          required: "Please select a Brand",
        },
        category: {
          required: "Please select Category",
        },
        productUnit: {
          required: "Please select Product Unit",
        },
        productCost: {
          required: "Please enter Product Cost",
          min: "Product cost must be greater than 0",
        },
        productPrice: {
          required: "Please enter Product Price",
          min: "Product price must be greater than 0",
        },
        warehouse: {
          required: "Please select a warehouse",
          remote: $.validator.format("Product already exists in this warehouse !")
        }
      },
      errorElement: 'span',
      onfocusout: false,
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      },
      invalidHandler: function(form, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
          validator.errorList[0].element.focus();
        }
      }
    });


  })
</script>

<script type="text/javascript">
   $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
    reader.onload = function(e){
      $('#showImage').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
   });
    });
    </script>
@endpush