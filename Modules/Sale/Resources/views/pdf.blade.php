
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog order-table-custom-css" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sale Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <section class="content">
          <div class="container-fluid">
            <div class="card card-default">
              <div class="card-body">
                <form name="AddPurchase" id="AddPurchase" action="javascript:void(0)" enctype="multipart/form-data">
                 @foreach($salelists as $key => $salelist)
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="warehouse">Warehouse Name: </label>
                        
                         {{$salelist['wareee']['name']}}
                        
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label for="warehouse"> Customer Name: </label>
                     
                      {{$salelist['customer']['name']}}
                    
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label for="warehouse"> Supplier Name: </label>
                      
                      {{$salelist['purchasestatus']['name']}}
                      
                      </div>
                    </div>
                   
                  </div>
                
                 
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <div class="form-group">
                        <label for="orderTax">Order Tax :  </label>
                      </div>
                    </div>
                    <div class="form-group col-lg-4">
                      <div class="form-group">
                        <label class="orderDiscount" for="orderDiscount">Discount :</label>
                      </div>
                    </div>
                    <div class="form-group col-lg-4">
                      <div class="form-group">
                        <label for="shippingCost">Shipping Cost</label>
                       
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label for="note">Note</label>
                     
                     
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
                              
                            </tr>
                          </tfoot>
                          @endforeach
                        </table>
                      </div>
                <div class="table">
                  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" href="{{ url('/list') }}" class="btnprn btn">Save changes</button>
      </div>
    </div>
  </div>
</div>