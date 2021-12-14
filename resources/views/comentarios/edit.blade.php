@extends('..layouts.app')

@section('content')
<section class="w-full  py-4 flex-row justify-center text-center">
    <div class="flex justify-center">
        <div class="max-w-4xl">
            <h1 class="px-4 text-6xl break-words">Añadir Comentarios</h1>
        </div>
    </div>
</section>
<article class="w-full py-8">
<div class="text-left py-2">
                <a class="inline-block px-4 py-1 bg-red-500 text-white rounded mr-2 hover:bg-red-800" href="{{ route('productos.store') }}" title="Edit">Regresar al menú principal</a>
            </div>
    <div class="flex justify-center">

<table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-2">Comentarios</th>
                         <th class="px-2">Creación</th>
                       
                    </tr>
                </thead>
                <tbody>
                @foreach($comentarios as $comentario)
                    <tr>
                        <td class="px-2">{{ $comentario->comentario }}</td>
                        <td class="px-2">{{ $comentario->created_at->format('j F, Y') }}</td>
                       
                        
                       
                @endforeach
                </tbody>
            </table>

<br><br><br><br><br>

        <div class="max-w-7xl text-justify">
            <form action="{{ route('comentarios.update', $idproducto) }}" method="post">
                @csrf
                @method('PUT')
                <input class="w-full border rounded focus:outline-none focus:shadow-outline p-2 mb-4" type="text" name="comentario" placeholder="Agregar Comentario" required>
                
              
                <input type="submit" value="Añadir" class="px-4 py-2 bg-green-300 cursor-pointer hover:bg-green-500 font-bold w-full border rounded border-green-300 hover:border-orange-500 text-white">
                @if (session('status'))
                    <div class="w-full bg-green-500 p-2 text-center my-2 text-white">
                        {{ session('status') }}
                    </div>
                @endif
                @if($errors->any())
                <div class="w-full bg-red-500 p-2 text-center my-2 text-white">
                    {{$errors->first()}}
                </div>
                @endif
            </form>
        </div>
    </div>
</article>
@endsection