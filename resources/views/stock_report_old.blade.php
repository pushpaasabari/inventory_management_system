<!-- <!DOCTYPE html>
<html>
<head>
    <title>Stock Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Stock Report</h2>
    <table>
        <thead>
            <tr>
                <th>Raw Item</th>
                <th>Opening Stock</th>
                <th>Consumed</th>
                <th>Remaining Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td>{{ $item['value'] }}</td>
                    <td>{{ $item['remaining'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> -->