<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\OrderRequest\StoreBulkPhoneRequest;
use App\Http\Requests\Api\V1\OrderRequest\StoreDeadPhoneRequest;
use App\Http\Requests\Api\V1\OrderRequest\StoreOrderRequest;
use App\Http\Resources\Api\V1\Order\OrderCollection;
use App\Http\Resources\Api\V1\Order\OrderResource;
use App\Models\Order;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class OrderController extends Controller
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
     * Store a newly created order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = new Order();

        DB::beginTransaction();

        $order->user_id = $request->input('user_id');
        $order->device_id = $request->input('device_id');
        $order->variant_id = $request->input('variant_id');
        $order->phone_model_id = $request->input('phone_model_id');
        $order->price = $request->input('price');
        $order->status = config('settings.status.Pending');
        $order->imei = $request->input('imei_number');
        
        $order->save();

        foreach($request->responses["questions"] as $question)
        {
            $order->questionResponses()->create($question);
        }

        $order->phoneProblemResponses()->create([
            "phone_problem_id" => $request->responses["phone_problem_1"]["phone_problem_id"],
            "answers" => json_encode($request->responses["phone_problem_1"]["answers"])
        ]);

        $order->phoneProblemResponses()->create([
            "phone_problem_id" => $request->responses["phone_problem_2"]["phone_problem_id"],
            "answers" => json_encode($request->responses["phone_problem_2"]["answers"])
        ]);

        DB::commit();

        return response()->json(["success" => true, "message" => 'Order Saved Successfully'], 201);
    }

    /**
     * Store dead phone order
     * 
     */
    public function deadPhone(StoreDeadPhoneRequest $request)
    {
        if($request->file('image'))
        {
            $image = $request->file('image');
                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('name')) . '_' . time();
                // Define folder path
                $folder = '/uploads/images/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
        }

        $order = new Order();

        DB::beginTransaction();

        $order->user_id = $request->input('user_id');
        $order->device_id = $request->input('device_id');
        $order->variant_id = $request->input('variant_id');
        $order->phone_model_id = $request->input('phone_model_id');
        $order->image = $filePath;
        $order->description = 'Dead Phone';
        $order->imei = $request->input('imei_number');
        $order->status = config('settings.status.Pending');
        
        $order->save();

        DB::commit();

        return response()->json(["success" => true, "message" => 'Order Saved Successfully'], 201);
    }

    /**
     * Store bulk Phone data
     * 
     */
    public function bulkPhone(StoreBulkPhoneRequest $request)
    {
        if($request->file('image'))
        {
            $image = $request->file('image');
                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('name')) . '_' . time();
                // Define folder path
                $folder = '/uploads/images/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
        }

        $order = new Order();

        DB::beginTransaction();

        $order->user_id = $request->input('user_id');
        $order->image = $filePath;
        $order->description = "Bulk Phone";
        $order->status = config('settings.status.Pending');
        
        $order->save();

        DB::commit();

        return response()->json(["success" => true, "message" => 'Order Saved Successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return response()->json(["success" => true, "message" => new OrderResource($order)], 200);
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

    public function userOrders(Authenticatable $user)
    {
        $orders = Order::where('user_id', $user->id)->get();

        if($orders)
        {
            return response()->json(["success" => true, "message" => new OrderCollection($orders)], 200);
        }
        return response()->json(["success" => true, "message" => $orders], 200);
    }

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name . '.' . $uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}
