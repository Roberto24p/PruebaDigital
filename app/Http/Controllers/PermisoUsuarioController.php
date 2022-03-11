<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PermisoUsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request)
    {
        app('db')->insert('INSERT INTO `tb_usuarios_permisos` (`cod_usuario`, `cod_permiso`) VALUES (?, ?);', [$request->codUsuario, $request->codPermiso]);
        return 'OK';
    }

    public function get()
    {
        $results = app('db')->select('SELECT * FROM tb_permisos');
        return $results;
    }
    public function show(Request $request)
    {
        $results = app('db')->select('SELECT tb_permisos.nombre as nombre, tb_permisos.cod_permiso as codpermiso from tb_permisos, tb_usuarios,tb_usuarios_permisos WHERE tb_usuarios_permisos.cod_usuario = tb_usuarios.cod_usuario AND tb_usuarios_permisos.cod_permiso = tb_permisos.cod_permiso AND tb_usuarios.cod_usuario = ?
        ', [$request->id]);
        return $results;
    }
    //
}
