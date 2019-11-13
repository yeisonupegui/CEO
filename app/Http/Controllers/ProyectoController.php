<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* use App\Http\Request; */
use App\Proyecto;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProyectoFormRequest;
use DB;

class ProyectoController extends Controller
{
    //Definir el Constructor
    public function __construct()
    {
        
    }

    public function index (Request $request)
    {
        if($request){

            $query=trim($request->get('searchText'));
            $proyectos=DB::table('proyecto')
            ->where('nombreproyecto','LIKE','%'.$query.'%')
            /* ->where('condicion','=','1') */
            ->orderby('idproyecto','desc')
            ->paginate(2);
            return view('proyectos.index',["proyectos"=>$proyectos,"searchText"=>$query]);
        }
        
        //return view('categorias.index');
    }

public function create()
{
    return view("proyectos.create");
}

public function store (ProyectoFormRequest $request)
{
    $proyecto = new proyecto;
    $proyecto ->nombreproyecto=$request->get('nombre');
    $proyecto->descripcion=$request->get ('descripcion');
    /* $proyecto->condicion=1; */
    $proyecto->save();
    return Redirect::to('proyectos');
}

public function show ($id)
{
    return view ("proyectos.show",["proyectos"=>proyecto::findOrFail($id)]);
}

public function edit($id)
{
    return view ("proyectos.edit",["proyectos"=>proyecto::findOrFail($id)]);
}

public function update(ProyectoFormRequest $request,$id)
{
$proyecto=proyecto::findOrFail($id);
$proyecto->nombreproyecto=$request->get('nombre');
$proyecto->descripcion=$request->get('descripcion');
$proyecto->update();
return Redirect::to('proyectos');
}

/* public function destroy ($id)
{
    $proyecto = Proyecto::findOrFail($id);
    /* $proyecto ->condicion='0'; */
    //$proyecto ->update();
    //return Redirect::to('proyectos');
//}
 
public function destroy ($id)
{
    $proyecto = Proyecto::findOrFail($id);
    /* $proyecto ->condicion='0'; */
    $proyecto ->delete();
    return Redirect::to('proyectos');
}


}