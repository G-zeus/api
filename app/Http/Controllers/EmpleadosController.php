<?php

namespace App\Http\Controllers;

use App\Empleados;
use App\Skills;
use App\empleados_skills;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EmpleadosController extends Controller
{


    function index(Request $request, Empleados $empleados){
        if (!$request->isJson())
            return response()->json(['error' => 'Unautorized'], 401);

        $result = $empleados->all();

        if (!$result->isEmpty())

            return response()->json($result->toArray(), 200);

        return response()->json(['error' => 'No Data'], 401);


    }

    function store(Request $request, Empleados $empleados, Skills $skills, empleados_skills $empleado_skill){


        $validacion = $this->Validar($request->all());

        if ($validacion)
            return response()->json($validacion, 401);

        $empleado = $empleados->create($request->all());
        $skill = $skills->where('skill', $request->skill)->first();
        if (!$skill)
            $skill = $skills->create($request->all());

        $empleado_skill->create(['empleado_id' => $empleado->id, 'skill_id'=> $skill->id, 'calificacion'=>$request->calificacion]);


        return response()->json(['response' => 'success'], 201);

    }

    function show(Empleados $empleados, Request $request, $empleado){

        if (!$request->isJson())
            return response()->json(['error' => 'Unautorized'], 401);

        $result = $empleados->where("primer_apellido",$empleado)->orWhere(
            "nombre",$empleado)->orWhere(
            "segundo_apellido",$empleado)->orWhere(
            "email",$empleado)->first();

        if (isset($result))
            return response()->json($result, 200);

        return response()->json(['error' => 'No Data'], 401);


    }

    function update(){

    }

    function  destroy(){

    }

    /**
     * @param array $data
     * @return bool
     */
    private function Validar(array $data){

        $validator = validator::make($data, [
            'primer_apellido' =>'required',
            'nombre' =>'required',
            'segundo_apellido'=> 'required',
            'email'=> 'required|email|unique:empleados,email',
            'puesto'=> ['required', Rule::in(['SOLDADO', 'SARGENTO', 'TENIENTE', 'CAPITAN'])],
            'nacimiento'=> 'required',
            'domicilio'=>'required',
            'skill'=>'required',
            'calificacion'=>['required', Rule::in(['1','2','3','4','5'])]
        ]);

        if ($validator->fails())
            return $validator->errors();

        return false;

    }
}
