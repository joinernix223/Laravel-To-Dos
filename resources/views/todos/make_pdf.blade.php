<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<h1>Tareas Registradas</h1>
<ul>
    @foreach ($todos as $todo )
    <li>
        {{$todo->title}}        
    </li>
    @endforeach
    <h2>Categorias Registradas</h2>
    @foreach ($categories as $category )
    <li>
        {{$category->name}}        
    </li>
    @endforeach
    <h2>Usuarios Registrados</h2>

    @foreach ($users as $user )
    <li>
    {{$user->name}}
    </li>
    @endforeach
</ul>
</div>
