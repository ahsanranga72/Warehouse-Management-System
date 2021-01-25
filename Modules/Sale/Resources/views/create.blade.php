@extends('layouts.master')
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
          <h1>Add Sale</h1>
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
              <div class="form-group col-md-4 input_customer">
                <label for="input_customer">Customer</label>
                <input type="text" name="input_customer" class="form-control" id="input_customer" placeholder="Enter customer name" style="width: 100%;">
                <font style="color: red">
                  {{($errors->has('name'))?($errors->first('name')):''}}
                </font>
              </div>
              <div class="col-lg-4 slct_customer">
                <div class="form-group">
                  <label for="select_customer">Customer</label>
                  <select name="select_customer" id="select_customer" class="form-control select2 select_customer" style="width: 100%;">
                    <option value="">--Select a Customer--</option>
                    @foreach ($customers as $key)
                    <option value="{{ $key->id }}">{{$key->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="warehouse">Warehouse <span class="required-field">*</span></label>
                  <select name="warehouse" id="warehouse" class="form-control" style="width: 100%;">
                    <option value="">--Select a warehouse--</option>
                    @foreach ($warehouses as $key)
                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="biller">Biller</label>
                  <select name="biller" id="biller" class="form-control" style="width: 100%;">
                    <option value="">--Select biller Type--</option>
                    @foreach ($users as $key)
                    <option value='{{ $key->id }}'>{{$key->name}}</option>
                    @endforeach
                  </select>
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
                      <th>Product Name</th>
                      <th>Product Code</th>
                      <th>Quantity</th>
                      <th class="rcvcolumn">Received</th>
                      <th>Sale Price</th>
                      <th>Product Discount</th>
                      <th>Product Vat</th>
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
                  <label for="orderTax">Order Vat</label>
                  <select name="orderTax" id="orderTax" class="form-control select2" style="width: 100%;">
                    <option value="">--Select order vat--</option>
                    @foreach ($ordertax as $key)
                    <option value='{{ $key->id }}' data-vat='{{$key->tax_number}}'>{{$key->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-4">
                <div class="form-group">
                  <label class="orderDiscount" for="orderDiscount">Other Discount</label>
                  <input type="number" id="orderDiscount" name="orderDiscount" class="form-control" placeholder="Enter Order Discount">
                </div>
              </div>
              <div class="form-group col-lg-4">
                <div class="form-group">
                  <label for="shippingCost">Shipping Cost</label>
                  <input type="number" id="shippingCost" name="shippingCost" class="form-control" placeholder="Enter Shipping Cost">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4">
                <div class="form-group">
                  <label class="feaa" for="saleDocument">Attach Document</label>
                  <input type="file" id="saleDocument" name="saleDocument" class="form-control saleDocument">
                </div>
              </div>
              <div class="form-group col-lg-4">
                <div class="form-group">
                  <label for="sale_status">Sale Status</label>
                  <select name="sale_status" id="sale_status" class="form-control select2" style="width: 100%;">
                    <option value="">--Select a Payment--</option>
                    <option value="1">Complete</option>
                    <option value="2">Pending</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Payment Status <span class="required-field">*</span></label>
                  <select name="payment_status" class="form-control payment_status">
                    <option value="">--Select payment status--</option>
                    <option value="1">Paid</option>
                    <option value="2">Due</option>
                    <option value="3">Partial</option>
                    <option value="4">Pending</option>
                  </select>
                </div>
              </div>
            </div>
            <div id="payment">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Paid By</label>
                    <select name="paid_by_id" class="form-control paid_by">
                      <option value="1">Cash</option>
                      <option value="2">Cheque</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Received Amount <span class="required-field">*</span></label>
                    <input type="number" name="receive_amount" class="form-control" id="receive_amount" step="any" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Paying Amount <span class="required-field">*</span></label>
                    <input type="number" name="paid_amount" class="form-control" id="paid_amount" step="any" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Change</label>
                    <p name="change" id="change" class="ml-2 change">0.00</p>
                  </div>
                </div>
              </div>
              <div class="checkVisible">
                <div class="row" id="cheque">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Cheque Number <span class="required-field">*</span></label>
                      <input type="text" name="cheque_no" id="cheque_no" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="bank">Bank <span class="required-field">*</span></label>
                    <select name="bank" id="bank" class="form-control select2" style="width: 100%;">
                      <option value="">--Select a Bank--</option>
                      @foreach ($bank as $key)
                      <option value="{{$key->id}}">{{$key->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="bank_branch">Branch</label>
                      <input type="text" name="bank_branch" id="bank_branch" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="sale_note">Sale Note</label>
                <textarea name="sale_note" id="sale_note" cols="30" rows="5" class="form-control" placeholder="Note"></textarea>
              </div>
              <div class="form-group col-lg-6">
                <label for="stuff_note">Staff Note</label>
                <textarea name="stuff_note" id="stuff_note" cols="30" rows="5" class="form-control" placeholder="Note"></textarea>
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
                <th>Order Vat <span class="totalorderTax">0.00</span></th>
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

    $('.select2').select2({
      theme: 'bootstrap4'
    });

    $('.select_customer').on('change', function() {
      if ($(this).val() != '') {
        $('#input_customer').val('')
        $('.input_customer').hide()

      }
    })

    $('#input_customer').keyup(function() {
      if ($(this).val() != '') {
        $('#select_customer').val('')
        $('.slct_customer').hide()

      }
    });

    $('.checkVisible').hide()
    $('#payment').hide()

    $('.paid_by').on('change', function() {
      if ($(this).val() == 2) {
        $('.checkVisible').show()
      } else {
        $('textarea[name="payment_note"]').val('')
        $('input[name="cheque_no"]').val('')
        $('.checkVisible').hide()
      }

    })
    $('.payment_status').on('change', function() {

      if ($(this).val() == 3) {
        $('#payment').show()
      } else {
        $('input[name="paid_amount"]').val('')
        $('input[name="paying_amount"]').val('')
        $('#payment').hide()
      }
    })

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

    $(document).on('click', 'li', function() {
      var productId = $(this).attr('data-product')
      $('#product_code').val('');
      $('#productList').fadeOut();


      if (productId != '') {
        var _token = $('input[name="_token"]').val();
        if ($('.tableBody').find('.dataRow' + productId).length < 1) {
          $.ajax({
            url: "{{ route('sale_order.product') }}",
            method: "get",
            data: {
              product_id: productId,
              _token: _token
            },
            success: function(data) {
              console.log("Data",data)
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

    $('#orderTable').on('click', '.ibtnDel', function() {
      $(this).closest('tr').remove();
      CalculateTotal();
    })

    $('#orderTable').on('change', '.net-unit-cost', function() {

      var unitcost = parseFloat($(this).val())
      var discount = parseFloat($(this).closest('tr').find('.discount').attr('data-discount'))
      var tax = parseFloat($(this).closest('tr').find('.tax').text())
      var quantity = parseInt($(this).closest('tr').find('.quantity').val())

      subtotal = (unitcost * quantity) + tax - discount

      $(this).closest('tr').find('.subtotal').text(subtotal.toFixed(2));
      CalculateTotal();
    })


    $('#orderTable').on('change', '.quantity', function() {

      var unitcost = parseFloat($(this).closest('tr').find('.net-unit-cost').val())
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

    $('#receive_amount').on('change', function() {
      var rcv = $(this).val()
      $('#paid_amount').on('change', function() {
        var pyn = $(this).val()
        if (rcv != '' && pyn != '') {
          var change = rcv - pyn
          $('.change').text(change.toFixed(2))
        }
      })
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
          var reference_no = $("input[name='reference_no']").val()
          var input_customer = $("input[name='input_customer']").val()
          var select_customer = $("select[name='select_customer']").val()
          var warehouse = $('select[name="warehouse"]').val()
          var biller = $('select[name="biller"]').val()
          var orderTax = $('select[name="orderTax"]').val()
          var orderDiscount = $('input[name="orderDiscount"]').val()
          var shippingCost = $('input[name="shippingCost"]').val()
          var document = $('.saleDocument').prop('files')[0];
          var sale_status = $('select[name="sale_status"]').val()
          var payment_status = $('select[name="payment_status"]').val()
          var paid_by_id = $('select[name="paid_by_id"]').val()
          var receive_amount = $('input[name="receive_amount"]').val()
          var paid_amount = $('input[name="paid_amount"]').val()
          var cheque_no = $('input[name="cheque_no"]').val()
          var bank_branch = $('input[name="bank_branch"]').val()
          var bank = $('select[name="bank"]').val()
          var sale_note = $('textarea#sale_note').val();
          var stuff_note = $('textarea#stuff_note').val();

          var items = $('.totalItems').text()
          var total = $('#grandtotal').text()
          var totalOrderTax = $('.totalorderTax').text()
          var grandTotal = $('.grossTotal').text()


          products = []
          $(".tableBody").find('.orderData').each(function() {
            let quantity = $(this).find('.quantity').val()
            let subtotal = $(this).find('.subtotal').text()
            let product_id = $(this).attr('data-id')
            product_data = {
              "quantity": quantity,
              "subtotal": subtotal,
              "product_id": product_id,
            }
            products.push(product_data)


          });

          //console.log(products)

          var form = $('AddPurchase')[0]; // You need to use standard javascript object here
          var formData = new FormData(form);
          formData.append('reference_no', reference_no);
          formData.append('input_customer', input_customer);
          formData.append('select_customer', select_customer);
          formData.append('warehouse', warehouse);
          formData.append('biller', biller);
          formData.append('orderTax', orderTax);
          formData.append('orderDiscount', orderDiscount);
          formData.append('shippingCost', shippingCost);
          formData.append('document', document);
          formData.append('sale_status', sale_status);
          formData.append('payment_status', payment_status);
          formData.append('paid_by_id', paid_by_id);
          formData.append('receive_amount', receive_amount);
          formData.append('paid_amount', paid_amount);
          formData.append('cheque_no', cheque_no);
          formData.append('bank', bank);
          formData.append('bank_branch', bank_branch);
          formData.append('sale_note', sale_note);
          formData.append('stuff_note', stuff_note);
          formData.append('items', items);
          formData.append('total', total);
          formData.append('totalOrderTax', totalOrderTax);
          formData.append('grandTotal', grandTotal);

          formData.append('products', JSON.stringify(products));

          $.ajax({
            url: "{{route('sale.store')}}",
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

                window.location.replace("{{route('sale.view')}}");
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
        payment_status: {
          required: true,
        },
        bank: {
          required: true,
        },
        receive_amount: {
          required: true,
        },
        paid_amount: {
          required: true,
        },
        cheque_no: {
          required: true,
        }

      },
      messages: {
        warehouse: {
          required: "Please select a warehouse",
        },
        payment_status: {
          required: "Please select a Payment Status",
        },
        bank: {
          required: "Please select a Bank",
        },
        receive_amount: {
          required: "Please Enter Receive Amount",
        },
        paid_amount: {
          required: "Please Enter Paying Amount",
        },
        cheque_no: {
          required: "Please Enter Cheque No",
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
    })



  });
</script>
@endpush