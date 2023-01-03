<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RequestUserUpdate;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pagina de administracion de usuarios

        //obtener los roles del usuario
        $users = User::with('roles')->get();
        $u = User::all();
        //enviar los datos del usuario a la vista vAdmin
        return Inertia::render('Admin/vAdmin',compact('users','u'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //no es necesario crear usuarios desde el administrador
        return Inertia::render('Admin/CreateUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // no es necesario crear usuarios
        $user = $request->all();
        $use = User::create([
            'name'=>$user['name'],
            'email'=>$user['email'],
            'password'=>Hash::make($user['password']),
        ]);
        $use->assignRole('user');
        
        return Inertia::render('Admin/Create',compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show( $user)
    {
        //funcion para visualizar los datos del usuario
        //nnota: necesario sequir desarrollando 
        $us = User::find($user);
        return Inertia::render('Admin/showUser',compact('us'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $user)
    {
        //controlador para direccionar a la Vista editarUser
        //nnota: necesario sequir desarrollando la edicion del usuario
        //$us = $use::with('roles')->get();
        $us = User::find($user);
        //se manda los datos del usuario a editar a la vista
        return Inertia::render('Admin/editUser',compact('us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUser $request,  $user)
    {
        //funcion para actualizar los datos del usuario
        $rq = $request->all();
        User::find($user)->update([
            'name'=>$rq['name'],
            'email'=>$rq['email'],
            'password'=>Hash::make($rq['password']),
        ]);

        return Redirect::route('admin.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $user)
    {
        //funcion para eliminar un usuario desde el administrador
        $us = User::find($user);
        $us->delete();
        return Redirect::route('admin.index');
    }
}
