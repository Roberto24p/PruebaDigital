<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class UserController extends Controller
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

        $newContra = strval(hash('sha512', '1234567890'.$request->password));
        app('db')->insert('INSERT INTO `tb_usuarios` (`cod_usuario`, `nombre`, `telefono`, `password`, `fecha_nacimiento`, `fecha_create`, `fecha_update`, `estado`) VALUES (NULL, ?, ?, ?, ?, SYSDATE(), NULL, ? );', [$request->nombre, $request->telefono,$newContra,$request->fechaNac, 'A']);
        return 'OK';
    }

    public function show(){
        $results = app('db')->select('SELECT * FROM tb_usuarios');
        return $results;
    }

    public function update(Request $request){
        app('db')->insert('UPDATE tb_usuarios SET nombre=?, telefono=?, password=?, fecha_nacimiento=?, fecha_update=SYSDATE(), estado=? WHERE cod_usuario=?', [$request->nombre, $request->telefono,$request->password,  $request->fechaNac, $request->estado, $request->id]);
    }

    //
}
