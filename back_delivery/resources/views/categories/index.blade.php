<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends('panel')
<h1>Listado de Categorias</h1>
<a href="{{route('categories.create')}}">Registrar categoria</a>
<table>
    <tr>
        <th>nombre categoria</th>
        <th>menu</th>
        
    </tr>
@foreach ($categories as $category)
@section('content')
<tr>
    <td>{{$category->name}}</td>
    <td>{{$category->menu->name}}</td>
    <td><a href="{{route('categories.edit',$category->id)}}">Editar</a></td>
    <td>
        <form action="{{route('categories.destroy',$category->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </td>
</tr>
@endsection
@endforeach
</table>    

</body>
</html>