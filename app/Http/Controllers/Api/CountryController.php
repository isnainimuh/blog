<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        Country::create($request->all());

        return response()->json([
            'message' => 'Country created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $country = Country::find($id);

        if (!$country) {
            return response()->json([
                'message' => 'Country not found',
            ], 404);
        }

        return response()->json($country);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $country = Country::find($id);
        //dd($country);
         $request->validate([
            'country_name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // dump($request->country_name);
        // dd($country->status);

        $country->update($request->all());

        return response()->json([
            'message' => 'Country updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::find($id);

        if (!$country) {
            return response()->json([
                'message' => 'Country not found',
            ], 404);
        }

        $country->delete();

        return response()->json([
            'message' => 'Country deleted successfully',
        ]);
    }
}
