<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollection;
use App\Models\Company;
use App\Models\Developer;
use App\Models\Designer;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\Employee as EmployeeResources;
use App\Http\Resources\Developer as DeveloperResources;
use App\Http\Resources\DeveloperCollection;
use App\Http\Resources\Designer as DesignerResources;
use App\Http\Resources\DesignerCollection;
use Illuminate\Pagination\Paginator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return EmployeeCollection
     */
    public function index()
    {

        return new EmployeeCollection(Employee::orderBy('id','desc')->paginate(5));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
       $position = strtolower($request->input('position'));

       if($position == 'developer')
       {
           $employeePosition = Developer::create(['language'=> $request->input('language')]);
           $employeeType = Developer::class;
       }
       else
       {
           $employeePosition = Designer::create(['type'=> $request->input('type')]);
           $employeeType = Designer::class;
       }

       $employee = Employee::create(
           [
               'company_id'=> 1,
               'name'=> $request->input('name'),
               'surname'=> $request->input('surname'),
               'age'=> $request->input('age'),
               'employable_type'=> $employeeType,
               'employable_id'=>$employeePosition->id
           ]
       );
        return response()->json(new EmployeeResources($employee),201);

    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Employee $employee)
    {
        return response()->json(new EmployeeResources($employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Employee $employee
     * @return void
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->employable->delete();
        $employee->delete();
        return response()->json(null,204);
    }
}
