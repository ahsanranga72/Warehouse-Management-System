<tr class="orderData dataRow{{$product->id}}" data-id="{{$product->id}}">
    <td>{{$product->product_name}}</td>
    <td>{{$product->product_code}}</td>
    <td class="d-flex">
        <input type="number" class="form-control quantity" required min="0" name="quantity{{$product->id}}" id="quantity{{$product->id}}">
        <select name="select-sale-unit{{$product->id}}" id="select-sale-unit{{$product->id}}" class="form-control w-50 select-sale-unit">
            @foreach($sale_unit as $key)
            <option data-id="{{ $key->id }}" value="{{ $key->value }}" {{ ($product->sale_unit==$key->id)?"selected":'' }}>{{ $key->name }}</option>
            @endforeach
    </td>
    <td class="rcvrow"><input type="number" min="0" class="form-control received " name="received{{$product->id}}" id="received{{$product->id}}"></td>
    <td class="unitcost" data-unitcost='{{$product->product_price}}'><input value="{{$product->product_price}}" type="number" class="form-control net-unit-cost" required min="0" name="net-unit-cost{{$product->id}}" id="net-unit-cost{{$product->id}}"></td>
    <td class='discount' data-discount='0'>0</td>
    <td><span class="tax">{{$product->product_tax}}</span></td>
    <td><span class="subtotal"></label></td>
    <td>
        <button type="button" class="ibtnDel btn btn-md btn-danger">Delete</button>
    </td>
</tr>