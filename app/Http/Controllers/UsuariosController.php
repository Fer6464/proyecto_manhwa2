<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $obras = Obra::latest()->get();
        return view('user/index', compact('obras'));
    }

    public function create()
    {
        return view('user.createuser');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'apodo' => 'required|string|max:50|unique:usuarios,apodo',
            'contraseña' => 'required|string|min:8|max:50',
            'genero' => 'required|in:Masculino,Femenino,Otro',
            'foto_perfil' => 'nullable|string|max:200',
            'fondo_perfil' => 'nullable|string|max:200',
            'rol' => 'nullable|string|max:30',
        ]);
        $usuario = Usuarios::create([
            'apodo' => $request->input('apodo'),
            'contraseña' => $request->input('contraseña'),
            'genero' => $request->input('genero'),
            'foto_perfil' => $request->input('foto_perfil'),
            'fondo_perfil' => $request->input('fondo_perfil'),
            'rol' => $request->input('rol'),
            
        ]);
        $this->iniciarSesion($usuario);
        return redirect('user/')
            ->with('success', 'Usuario creado correctamente.');
    }

    public function login(){
        return view('user.login');
    }

    public function sesionstore(Request $request){
        $apodo = $request->input('apodo');
        $contraseña = $request->input('contraseña');
        //la ciberseguridad se fue de sabatico
        $usuario = Usuarios::where('apodo', $apodo)
                   ->where('contraseña', $contraseña) 
                   ->first();
        if($usuario){
            $this->iniciarSesion($usuario);
            return redirect('user/')
                ->with('success', 'Sesion iniciada correctamente.');
        }
        return back()->withErrors(['apodo' => 'El apodo proporcionado no existe.']);
    
    }

    private function iniciarSesion($usuario)
    {
        session(['apodo' => $usuario->apodo, 
        'fotoperfil' => $usuario->foto_perfil, 
        'fondoperfil' => $usuario->fondo_perfil,
        'rol' => $usuario->rol,
        'fecha_creacion' => $usuario->created_at,
        'id' => $usuario->id]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuarios::find($id);
        return view('user.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $usuario = Usuarios::findOrFail($id);
        $request->validate([
            'apodo' => 'required|string|max:50|unique:usuarios,apodo,' . $usuario->id,
            'contraseña' => 'required|string|min:8|max:50',
            'genero' => 'required|in:Masculino,Femenino,Otro',
            'foto_perfil' => 'nullable|string|max:200',
            'fondo_perfil' => 'nullable|string|max:200',
            'rol' => 'nullable|string|max:30',
        ]);
        $usuario->update($request->only([
        'apodo',
        'contraseña',
        'genero',
        'foto_perfil',
        'fondo_perfil',
        'rol',
        ]));

        $this->iniciarSesion($usuario);
        return redirect('user/')
            ->with('success', 'Perfil actualizado correctamente.');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }
}
