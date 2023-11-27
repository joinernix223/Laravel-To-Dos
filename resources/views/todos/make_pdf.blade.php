<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            text-align: center;
        }
        .color-container{
            width: 16px;
            height: 16px;
            display: inline-block;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Datos Registrados</h1>
    <table>
        <tr>
            <th>Tareas</th>
            <th>Categorías</th>
            <th>Usuarios</th>
        </tr>
        @foreach ($todos as $key => $todo)
            <tr>
                <td>{{$todo->title}}</td>
                <td>
                    <span class="color-container" style="background-color: {{ $categories[$key]->color }}"></span>
                    {{$categories[$key]->name}}
                </td>
                <td>{{$users[$key]->name}}</td>
            </tr>
            @endforeach
    </table>
</body>
</html>
