<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Listado de destinatario</h1>
<a href="{{route('products.create')}}">Registrar producto</a>
<table>
    <tr>
        <th>name</th>
            
        
    </tr>
@foreach ($product as $products)
<tr>
    <td>{{$products->name}}</td>
    
    <td><a href="{{route('products.edit',$products->id)}}">Editar</a></td>
    <td>
        <form action="{{route('products.destroy',$products->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </td>
</tr>
@endforeach
</table>    

</body>
</html>