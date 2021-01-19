<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollection;
use App\Models\Developer;
use App\Models\Designer;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\Employee as EmployeeResources;
use Illuminate\Pagination\Paginator;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return EmployeeCollection
     */
    public function index(Request $request)
    {
        return new EmployeeCollection(Employee::orderBy($request->input('orderParam','id'),'desc')->paginate(5));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //Dejo codigo para expllicar porque lo saque
       /* $position = strtolower($request->input('position'));

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
               'employable_id'=>$employeePosition->id,
           ]
       );
        return response()->json(new EmployeeResources($employee),201);*/

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Employee $employee)
    {
        //Dejo codigo para expllicar porque lo saque
        /*$position = strtolower($request->input('position'));

        if($position == 'developer')
        {
            Developer::whereId($request->position_id)->update(['language'=> $request->input('language')]);
            $employeeType = Developer::class;
        }
        else
        {
            Designer::whereId($request->position_id)->update(['type'=> $request->input('type')]);
            $employeeType = Designer::class;
        }

        $employee->update([
               'name'=> $request->input('name'),
               'surname'=> $request->input('surname'),
               'age'=> $request->input('age'),
               'employable_type'=> $employeeType,
               'employable_id'=>$request->input('position_id')
        ]);

        return response()->json(new EmployeeResources($employee),201);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Employee $employee)
    {
        $employee->employable->delete();
        $employee->delete();
        return response()->json(null,204);
    }
}
