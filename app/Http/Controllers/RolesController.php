<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Roles::whereNull('deleted_at')->get();

        return view('roles.show-list', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            

            $rol_id = $request->input("rol_id");
            $nombreRol = $request->input("nombreRol");
            $descripcionRol = $request->input('descripcionRol');
            $usuario_at = $request->input('usuario_at');
                       

            $rol = Roles::where('nombreRol', $nombreRol)->whereNull('deleted_at')->first();

            if($rol_id == null){
                $guardar = DB::statement('call procAgregarRol(?, ?, ?)',[$nombreRol, $descripcionRol, $usuario_at]);

                if($rol != ""){
                    return response()->json([
                        "res" => false,
                        "exist" => true
                    ]);
                }else{
                    return response()->json([
                        "res" => true,
                        "exist" => false
                    ]);
                }
                

            }else{
                $editar = DB::statement('call procActualizarRol(?, ?, ?, ?)',[$rol_id, $nombreRol, $descripcionRol, $usuario_at]);

                if($rol != ""){
                    if($rol->id == $rol_id){
                        return response()->json([
                            "res" => "update",
                            "exist" => false
                        ]);
                    }else{
                        return response()->json([
                            "res" => false,
                            "exist" => true
                        ]);
                    }
                }else{
                    return response()->json([
                        "res" => "update",
                        "exist" => false
                    ]);
                }
                
                
            }                     
                    
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            

            $rol_id = $request->input('rol_id');
            $rol = Roles::find($rol_id);
            $rol->delete();

            return response()->json(
                ["res" => "delete"]
            );                  
                    
        }   
    }
}
