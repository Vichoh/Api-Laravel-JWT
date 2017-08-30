<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $empresas = Empresa::all();
           return \Response::json($empresas,200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{

            Empresa::create($request->all());
            return \Response::json(['created'=>true],200);

        }catch(\Exception $e){

            \Log::info('Error al crear la empresa'. $e);
            return \Response::json(['created'=>false], 500);

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
        //con el findOrFail retorna  un error si no existe ningun modelo coincidente (el find regresa nulo)

        try{


            $empresa = Empresa::findOrFail($id);

            if (!isset($empresa)) {

                $datos =[
                    'errors'    => true,
                    'msg'       => 'No se encontro la empresa con ID = ' . $id,
                ];

                return \Response::json($data,404);
            }

        }catch (\Exception $e){

            $datos =[
                    'errors'    => true,
                    'msg'       => $e->getMessage(),
                ]; 
            return \Response::json($data, 500); 
        }
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

            $empresa = Empresa::find($id);
            $empresa->update($request->all());
           

            if (isset($empresa)) {

                \Response::json($empresa, 200);

            }else{

                \Response::json(['error' => 'No se actualizo la empresa'], 404);

            }
        
        }catch(\Exception $e){

            \Log::info('Error al actualizar la empresa'. $e);
            return \Response::json('Error',500); 

        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            Empresa::destroy($id);
            return \Response::json(['deleted' => true], 200);

        }catch(\Exception $e){

            \Log::info('Error al eliminar la empresa'. $e);
            return \Response::json('Error',500); 
        }
        

    }
}
