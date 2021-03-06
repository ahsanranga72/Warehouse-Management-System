

<div class="container-fluid">
            <div class="card card-default">
              <div class="card-body">
                <form name="AddPurchase" id="AddPurchase" action="javascript:void(0)" enctype="multipart/form-data">

                
                  <div class="row">
                  <div class="col-lg-4">
                      <div class="form-group">
                        <label for="warehouse">Reference No: </label>
                        {{$saleviewdata->referent_no}}
                      </div>
                    </div>
                    <div class="col-lg-8">
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
                      <th>Product Code</th>
                      <th>Product Quantity</th>
                       <th></th>
                      <th>Sale Price</th>
                      <th>Product Discount</th>
                      <th>Product Vat</th>
                      <th> Total</th>
                     

                    </thead>
                    <tbody class="tableBody">

                    </tbody>
                    <tfoot>
                    @foreach($sale_products_id as $product)
                      <tr>
                      <td>{{$product->product_name}}</td>
                        <td>{{$product->product_code}}</td>
                        <td type="number" class="form-control quantity" required min="0" name="quantity{{$product->id}}" value="{{$product->quantity}}" id="quantity{{$product->id}}"></td>
                        <td class="rcvrow" type="number" min="0" class="form-control received " name="received{{$product->id}}" id="received{{$product->id}}"></td>
                        <td class="unitcost" data-unitcost='{{$product->product_cost}}'>{{$product->product_cost}}</td>
                        <td class='discount' data-discount='0'>0</td>
                        <td><span class="tax">{{$product->product_tax}}</span></td>
                        <td><span class="subtotal">{{$product->grand_total}}</label></td>
                      </tr>
                      @endforeach
                    </tfoot>
                    
                  </table>
                </div>
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