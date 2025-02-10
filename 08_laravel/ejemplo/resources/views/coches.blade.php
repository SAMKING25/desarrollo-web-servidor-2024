<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coches</title>
</head>
<body>
    <h1>Lista de Coches</h1>
    <table>
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coches as $coche)
                <tr>
                    <td>{{ $coche[0] }}</td>
                    <td>{{ $coche[1] }}</td>
                    <td>{{ $coche[2] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
