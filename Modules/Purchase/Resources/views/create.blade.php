@extends('layouts.master')
@section('content')
@section('stylesheets')
<style>
  .required-field {
    color: red;
  }

  ul.dropdown-menu.select-product-list {
    padding: 10px 15px;
    min-width: 20zrem;
  }

  ul.dropdown-menu.select-product-list li {
    margin: 5px 0;
  }

  ul.dropdown-menu.select-product-list li a {
    color: #212529;
  }

  .rcvrow {
    display: none;
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
                  <label for="purchaseStatus">Purchase Status</label>
                  <select name="purchaseStatus" id="purchaseStatus" class="form-control" style="width: 100%;">
                    <option value="">--Select Purchase status--</option>
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
                    <tbody class="tableBody">

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
                        <td><label class="grandtotal" id="grandtotal"></label></td>
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
                    <option value='{{ $key->id }}' data-vat='{{$key->tax_number}}'>{{$key->name}}</option>
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
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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




@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    //Search Product
    $('#product_code').keyup(function() {
      var product_code = $(this).val();
      var warehouse = $('select[name=warehouse]').val();
      if (product_code != '') {
        var _token = $('input[name="_token"]').val();
        $.ajax({
          url: "{{ route('product.list') }}",
          method: "get",
          data: {
            product_code: product_code,
            warehouse_id: warehouse,
            _token: _token
          },
          success: function(data) {
            $('#productList').fadeIn();
            $('#productList').html(data);
          }
        });
      }
    });

    //Add Product to Order List
    $(document).on('click', 'li', function() {
      var productId = $(this).attr('data-product')
      $('#product_code').val('');
      $('#productList').fadeOut();


      if (productId != '') {
        var _token = $('input[name="_token"]').val();
        if ($('.tableBody').find('.dataRow' + productId).length < 1) {
          $.ajax({
            url: "{{ route('order.product') }}",
            method: "get",
            data: {
              product_id: productId,
              _token: _token
            },
            success: function(data) {
              $('.tableBody').append(data).fadeIn()

              if ($('#purchaseStatus').val() == 2) {
                $('#orderTable').find('.rcvrow').removeClass('rcvrow').addClass('showRow');
              } else {
                $('#orderTable').find('.showRow').removeClass('showRow').addClass('rcvrow');
              }

            }
          });
        } else {

          Toast.fire({
            icon: 'warning',
            title: "Product already added !"
          })
        }
      }

    });

    //Delete
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

    $('#orderTable').on('change', '.received', function() {
      var received = $(this).val()
      var quantity = $(this).parent().parent().find('.quantity').val()

      if (parseInt(quantity) <= parseInt(received)) {

        Toast.fire({
          icon: 'warning',
          title: "Received can't be greater than  quantity!"
        })
        $(this).val('')
      }

    })


    function CalculateTotal() {
      // This will Itearate thru the subtotals and 
      // claculate the grandTotal and Quantity here

      var subtotal = $('.subtotal');
      var taxTotal = $('.tax');
      var quantityTotal = $(".quantity");



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


      });
      var grandTotal = parseFloat(grandTotal).toFixed(2)

      $('.totaltax').text(parseFloat(totalTax).toFixed(2));
      $('.grandtotal').text(parseFloat(grandTotal).toFixed(2));
      $('.totalItems').text(parseInt(totalQuantity));
      $('.noRows').text($('#orderTable').find('.orderData').length);

      var orderTax = $('#orderTax option:selected').attr('data-vat');

      if (orderTax != undefined && orderTax != '') {
        orderTax = parseFloat(grandTotal).toFixed(2) * (parseFloat(orderTax) / 100)
        //alert(orderTax)
        $('.totalorderTax').text(parseFloat(orderTax).toFixed(2))
      } else {
        orderTax = 0.0
        $('.totalorderTax').text(orderTax)
      }
      var orderDiscount = $("input[name='orderDiscount']").val()
      var shippingCost = $("input[name='shippingCost']").val()
      if (orderDiscount != '') {
        $('.showOrderDiscount').text(orderDiscount)
      } else {
        orderDiscount = 0.0
        $('.showOrderDiscount').text(orderDiscount)
      }
      if (shippingCost != '') {
        $('.shippingCost').text(parseFloat(shippingCost).toFixed(2))
      } else {
        shippingCost = 0.0
        $('.shippingCost').text(shippingCost)
      }

      grossTotal = (parseFloat(grandTotal) + parseFloat(shippingCost) + parseFloat(orderTax)) - parseFloat(orderDiscount)
      $('.grossTotal').text(grossTotal)
      // grossTotal

    }

    $('#AddPurchase').on('change', '#purchaseStatus', function() {
      var status = $(this).val()
      //alert(status)
      if (status == 2) {
        $('#orderTable').find('.received').val('')
        $('#orderTable').find('.rcvrow').removeClass('rcvrow').addClass('showRow');
        $('.ftrcvrow').show()
        $('.rcvcolumn').show()
      } else {
        $('#orderTable').find('.showRow').removeClass('showRow').addClass('rcvrow');
        $('.ftrcvrow').hide()
        $('.rcvcolumn').hide()
        $('#orderTable').find('.received').val('')
      }



    });
    $('#orderTax').on('change', function() {

      CalculateTotal();

    })
    $('#orderDiscount').on('change', function() {
      CalculateTotal();

    })
    $('#shippingCost').on('change', function() {
      CalculateTotal();
    })



    $('.rcvcolumn').hide()
    $('.tableBody').find('.rcvrow').hide()
    $('.ftrcvrow').hide()





    $.validator.setDefaults({
      submitHandler: function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
          }
        });
        var list = $('.tableBody').find('.orderData').length
        if (list > 0) {
          var warehouse = $('select[name="warehouse"]').val()
          var supplier = $('select[name="supplier"]').val()
          var purchaseStatus = $('select[name="purchaseStatus"]').val()
          var orderTax = $('select[name="orderTax"]').val()
          var orderDiscount = $('input[name="orderDiscount"]').val()
          var shippingCost = $('input[name="shippingCost"]').val()
          var note = $('textarea#note').val();
          var document = $('.custom-file-input').prop('files')[0];
          var items = $('.totalItems').text()
          var total = $('#grandtotal').text()
          var totalOrderTax = $('.totalorderTax').text()
          var grandTotal = $('.grossTotal').text()


          products = []
          $(".tableBody").find('.orderData').each(function() {
            let quantity = $(this).find('.quantity').val()
            let received = $(this).find('.received').val()
            let subtotal = $(this).find('.subtotal').text()

            let unitcost = $(this).find('.unitcost').attr('data-unitcost')
            let discount = $(this).find('.discount').attr('data-discount')
            let tax = $(this).find('.tax').text()
            let product_id = $(this).attr('data-id')
            product_data = {
              "quantity": quantity,
              "received": received,

              "subtotal": subtotal,
              "unitcost": unitcost,
              "tax": tax,
              "product_id": product_id,
              "discount": discount,
            }
            products.push(product_data)


          });

          console.log(products)

          var form = $('AddPurchase')[0]; // You need to use standard javascript object here
          var formData = new FormData(form);
          formData.append('warehouse', warehouse);
          formData.append('supplier', supplier);
          formData.append('purchaseStatus', purchaseStatus);
          formData.append('orderTax', orderTax);
          formData.append('orderDiscount', orderDiscount);
          formData.append('shippingCost', shippingCost);
          formData.append('note', note);
          formData.append('document', document);
          formData.append('items', items);
          formData.append('total', total);
          formData.append('totalOrderTax', totalOrderTax);
          formData.append('grandTotal', grandTotal);
          formData.append('products', JSON.stringify(products));

          $.ajax({
            url: "{{route('purchase.store')}}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
              console.log(resp)
              if (resp.success) {

                Toast.fire({
                  icon: 'success',
                  title: resp.message
                })

                window.location.replace('/purchase/list');
              } else {
                Toast.fire({
                  icon: 'danger',
                  title: resp.message
                })
              }

            }
          })
        } else {
          Toast.fire({
            icon: 'warning',
            title: "Please select product"
          })
        }
      }
    })

    $('#AddPurchase').validate({
      rules: {
        warehouse: {
          required: true,
        },
      },
      messages: {
        warehouse: {
          required: "Please select a warehouse",
        },
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
    })



  });
</script>
@endpush