<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{route('products.update',$products->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{$destinatario->nombre}}">
        
        
    </div>
    <div>
        <input type="submit" value="Actualizar">
    </div>
    </form>
    
</body>
</html>