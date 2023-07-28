<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
  <tr>
    @foreach($columns as $column)
      <th>{{$column->name}}*****</th>
    @endforeach
  </tr>
  
  @foreach($values->groupBy('rowNumber') as $groupedValues)
    <tr>
      @foreach($columns as $column)
        @php
          $valueForColumn = $groupedValues->where('column_id', $column->id)->first();
        @endphp
        <td>{{ $valueForColumn ? $valueForColumn->value : '' }}</td>
      @endforeach
    </tr>
  @endforeach
</table>




</body>
</html>