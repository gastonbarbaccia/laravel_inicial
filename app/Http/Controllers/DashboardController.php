<?php

namespace App\Http\Controllers;

use App\Models\DashboardUser;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /*
    Esta funcion muestra todos los resultados traidos de la base de datos de la tabla DashboardUser
    */
    public function index(){

        #return $dashboard_usuarios = DashboardUser::all();

        $dashboard_usuarios = DashboardUser::all();

        return view('dashboard',compact('dashboard_usuarios'));
    }

    /*
    Esta funcion devuelve una vista de la pagina para crear un nuevo usuario donde se encuentra el formulario de creacion para el nuevo registro
    */

    public function create_user(){

        return view('form_registro');
    }

    /*
    Esta funcion se encarga de guardar los datos que se cargaron en el formulario anterior
    */
    public function save_user(Request $request){

        $user = new DashboardUser();
        $user ->firstname = $request->input('firstname');
        $user ->lastname = $request->input('lastname');
        $user ->nickname = $request->input('nickname');
        $user->save();
    
        return redirect()->route('dashboard');

    }

    /*
    Esta funcion se encarga de eliminar un registro en base al ID que le indiquemos
    */
    public function delete_user($id){

        $user = DashboardUser::findOrfail($id);
        $user->delete();
    
        return redirect()->route('dashboard');
    }

    /*
    Esta funcion se encarga de devolve una vista con un formulario cargado con los datos del registro a editar
    */

    public function edit_user($id){

        $user = DashboardUser::findOrfail($id);

        return view('form_editar',compact('user'));

    }

    /*
    Esta funcion se encarga de guardar los nuevos datos modificados el formulario de edicion
    */

    public function update_user(Request $request,$id){

        $user = DashboardUser::findOrfail($id);
        $user ->firstname = $request->input('firstname');
        $user ->lastname = $request->input('lastname');
        $user ->nickname = $request->input('nickname');
        $user->save();
    
        return redirect()->route('dashboard');

    }
}
