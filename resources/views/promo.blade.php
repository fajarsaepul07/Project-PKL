<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($a)
    Barang : {{ $a}} <br>
    @if($b)
    Kode : {{ $b}} <br>
    @endif
    @else
    Kode Promo Anda 
    @endif
</body>
</html>