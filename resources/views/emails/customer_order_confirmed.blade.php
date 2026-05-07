<h2>Thank you for your Booking, {{ $booking->name }} 🎉</h2>

<p>Your Booking has been confimed.</p>

<h3>Booking Details</h3>

<table style="width:100%; border-collapse: collapse; text-align:left;">
    <tr>
        <td style="border: 1px solid #ddd; padding: 8px;"><strong>Fleet Name</strong></td>
        <td style="border: 1px solid #ddd; padding: 8px;">{{ $booking->fleet_name }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #ddd; padding: 8px;"><strong>Pickup Date</strong></td>
        <td style="border: 1px solid #ddd; padding: 8px;">{{ \Carbon\Carbon::parse($booking->pickup_date)->format('j F Y') }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid #ddd; padding: 8px;"><strong>Return Date</strong></td>
        <td style="border: 1px solid #ddd; padding: 8px;">{{ \Carbon\Carbon::parse($booking->return_date)->format('j F Y') }}</td>
    </tr>

    <tr>
        <td style="border: 1px solid #ddd; padding: 8px;"><strong>Message</strong></td>
        <td style="border: 1px solid #ddd; padding: 8px;">{{ $booking->message ?? '-' }}</td>
    </tr>
</table>


