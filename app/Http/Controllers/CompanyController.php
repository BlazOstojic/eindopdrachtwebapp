<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {

        $query = Company::query();

        
        if ($id !== null) {

            $query->where('id', $id);
        }

        $data = $query->get();
    

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'telephone_number' => 'required',
            'category_id' => 'required'
            // Add any other validation rules for your specific fields
        ]);

        // Create a new instance of your model
        $Company = new Company();

        $Company->fill($validatedData);

        // Set any other fields on the model

        // Save the model
        $Company->save();

        // Return a response

        $query = Company::query()->where('name', $validatedData['name']);

        $data = $query->get();
    
        return response()->json([$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company, $id)
    {
            $company = Company::find($id);
    
            if (!$company) {

                return response()->json(['message' => 'Record not found'], 404);
            }
    
            $company->update($request->all());

            $query = Company::query()->where('id', $id);

            $data = $query->get();
    
            return response()->json([$data, 'message' => 'Record updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company, $id)
    {

        $company = Company::find($id);

        if (!$company) {

            return response()->json(['message' => 'Record not found'], 404);

        }

        $company->delete();

        return response()->json(['message' => 'Record deleted successfully']);
        
    }


}
