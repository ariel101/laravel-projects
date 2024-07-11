<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{route('categories.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
        <label for="nombre">nombre</label>
        <input type="text" name="name" id="nombre" value="{{$category->name}}">
        <label for="menu">id menu</label>
            <select name="menu_id" id="menu">
                @foreach ($categories as $categorioption)
                <option value="{{$categorioption->menu->id}}" {{ $categorioption->menu->id == $category->menu->id ? 'selected' : '' }}>{{$categorioption->menu->name}}</option>
                @endforeach
            </select>
        
    </div>
    <div>
        <input type="submit" value="Actualizar">
    </div>
    </form>
    
</body>
</html>