@extends('..layouts.app')

@section('content')
<section class="w-full py-4 flex-row justify-center text-center">
    <div class="flex justify-center">
        <div class="max-w-4xl">
            <h1 class="px-4 text-6xl break-words">Crear Producto</h1>
        </div>
    </div>
</section>
<article class="w-full py-8">
<div class="text-left py-2">
                <a class="inline-block px-4 py-1 bg-red-500 text-white rounded mr-2 hover:bg-red-800" href="{{ route('productos.store') }}" title="Edit">Regresar al menú principal</a>
            </div>
    <div class="flex justify-center">
        <div class="max-w-7xl text-justify">
            <form action="{{ route('productos.store') }}" method="post">
                @csrf
                <input class="w-full border rounded focus:outline-none focus:shadow-outline p-2 mb-4" type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre del Producto">
                <input class="w-full border rounded focus:outline-none focus:shadow-outline p-2 mb-4" type="text" name="precio" value="{{ old('precio') }}" placeholder="Precio" required>
             
                <input type="submit" value="Guardar" class="px-4 py-2 bg-green-300 cursor-pointer hover:bg-green-500 font-bold w-full border rounded border-green-300 hover:border-green-500 text-white">
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