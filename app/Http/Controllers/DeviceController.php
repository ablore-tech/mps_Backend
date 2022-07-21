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
        $devices = Device::with(['deviceVariantPrices', 'phoneModel'])->get();

        return view('devices.index', compact(['devices']));
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
            'special_offers_2' => $request->get('special_offer_2')
        ]);

        foreach($request->get('question_prices') as $key => $price) 
        {
            $deviceQuestionPrice = DeviceQuestionPrice::create([
                'device_id' => $device->id,
                'question_id' => $key,
                'price' => $price
            ]);
        }
        
        foreach($request->get('phone_problem_prices') as $phoneProblemId => $phoneProblemOptionPrices)
        {
            foreach($phoneProblemOptionPrices as $optionId => $phoneProblemOptionPrice)
            {
                $devicePhoneProblemPrice = DevicePhoneProblemPrice::create([
                    'device_id' => $device->id,
                    'phone_problem_id' => $phoneProblemId,
                    'phone_problem_option_id' => $optionId,
                    'price' => $phoneProblemOptionPrice
                ]);       
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
    }

    public function editDevice(Device $device, DeviceVariantPrice $deviceVariantPrice)
    {
        return view('devices.edit', compact(['device', 'deviceVariantPrice']));
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

    public function updateDevice(Request $request, Device $device, DeviceVariantPrice $deviceVariantPrice)
    {
        $deviceVariantPrice->firstOrCreate([
            'status' => $request->get('status'),
            'price' => $request->get('device_price'),
            'special_offers' => $request->get('special_offer'),
            'special_offers_2' => $request->get('special_offer_2'),
        ]);


        foreach($request->get('device_question_prices') as $key => $deviceQuestionPrice)
        {
            $questionPrice = DeviceQuestionPrice::find($key);

            $questionPrice->update([
                'price' => $deviceQuestionPrice
            ]);
        }

        foreach($request->get('phone_problem_prices') as $key => $phoneProblemPrice)
        {
            $problemPrices = DevicePhoneProblemPrice::find($key);

            $problemPrices->update([
                'price' => $phoneProblemPrice
            ]);
        }

        return back();
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
