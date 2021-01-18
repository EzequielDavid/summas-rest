<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeveloper;
use App\Http\Requests\UpdateDeveloper;
use App\Http\Resources\Employee as EmployeeResources;
use App\Models\Developer;
use App\Models\Employee;
use Illuminate\Http\Request;

class DeveloperController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreDeveloper $request)
    {

       $employee = Developer::create([
           'language' => $request->input('language')
       ])->employee()->create($request->all());

        return response()->json(new EmployeeResources($employee), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param Developer $developer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateDeveloper $request,Developer $developer)
    {

             $developer->update([
                'language'=> $request->input('language')
            ]);

             Employee::whereId($request->id)->update([
                'company_id'=>$request->input('company_id'),
                'name'=> $request->input('name'),
                'surname'=> $request->input('surname'),
                'age'=> $request->input('age'),
            ]);


        return response()->json(new EmployeeResources($developer),201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
