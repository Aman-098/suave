<h2>Thank you for your order, {{ $order->name }} 🎉</h2>

<p>Your order has been successfully placed.</p>

<h3>Order Details</h3>
<table style="width:100%; border-collapse: collapse; text-align:left; margin-bottom: 20px;">
    <thead>
        <tr style="background-color:#f2f2f2;">
            <th style="border: 1px solid #ddd; padding: 8px;">Product Name</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Qty</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Product Price (£)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->product_name }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->qty }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">£{{ $item->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Subtotal:</strong> £{{ $order->subtotal }}</p>
<p><strong>Vat:</strong> £{{ $order->vat }}</p>
<p><strong>Shipping:</strong> £{{ $order->shipping }}</p>
<p><strong>Total:</strong> £{{ $order->total }}</p>

<p>We’ll contact you soon for delivery. 🚚</p>
