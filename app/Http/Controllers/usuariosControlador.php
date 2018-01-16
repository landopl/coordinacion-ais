<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class usuariosControlador extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('admin.usuarios.crear');
    }

    public function store(Request $request)
    {  
        $usuario = new User($request->all());
        $usuario->clave = bcrypt($request->clave);
        $usuario->save();        
    }
 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
