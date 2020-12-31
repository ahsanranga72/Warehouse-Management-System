<tr class="orderData dataRow{{$product->id}}" data-id="{{$product->id}}">
    <td>{{$product->product_name}}</td>
    <td>{{$product->product_code}}</td>
    <td><input type="number" class="form-control quantity" required min="0" name="quantity{{$product->id}}" id="quantity{{$product->id}}"></td>
    <td class="rcvrow"><input type="number" min="0" class="form-control received " name="received{{$product->id}}" id="received{{$product->id}}"></td>
    <td class="unitcost" data-unitcost='{{$product->product_cost}}'>{{$product->product_cost}}</td>
    <td class='discount' data-discount='0'>0</td>
    <td><span class="tax">{{$product->product_tax}}</span></td>
    <td><span class="subtotal"></label></td>
    <td>
        <button type="button" class="ibtnDel btn btn-md btn-danger">Delete</button>
    </td>
</tr>