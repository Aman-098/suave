<h2>New Enquiry Received</h2>

<table style="width:100%; border-collapse: collapse; text-align:left;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px;">Name</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Email</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Vehicle Required</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Age of Driver</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Start Date</th>
            <th style="border: 1px solid #ddd; padding: 8px;">End Date</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Phone</th>
            <th style="border: 1px solid #ddd; padding: 8px;">Message</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['name'] }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['email'] }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['vehicle'] }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['age_driver'] }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['pickup_date'] }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['return_date'] }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['phone'] }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $data['message'] }}</td>
        </tr>
        
    </tbody>
</table>
