<!DOCTYPE html>
<html>
<head>
    <title>Licence Expired</title>
</head>
<body>
    <h1>Hello, {{ $licence->isim }}</h1>
    <p>Your licence "{{ $licence->lisansadi }}" has expired.</p>
    <p>Please renew your licence to continue using the application.</p>
</body>
</html>
