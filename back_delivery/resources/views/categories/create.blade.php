<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div>
            <label for="nombre">nombre</label>
            <input type="text" name="nombre" id="nombre">
            <label for="menu">id menu</label>
            <select name="menu" id="menu">
                @foreach ($menus as $menu)
                <option value="{{$menu->id}}">{{$menu->name}}</option>
                @endforeach
            </select>
            
        </div>
    
    <div>
        <input type="submit" value="Registrar">
    </div>
    </form>
    
</body>
</html>