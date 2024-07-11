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
<a href="{{route('destinatario.create')}}">Registrar destanatario</a>
<table>
    <tr>
        <th>Descripcion</th>
        <th>Horas</th>
        <th>Precio Documento</th>    
        
    </tr>
@foreach ($destinatario as $destino)
<tr>
    <td>{{$destino->nombre}}</td>
    <td>{{$destino->cargo}}</td>
    <td><a href="{{route('destinatario.edit',$destino->id)}}">Editar</a></td>
    <td>
        <form action="{{route('destinatario.destroy',$destino->id)}}" method="post">
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