@extends('layouts.home')
@section('content')
@section('stylesheets')
<style>
  .required-field {
    color: red;
  }

  ul.dropdown-menu.select-product-list {
    padding: 10px 15px;
    min-width: 20rem;
  }

  ul.dropdown-menu.select-product-list li {
    margin: 5px 0;
  }

  ul.dropdown-menu.select-product-list li a {
    color: #212529;
  }
</style>
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Purchase</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-body">
          <form name="AddPurchase" id="AddPurchase" action="javascript:void(0)" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="warehouse">Warehouse <span class="required-field">*</span></label>
                  <select name="warehouse" id="warehouse" class="form-control select2" style="width: 100%;">
                    <option value="">--Select a warehouse--</option>
                    @foreach ($warehouses as $key)
                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="supplier">Supplier</label>
                  <select name="supplier" id="supplier" class="form-control select2" style="width: 100%;">
                  
                    <option value="">--Select a Supplier--</option>
                    @foreach ($suppliers as $key)
                    <option value="{{ $key->id }}">{{$key->name}}</option>
                    @endforeach 
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name">Purchase Status</label>
                  <select name="name" id="name" class="form-control" style="width: 100%;">
                    <option value="">--Select Product Type--</option>
                    @foreach ($purchasestatus as $key)
                    <option value='{{ $key->id }}'>{{$key->name}}</option>
                    @endforeach 
                   
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="attachFile">Attach File</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="attachFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <lebel for="product_code">Select Product</lebel>
                <input type="text" name="product_code" class="form-control" placeholder="Type your product code here" id="product_code">
                <div id="productList">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <div class="tablename">
                  <h3>
                    Order List <span class="required-field">*</span>
                  </h3>
                </div>
                <div class="table">
                  <table id="orderTable" class="table table-bordered table-striped">
                    <thead>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Quantity</th>
                      <th class="rcvcolumn">Received</th>
                      <th>Net Unit Cost</th>
                      <th>Discount</th>
                      <th>Tax</th>
                      <th>Sub Total</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      <tr class="orderData">
                        <td>Test</td>
                        <td>adgfga</td>
                        <td><input type="number" class="form-control quantity" name="quantity" id="quantity"></td>
                        <td class="rcvrow"><input type="number" class="form-control received" name="received" id="received"></td>
                        <td class="unitcost" data-unitcost='1'>1</td>
                        <td class='discount' data-discount='15'>15</td>
                        <td><span class="tax">200</span></td>
                        <td><span class="subtotal"></label></td>
                        <td>
                          <button type="button" class="ibtnDel btn btn-md btn-danger">Delete</button>
                        </td>
                      </tr>
                      <tr class="orderData">
                        <td>Test2</td>
                        <td>1321</td>
                        <td><input type="number" class="form-control quantity" name="quantity" id="quantity"></td>
                        <td class="rcvrow"><input type="number" class="form-control received" name="received" id="received"></td>
                        <td class="unitcost" data-unitcost='2'>2</td>
                        <td class='discount' data-discount='10'>10</td>
                        <td><span class="tax">1111</span></td>
                        <td><span class="subtotal"></span></td>
                        <td>
                          <button type="button" class="ibtnDel btn btn-md btn-danger">Delete</button>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td>Total</td>
                        <td></td>
                        <td><label class="totalQuantity"></td>
                        <td class="ftrcvrow"></td>
                        <td></td>
                        <td></td>
                        <td><label class="totaltax"></label></td>
                        <td><label class="grandtotal"></label></td>
                        <td></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4">
                <div class="form-group">
                  <label for="orderTax">Order Tax <span class="required-field">*</span></label>
                  <select name="orderTax" id="orderTax" class="form-control select2" style="width: 100%;">
                    <option value="">--Select order tax--</option>
                    @foreach ($ordertax as $key)
                    <option value='{{ $key->tax_number }}'>{{$key->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-4">
                <div class="form-group">
                  <label class="orderDiscount" for="orderDiscount">Discount</label>
                  <input type="number" id="orderDiscount" name="orderDiscount" class="form-control" placeholder="Enter Discount here">
                </div>
              </div>
              <div class="form-group col-lg-4">
                <div class="form-group">
                  <label for="shippingCost">Shipping Cost</label>
                  <input type="number" id="shippingCost" name="shippingCost" class="form-control" placeholder="Shipping Cost">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-12">
                <label for="note">Note</label>
                <textarea name="note" id="note" cols="30" rows="5" class="form-control" placeholder="Note"></textarea>
              </div>
            </div>
            <div class="row ">
              <div class="form-group col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
          <div class="table">
            <table id="totalTable" class="table table-bordered table-striped">
              <thead>
                <th>Items <span class="totalItems"></span>&nbsp(<span class="noRows">0</span>) </th>
                <th>Total <span class="grandtotal text-right">0.00</span></th>
                <th>Order Tax <span class="totalorderTax">0.00</span></th>
                <th>Order Discount <span class="showOrderDiscount">0.00</span></th>
                <th>Shipping Cost <span class="shippingCost">0.00</span></th>
                <th>Grand Total <span class="grossTotal">0.00</span></th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  $(document).ready(function() {


    $('#product_code').keyup(function() {
      var product_code = $(this).val();
      if (product_code != '') {
        var _token = $('input[name="_token"]').val();
        $.ajax({
          url: "{{ route('product.list') }}",
          method: "get",
          data: {
            product_code: product_code,
            _token: _token
          },
          success: function(data) {
            $('#productList').fadeIn();
            $('#productList').html(data);
          }
        });
      }
    });
    $('#orderTable').on('click', '.ibtnDel', function() {

      $(this).closest('tr').remove();
      CalculateTotal();

    })

    $('#orderTable').on('change', '.quantity', function() {

      var unitcost = parseFloat($(this).closest('tr').find('.unitcost').attr('data-unitcost'))
      var discount = parseFloat($(this).closest('tr').find('.discount').attr('data-discount'))
      var tax = parseFloat($(this).closest('tr').find('.tax').text())
      var quantity = parseInt($(this).val())

      subtotal = (unitcost * quantity) + tax - discount

      $(this).closest('tr').find('.subtotal').text(subtotal.toFixed(2));
      CalculateTotal();


    })


    function CalculateTotal() {
      // This will Itearate thru the subtotals and 
      // claculate the grandTotal and Quantity here

      var subtotal = $('.subtotal');
      var taxTotal = $('.tax');
      var quantityTotal = $(".quantity");
      //alert(quantityTotal)


      var grandTotal = 0.0;
      var totalTax = 0.0;
      var totalQuantity = 0;
      $.each(subtotal, function(i) {
        if ($(subtotal[i]).text() != '') {
          grandTotal += parseFloat($(subtotal[i]).text());
        }
        if ($(taxTotal[i]).text() != '') {
          totalTax += parseFloat($(taxTotal[i]).text());

        }
        if ($(quantityTotal[i]).val() != '') {
          totalQuantity += parseInt($(quantityTotal[i]).val());
        }
        // if ($(quantityTotal[i]).text() != '') {
        //   totalQuantity += parseInt($(quantityTotal[i]).text());
        // }
        //totalTax += parseFloat($(taxTotal[i]).text()) 
      });
      var grandTotal=parseFloat(grandTotal).toFixed(2)

      $('.totaltax').text(parseFloat(totalTax).toFixed(2));
      $('.grandtotal').text(parseFloat(grandTotal).toFixed(2));
      $('.totalItems').text(parseInt(totalQuantity));
      $('.noRows').text($('#orderTable').find('.orderData').length);
      // alert($('select["name=orderTax"]').attr('data-vat'));
      //$('.showOrderDiscount').text($('.forOrderDiscount').find("input[name='orderDiscount'])"));
      var orderTax=$('#orderTax option:selected').attr('data-vat');
      // alert(orderTax)
      if(orderTax != undefined && orderTax !=''){
        orderTax = parseFloat(grandTotal).toFixed(2)*(parseFloat(orderTax)/100)
        //alert(orderTax)
        $('.totalorderTax').text(parseFloat(orderTax).toFixed(2))
      }else{
        orderTax=0.0
        $('.totalorderTax').text(orderTax)
      }
      var orderDiscount = $("input[name='orderDiscount']").val()
      var shippingCost = $("input[name='shippingCost']").val()
      if(orderDiscount!=''){
        $('.showOrderDiscount').text(orderDiscount)
      }else{
        orderDiscount=0.0
        $('.showOrderDiscount').text(orderDiscount)
      }
      if(shippingCost!=''){  
        $('.shippingCost').text(parseFloat(shippingCost).toFixed(2))
      }else{
        shippingCost=0.0
        $('.shippingCost').text(shippingCost)
      }
  
       grossTotal=(parseFloat(grandTotal)+parseFloat(shippingCost)+parseFloat(orderTax))-parseFloat(orderDiscount)
       $('.grossTotal').text(grossTotal)
      // grossTotal

    }

    $('#AddPurchase').on('change', '#purchaseStatus', function() {
      var status = $(this).val()
      //  alert(status)
      if (status == 2) {
        $('.rcvrow').show()
        $('.ftrcvrow').show()
        $('.rcvcolumn').show()
      } else {
        $('.rcvrow').hide()
        $('.ftrcvrow').hide()
        $('.rcvcolumn').hide()
        $('input[name="received"]').val('');
      }



    });
    $('#orderTax').on('change',function(){
        
      CalculateTotal();

    })
    $('#orderDiscount').on('change',function(){
      CalculateTotal();

    })
    $('#shippingCost').on('change',function(){
      CalculateTotal();
    })
    $(document).on('click', 'li', function() {
      $('#product_code').val($(this).text());
      $('#productList').fadeOut();
    });
    $('.rcvcolumn').hide()
    $('.rcvrow').hide()
    $('.ftrcvrow').hide()

    // display: none;


  });
</script>


@endsection

<!-- @push('scripts')
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
	  var  warehouse =$('select[name="warehouse"]').val()
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
	  formData.append('warehouse', warehouse);
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
		required: "Please select a warehouse"
	  }
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
@endpush -->


@endsection