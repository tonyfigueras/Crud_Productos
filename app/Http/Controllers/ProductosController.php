<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('productos/home', [
            'productos' => Producto::all()
        ]);
    }

   

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::orderBy('created_at', 'desc')->get();
        return view('productos/list', [
            'productos' => $productos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_unless(Auth::check(), 404);
        return view('productos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $producto = new Producto;
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->user()->associate($user);
        $res = $producto->save();

        if ($res) {
            
            return back()->with('status', 'Producto Creado');
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
           $producto = Producto::find($id);
           return view('productos/edit', [
            'producto' => $producto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        $request->validated();
        $producto = Producto::find($id);
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $res = $producto->save();

        if ($res) {
            return back()->with('status', 'Producto Actualizado Correctamente');
        }
        

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       
        $producto = Producto::where('id', $id)->first();
        $producto->delete();

        return back()->with('status', 'Producto eliminado correctamente');
    }
}
