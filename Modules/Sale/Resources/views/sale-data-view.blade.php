

<div class="container-fluid">
            <div class="card card-default">
              <div class="card-body">
                <form name="AddPurchase" id="AddPurchase" action="javascript:void(0)" enctype="multipart/form-data">

                
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="warehouse">Warehouse Name: </label>
                        {{$saleviewdata['wareee']['name']}}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="warehouse"> Customer Name: </label>
                        {{$saleviewdata['customer']['name']}}
                     

                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="warehouse"> Billar Name: </label>
                        {{$saleviewdata['user']['name']}}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <div class="form-group">
                        <label for="orderTax">Order Tax : </label>
                        {{$saleviewdata['user']['name']}}
                      </div>
                    </div>
                    <div class="form-group col-lg-4">
                      <div class="form-group">
                        <label class="orderDiscount" for="orderDiscount">Discount :</label>
                        {{$saleviewdata->order_discount}}
                      </div>
                    </div>
                    <div class="form-group col-lg-4">
                      <div class="form-group">
                        <label for="shippingCost">Shipping Cost</label>

                        {{$saleviewdata->order_shipping_cost}}

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label for="note">Note</label>
                      {{$saleviewdata->staff_note}}
                     

                    </div>
                  </div>

                </form>
                <div class="table">
                  <table id="orderTable" class="table table-bordered table-striped">
                    <thead>
                      <th>Product Name</th>
                      <th>Quantity </th>
                      <th class="rcvcolumn">Received</th>
                      <th>Net Unit Cost</th>
                      <th>Discount</th>
                      <th>Tax</th>
                      <th>Sub Total</th>

                    </thead>
                    <tbody class="tableBody">

                    </tbody>
                    <tfoot>
                      <tr>
                        <td> {{$saleviewdata->product_id}}</td>
                        <td> {{$saleviewdata->quantity}}</td>
                        <td> {{$saleviewdata->staff_note}}</td>
                        <td> {{$saleviewdata->staff_note}}</td>
                        <td> {{$saleviewdata->staff_note}}</td>
                        <td> {{$saleviewdata->order_tax}}</td>
                        <td> {{$saleviewdata->subtotal}}</td>
                      </tr>
                    </tfoot>
                    
                  </table>
                </div>
                <div class="table">

                </div>
              </div>
            </div>
          </div>