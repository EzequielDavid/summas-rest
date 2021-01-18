<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesigner;
use App\Http\Resources\Employee as EmployeeResources;
use App\Models\Designer;
use App\Models\Employee;
use Illuminate\Http\Request;

class DesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreDesigner $request)
    {

        $employee = Designer::create([
            'type' => $request->input('type')
        ])->employee()->create($request->all());

        return response()->json(new EmployeeResources($employee), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Designer $designer
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request,Designer $designer)
    {
        $designer->update([
            'type'=> $request->input('type')
        ]);

        Employee::whereId($request->id)->update([
            'company_id'=>$request->input('company_id'),
            'name'=> $request->input('name'),
            'surname'=> $request->input('surname'),
            'age'=> $request->input('age'),
        ]);


        return response()->json(new EmployeeResources($designer),201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
