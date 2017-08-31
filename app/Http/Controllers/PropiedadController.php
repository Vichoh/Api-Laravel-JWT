<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propiedad;
use App\Empresa;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propiedades = Propiedad::All();
        $respuesta = array();
        $contador = 0;

        foreach ($propiedades as $propiedad) {
            
            $empresa = Empresa::find($propiedad->id_empresa);

            $respuesta [$contador]["id"] = $propiedad->id;
            $respuesta [$contador]["nombre"] = $propiedad->nombre;
            $respuesta [$contador]["descripcion"] = $propiedad->descripción;
            $respuesta [$contador]["empresa"] = $empresa;

            $contador++;

        }


        return  \Response::json($respuesta,200);
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
        try {

            Propiedad::create($request->all());
            return \Response::json(['created'=>true],200);
            
        } catch (\Exception $e) {

            \Log:info('Error al crear Propiedad' . $e);
            return \Response::json(['created'=>false],500)
            
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

        try {

            $propiedad = Propiedad::findOrFail($id);

            $respuesta = Array();

            $empresa = Empresa::find($propiedad->id_empresa);

            $respuesta [$contador]["id"] = $propiedad->id;
            $respuesta [$contador]["nombre"] = $propiedad->nombre;
            $respuesta [$contador]["descripcion"] = $propiedad->descripción;
            $respuesta [$contador]["empresa"] = $empresa;

            if (isset($propiedad) {
                $datos = [

                    'error' => true,
                    'msg'   => 'No se encontro la propiedad con el id' .  $id,
                ];

                return \Response::json($data, 404);
            }

              

        } catch (Exception $e) {
            
            $datos =[
                'errors'    => true,
                'msg'       => $e->getMessage(),
            ]; 
            return \Response::json($datos, 500); 
        }


        return \Response::json($respuesta, 200);
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

            $propiedad = Propiedad::find($id);
            
           

            if (isset($propiedad)) {

                $propiedad->update($request->all());
                return \Response::json($propiedad, 200);

            }else{

                return \Response::json(['error' => 'No se encontro la propiedad'], 404);

            }
        
        }catch(\Exception $e){

            \Log::info('Error al actualizar la propiedad'. $e);
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
        try {

            Propiedad::destry($id);
            return \Response::json(['deleted' => true], 200);
            
        } catch (Exception $e) {

             \Log::info('Error al eliminar la propiedad'. $e);
            return \Response::json('Error',500); 
        }
    }
}
