 Customer Name: <h1>Order Details</h1>
 Customer Adresss: <h3>{{ $order->name }}</h3>
 Customer Email: <h3>{{ $order->email }}</h3>
 Customer Phone Number: <h3>{{ $order->phone }}</h3>
 Customer Id: <h3>{{ $order->user_id}}</h3>

Product  Name: <h3>{{ $order->product_title }}</h3>
Product Price: <h3>{{ $order->price }}</h3>
Product Payment Status: <h3>{{ $order->payment_status }}</h3>
<br><br>
<img height="250" weight="450" src=" products/{{$order->image}} " alt="">
