<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollection;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return new EmployeeCollection(Employee::with('developer')->get());
       /*return [
          'developers'=> new DeveloperCollection(Developer::orderBy('developer_id','desc')->paginate(5)),
           'designers'=> new DesignerCollection(Designer::orderBy('designer_id','desc')->paginate(5))
        ];*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
