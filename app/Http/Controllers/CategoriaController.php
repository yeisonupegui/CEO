<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* use App\Http\Request; */
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    //Definir el Constructor
    public function __construct()
    {
        
    }

    public function index (Request $request)
    {
        if($request){

            $query=trim($request->get('searchText'));
            $categorias=DB::table('categoria')
            ->where('nombre','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orderby('idcategoria','desc')
            ->paginate(2);
            return view('categorias.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
        
        //return view('categorias.index');
    }

public function create()
{
    return view("categorias.create");
}

public function store (CategoriaFormRequest $request)
{
    $categoria = new categoria;
    $categoria ->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get ('descripcion');
    $categoria->condicion=1;
    $categoria->save();
    return Redirect::to('categorias');
}

public function show ($id)
{
    return view ("categorias.show",["categorias"=>categoria::findOrFail($id)]);
}

public function edit($id)
{
    return view ("categorias.edit",["categorias"=>categoria::findOrFail($id)]);
}

public function update(CategoriaFormRequest $request,$id)
{
$categoria=categoria::findOrFail($id);
$categoria->nombre=$request->get('nombre');
$categoria->descripcion=$request->get('descripcion');
$categoria->update();
return Redirect::to('categorias');
}

public function destroy ($id)
{
    $categoria = Categoria::findOrFail($id);
    $categoria ->condicion='0';
    $categoria ->update();
    return Redirect::to('categorias');
}

}
