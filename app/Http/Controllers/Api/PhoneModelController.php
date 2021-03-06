<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\PhoneModel\PhoneModelCollection;
use App\Models\PhoneModel;
use Illuminate\Http\Request;

class PhoneModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allmodels = PhoneModel::all();
        return response()->json($allmodels, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function filterModel($brand_id)
    {		
		$phoneModels = PhoneModel::where('brand_id', '=', $brand_id)->get();
		
		if($phoneModels == '[]'){
            return response()->json(['message' => "Model not Found"], 200);
        }
		 
        if(is_null($phoneModels)){
            return response()->json(['message' => "Model not Found"], 404);
        }

        return response()->json(new PhoneModelCollection($phoneModels), 200);
    }

    public function seriesShow($series_id)
    {		
		$phoneModels =  PhoneModel::where('series_id', '=', $series_id)->with('series:id,name')->get();
		 
		 if($phoneModels == '[]'){
            return response()->json(['message' => "Model not Found"], 200);
        }
		 
		 
        if(is_null($phoneModels)){
            return response()->json(['message' => "Model not Found"], 404);
        }

        return response()->json(new PhoneModelCollection($phoneModels), 200);
    }
}
