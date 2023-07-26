<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <thead>
        <tr>
            <th>Value</th>
            <th>Row Number</th>
            <th>Column ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach($values as $value)
        <tr>
            <td>{{ $value->value }}</td>
            <td>{{ $value->rowNumber }}</td>
            <td>{{ $value->column_id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>