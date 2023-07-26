<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- create.blade.php -->

<form action="{{ route('column.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="type">Type:</label>
    <input type="text" name="type" required>

    <label for="length">Length:</label>
    <input type="number" name="length" required>

    <button type="submit">Veri Oluştur</button>
</form>

</body>
</html>