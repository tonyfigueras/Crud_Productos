@extends('..layouts.app')

@section('content')
<section class="w-full py-4 flex-row justify-center text-center">
    <div class="flex justify-center">
        <div class="max-w-4xl">
            <h1 class="px-4 text-6xl break-words">Lista de Productos</h1>
        </div>
    </div>
</section>
<article class="w-full py-8">
    <div class="flex justify-center">
        <div class="max-w-7xl text-justify">@if($errors->any())
            <div class="w-full bg-red-500 p-2 text-center my-2 text-white">
                {{$errors->first()}}
            </div>
            @endif
            @if (session('status'))
                <div class="w-full bg-green-500 p-2 text-center my-2 text-white">
                    {{ session('status') }}
                </div>
            @endif
            <div class="text-right py-2">
                <a class="inline-block px-4 py-1 bg-green-500 text-white rounded mr-2 hover:bg-green-800" href="{{ route('productos.create') }}" title="Edit">Añadir Producto</a>
            </div>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-2">Nombre</th>
                        <th class="px-2">Precio</th>
                        <th class="px-2">Creación</th>
                        <th class="px-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($productos as $product)
                    <tr>
                        <td class="px-2">{{ $product->nombre }}</td>
                         <td class="px-2">{{ $product->precio }}</td>
                        <td class="px-2">{{ $product->created_at->format('j F, Y') }}</td>
                       
                        
                        <td class="px-2">
                            <a class="inline-block px-4 py-1 bg-yellow-500 text-white rounded mr-2 hover:bg-yellow-800" href="{{ route('comentarios.edit', $product) }}" title="Edit">Ver Detalles</a>
                            <a class="inline-block px-4 py-1 bg-blue-500 text-white rounded mr-2 hover:bg-blue-800" href="{{ route('productos.edit', $product) }}" title="Edit">Editar</a>

                            <a class="inline-block px-4 py-1 bg-red-500 text-white rounded mr-2 hover:bg-red-800 delete-post" href="{{ route('productos.destroy', $product) }}" title="Delete" data-id="{{$product->id}}">Eliminar</a>
                            <form id="productos.destroy-form-{{$product->id}}" action="{{ route('productos.destroy', $product) }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                                @method('DELETE')
                            </form>
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</article>
<script>

    var delete_post_action = document.getElementsByClassName("delete-post");

    var deleteAction = function(e) {
        event.preventDefault();
        var id = this.dataset.id;
        if(confirm('Esta seguro?')) {
            document.getElementById('productos.destroy-form-' + id).submit();
        }
        return false;
    }

    for (var i = 0; i < delete_post_action.length; i++) {
        delete_post_action[i].addEventListener('click', deleteAction, false);
    }
</script>
@endsection