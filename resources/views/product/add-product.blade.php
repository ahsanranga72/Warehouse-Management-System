@extends('layouts.home')
@section('stylesheets')
<style>
.required-field{
  color:red;
}
</style>
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
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
          <form name="AddProduct" id="AddProduct" action="javascript:void(0)" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="productType">Product Type <span class="required-field">*</span></label>
                  <select name="productType" id="productType" class="form-control select2" style="width: 100%;">
                    <option value="">--Select Product Type--</option>
                    @foreach ($data as $key)
                    <option value="{{ $key->id }}">{{ $key->product_type_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productName">Product Name <span class="required-field">*</span></label>
                  <input placeholder="Enter product name" type="text" name="productName" class="form-control" id="productName" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productCode">Product Code <span class="required-field">*</span></label>
                  <input placeholder="Enter product code" type="text" name="productCode" class="form-control" id="productCode" style="width: 100%;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="barcodeSymbology">Barcode Symbology <span class="required-field">*</span></label>
                  <select name="barcodeSymbology" id="barcodeSymbology" class="form-control select2" style="width: 100%;">
                    <option value="">--Select Barcode Symbology--</option>
                    @foreach ($bar as $key)
                    <option value="{{ $key->id }}">{{ $key->barcode_symbologie_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="brand">Brand <span class="required-field">*</span></label>
                  <select name="brand" id="brand" class="form-control select2" style="width: 100%;">
                    <option value="">--Select a Brand--</option>
                    @foreach ($brand as $key)
                    <option value="{{ $key->id }}">{{ $key->brand_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="category">Category <span class="required-field">*</span></label>
                  <select name="category" id="category" class="form-control select2" style="width: 100%;">
                    <option value="">--Select a Category--</option>
                    @foreach ($category as $key)
                    <option value="{{ $key->id }}">{{ $key->categorie_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="productUnit">Product Unit <span class="required-field">*</span></label>
                    <select name="productUnit" id="productUnit" class="form-control select2" style="width: 100%;" >
                    <option value="">--Select a Product Unit--</option>
                    @foreach ($prounit as $key)
                    <option value="{{ $key->id }}">{{ $key->product_unit_name }}</option>
                    @endforeach
                    </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="saleUnit">Sale Unit</label>
                  <select name="saleUnit" id="saleUnit" class="form-control select2" style="width: 100%;">
                    <option value="">--Selct Sale Unit--</option>
                    @foreach ($salunit as $key)
                    <option value="{{ $key->id }}">{{ $key->sale_unit_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                    <label for="purchaseUnit">Purchase Unit</label>
                    <select name="purchaseUnit" id="purchaseUnit" class="form-control select2" style="width: 100%;" >
                        <option value="">--Select Purchase Unit--</option>
                        @foreach ($purunit as $key)
                    <option value="{{ $key->id }}">{{ $key->purchase_unit_name }}</option>
                    @endforeach
                    </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productCost">Product Cost <span class="required-field">*</span></label>
                  <input placeholder="Enter product cost" type="number"  name="productCost" class="form-control" id="productCost" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productPrice">Product Price <span class="required-field">*</span></label>
                  <input placeholder="Enter product price" type="number" name="productPrice" class="form-control" id="productPrice" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="alertQuantity">Notify Quantity</label>
                  <input placeholder="Enter Alert Quantity" type="number" name="alertQuantity" class="form-control" id="alertQuantity" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="productTax">Product Tax</label>
                  <input placeholder="Enter product tax" type="number" name="productTax" class="form-control" id="productTax" style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group" >
                  <label for="taxMethod">Tax Method</label>
                  <select name="taxMethod" id="taxMethod" class="form-control select2"  style="width: 100%;">
                    <option value="">--Select Tax Method--</option>
                    @foreach ($tax as $key)
                    <option value="{{ $key->id }}">{{ $key->tax_method_name }}</option>
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
                    <div  class="input-images"  ></div>
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
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    
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

    $('.select2').select2({theme: 'bootstrap4'});

    $.validator.setDefaults({
    submitHandler: function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
      });

      var  productType =$('select[name="productType"]').val()
      var  productName =$('input[name="productName"]').val()
      var  productCode =$('input[name="productCode"]').val()
      var  barcodeSymbology =$('select[name="barcodeSymbology"]').val()
      var  brand =$('select[name="brand"]').val()
      var  category =$('select[name="category"]').val()
      var  productUnit =$('select[name="productUnit"]').val()
      var  saleUnit =$('select[name="saleUnit"]').val()
      var  purchaseUnit =$('select[name="purchaseUnit"]').val()
      var  purchaseUnit =$('select[name="purchaseUnit"]').val()
      var  productCost =$('input[name="productCost"]').val()
      var  productPrice =$('input[name="productPrice"]').val()
      var  alertQuantity =$('input[name="alertQuantity"]').val()
      var  productTax =$('input[name="productTax"]').val()
      var  taxMethod =$('select[name="taxMethod"]').val()
      var  images =$('input[name="images"]').val()
      var  summernote =$('#summernote').summernote('code');
      var file_data = $('input[type="file"]').prop('files')[0];
     // alert(productCost)
   
     
      console.log(file_data)
      var form = $('AddProduct')[0];// You need to use standard javascript object here 
      var formData = new FormData(form);
      formData.append('product_type', productType);
      formData.append('product_name', productName);
      formData.append('product_code', productCode);
      formData.append('barcode_symbology', barcodeSymbology);
      formData.append('brand', brand);
      formData.append('category', category);
      formData.append('sale_unit', saleUnit);
      formData.append('purchase_unit', purchaseUnit);
      formData.append('product_cost', productCost);
      formData.append('product_price', productPrice);
      formData.append('alert_quantity', alertQuantity);
      formData.append('product_tax', productTax);
      formData.append('tax_method', taxMethod);
      formData.append('product_unit', productUnit);
      formData.append('product_image', file_data);
      formData.append('product_details', summernote);

    
   
      //var myDropzone = Dropzone.forElement(".input-images");
      //myDropzone.removeAllFiles();
      $.ajax({
                url :'http://127.0.0.1:8000/store/product',
                type : 'POST',
                data : formData,
                contentType : false,
                processData : false,
                success: function(resp) {
                   console.log(resp)
                  if(resp.success){
                    Toast.fire({
                      icon: 'success',
                      title: resp.message
                    })   
                    $('#AddProduct')[0].reset();  
                     $('.select2').val(null).trigger('change');
                     $('#summernote').summernote('reset');
                       $('#AddProduct').find('.uploaded').remove()
                       $('#AddProduct').find('.image-uploader').append('<div class="uploaded"></div>');
                   } else {
                    Toast.fire({
                      icon: 'danger',
                      title: resp.message
                    })     
                   }
                          
                }
            });
      // alert( "Form successful submitted!" );
    }
  });
  $('#AddProduct').validate({
    rules: {
      productType: {
        required: true,
      },
      // productName: {
      //   required: true,
      // },
      // productCode: {
      //   required: true,
      // },
      // barcodeSymbology: {
      //   required: true,
      // },
      // brand: {
      //   required: true,
      // },
      // category: {
      //   required: true,
      // },
      // productUnit: {
      //   required: true,
      // },
      // productCost: {
      //   required: true,
      //   min: 1,
      // },
      // productPrice: {
      //   required: true,
      //   min: 1,
      // },
    },
    messages: {
      productType: {
        required: "Please select Product Type",
      },
      // productName: {
      //   required: "Please enter Product Name",
      // },
      // productCode: {
      //   required: "Please enter Product Code",
      // },
      // barcodeSymbology: {
      //   required: "Please select Barcode Symbology",
      // },
      // brand: {
      //   required: "Please select a Brand",
      // },
      // category: {
      //   required: "Please select Category",
      // },
      // productUnit: {
      //   required: "Please select Product Unit",
      // },
      // productCost: {
      //   required: "Please enter Product Cost",
      //   min: "Product cost must be greater than 0",
      // },
      // productPrice: {
      //   required: "Please enter Product Price",
      //   min: "Product price must be greater than 0",
      // },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });


  })   
</script>
@endpush

