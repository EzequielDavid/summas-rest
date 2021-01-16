<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company as CompanyResources;
use App\Models\Company;
use http\Client\Response;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CompanyResources
     */
    public function index()
    {
        return new CompanyResources(Company::withCount('employees')->find(1));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->all());

        return response()->json(new CompanyResources($company));
    }

}
