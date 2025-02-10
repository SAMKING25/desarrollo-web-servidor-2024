<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas</title>
</head>
<body>
    <h1>Lista de Marcas</h1>
    <ol>
        @foreach($marcas as $marca)
            <li>{{ $marca }}</li>
        @endforeach
    </ol>
</body>
</html>