<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Availables</title>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px, solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .mainText {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2 class="mainText">Products Availables</h2>
    <table>
        <tr>
            <th>
                Id
            </th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>
        @foreach ($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>${{ $p->price }}</td>
                <td>{{ $p->stock }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
