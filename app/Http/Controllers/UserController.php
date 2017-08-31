<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::All();
        return \Response::json($usuarios, 200);
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

            User::create($request->All());
            return \Response::json(['created'=>true],200);
            
        } catch (Exception $e) {
            
            \Log::info('No se pudo guardar el usuario' . $e);
            return \Response::json(['created'=>false],500);
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
            
            $user = User::findOrFail($id);

            if (isset($user)) {
                
                $data = [

                    'errors'    => true,
                    'msg'       => 'no se encontro el usuario con el id'. $id,

                ];

                return \Response::json($data,404);
            }
            

        } catch (Exception $e) {
            
            $data = [
                'errors' => true,
                'msg'   => $e->getMessage(),
            ]

            return \Response::json($data, 500);
        }

        return \Response::json($user, 200);


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
        try {

            $user = User::find($id);

            if (isset($user)) {

                $user->update($request->All());
                return \Response::json(['update'=>true], 200);

            }else{

                return \Response::json(['update'=>false], 404);

            }
            
        } catch (Exception $e) {

            \Log::info('error al actualizar usuario' . $e);
            return \Response::json(['update'=>false], 500);
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

            User::destroy($id);
            return \Response::json(['deleted' => true], 200);

        }catch(\Exception $e){

            \Log::info('Error al eliminar la user'. $e);
            return \Response::json('Error',500); 
        }
    }
}
