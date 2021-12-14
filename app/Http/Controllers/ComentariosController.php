<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Comentario;
use App\Http\Requests\ComentarioRequest;

use Illuminate\Support\Facades\Auth;

class ComentariosController extends Controller
{

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('comentarios/create');
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
           $comentario = Comentario::find($id);
           return view('comentarios/edit', [
            'comentarios' => Comentario::where('producto_id',$id)->get(), 'idproducto'=>$id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComentarioRequest $request, $id)
    {
       

        $comentarios = new Comentario;
        $comentarios->comentario = $request->input('comentario');
        $comentarios->producto_id = $id;
        $res = $comentarios->save();

        if ($res) {
            
           return view('comentarios/edit', [
            'comentarios'=>Comentario::where('producto_id',$id)->get(),'idproducto'=>$id
        ]);
        }
        

       
    }

  
}
