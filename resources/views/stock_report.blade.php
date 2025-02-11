

<!DOCTYPE html>
<html>
<head>
    <title>Tax Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
    </style>
</head>
<body>
    <h2>Avinis Home Special</h2>
    <p>152 POLICE COLONY,6TH CROSS, PAPPARAPATTI, Dharmapuri</p>
    <p>Phone: 9787722200 | Email: avinishomespecial@gmail.com | GSTIN: 33HKEPS8511P1ZH</p>

    <hr>

    <h3>Tax Invoice</h3>
    <p><strong>Invoice No:</strong> </p>
    <p><strong>Date:</strong> </p>
    <p><strong>Place of Supply:</strong> 33-Tamil Nadu</p>

    <h3>Bill To:</h3>
    <p><strong></strong></p>
    <p></p>
    <p><strong>GSTIN:</strong> </p>

    <h3>Ship To:</h3>
    <p></p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>HSN</th>
                <th>Qty</th>
                <th>Unit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td>{{ $item['value'] }}</td>
                    <td>{{ $item['remaining'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total Summary</h3>

    <h3>Amount in Words:</h3>

    <p><strong>Bank Details:</strong></p>
    <p>STATE BANK OF INDIA, ELAKKIAMPATTI</p>
    <p>Account No: 43445436065 | IFSC: SBIN0012770</p>

    <p><strong>Terms & Conditions:</strong></p>
    <p>Thanks for doing business with us! This is a computer-generated invoice. No signature required.</p>
</body>
</html>

