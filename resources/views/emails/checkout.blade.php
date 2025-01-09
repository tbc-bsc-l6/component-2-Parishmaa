@component('mail::message')
<p><b>Dear Team</b>,<br>An order has been received from {{$user->name}}. Details of the order is as shown below:</p>
<br>
@if(count($cartLists)>0)

<table>
    <thead>
        <tr>
            <th>SN</th></th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
        </tr>   
    </thead>
    <tbody>
        @php
            $totalPrice = 0;
        @endphp
        @foreach ($cartLists as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{!! $item->product->name ?? 'N/A' !!}</td>
                <td>{!! $item->quantity !!}</td>
                <td>${!! number_format($item->product->price, 2) !!}</td>
                <td>${!! number_format($item->quantity * $item->product->price, 2) !!}</td>
            </tr>
            @php
                 $totalPrice += $item->quantity * $item->product->price;
            @endphp
        @endforeach
    </tbody>
</table>
@endif
<b>The total amount of this order is $</b> {{$totalPrice}}.<br> Please carry on with the futher procedure.


<br>
<br>
Regards, <br />
{{ config('app.name') }}
<br>
<span><strong>This is an auto-generated email. Please do not reply to this email. We will shortly get back to you.</strong></span>
@endcomponent
