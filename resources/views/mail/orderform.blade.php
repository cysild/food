

<table width='500' cellspacing='1' bgcolor='#999999' cellpadding='5' border='0'>
	<tr bgcolor='#ffffff'>
		<td align='center' colspan='2'><strong>Name</strong></td>
		<td align='center' colspan='2'>{{$name}}</td>
	</tr>
	<tr bgcolor='#ffffff'>
		<td align='center' colspan='2'><strong>email</strong></td>
		<td align='center' colspan='2'>{{$email}}</td>
	</tr>
	<tr bgcolor='#ffffff'>
		<td align='center' colspan='2'><strong>Phone</strong></td>
		<td align='center' colspan='2'>{{$phone}}</td>
	</tr>
	<tr bgcolor='#ffffff'>
		<td align='center' colspan='2'><strong>Adress</strong></td>
		<td align='center' colspan='2'>{{$address}}</td>
	</tr>
	<tr bgcolor='#ffffff'>
		<td align='center' colspan='2'><strong>Notes</strong></td>
		<td align='center' colspan='2'>{{$notes}}</td>
	</tr>
</table>

Order Details: 

<table width='500' cellspacing='1' bgcolor='#999999' cellpadding='5' border='0'>
	<tr bgcolor='#ffffff'>
		<th align='center' colspan='2'><strong>Product Name</strong></th>
		<th align='center' colspan='2'><strong>Product Quantity</strong></th>
		<th align='center' colspan='2'><strong>Product Price</strong></th>
	</tr>
	@foreach($items as  $value)
	<tr bgcolor='#ffffff'>
		<td align='center' colspan='2'>{{$value->product_name}}</td>
		<td align='center' colspan='2'>{{$value->product_quantity}}</td>
		<td align='center' colspan='2'>{{$value->product_price}}*{{$value->product_quantity}}</td>
	</tr>

	@endforeach

</table>

