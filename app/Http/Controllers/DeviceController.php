<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DevicePhoneProblemPrice;
use App\Models\DeviceQuestionPrice;
use App\Models\DeviceVariantPrice;
use App\Models\PhoneModel;
use App\Models\PhoneProblem;
use App\Models\Question;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DeviceController extends Controller
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
     * Show the form for creating a new resource.
     *
    * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = PhoneModel::all();

        $variants = Variant::all();

        $questions = Question::all();

        $phoneProblems = PhoneProblem::all();

        return view('devices.create', compact(['models', 'variants', 'questions', 'phoneProblems']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $phoneModel = PhoneModel::find($request->get('model_id'));
        
        $device = Device::create([
            'phone_model_id' => $phoneModel->id,
            'name' => $phoneModel->name,
        ]);

        $deviceVariantPrice = DeviceVariantPrice::create([
            'device_id' => $device->id,
            'variant_id' => $request->get('variant_id'),
            'price' => $request->get('device_price'),
            'special_offers' => $request->get('special_offer'),
            'camera' => $request->get('camera')
        ]);

        // foreach($request->get(''))
        $deviceQuestionPrice = DeviceQuestionPrice::create([
            
        ]);

        $devicePhoneProblemPrice = DevicePhoneProblemPrice::create([

        ]);

        dd($request->all());
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
}
