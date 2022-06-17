<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\OrderRequest\StoreOrderRequest;
use App\Http\Resources\Api\V1\Order\OrderCollection;
use App\Http\Resources\Api\V1\Order\OrderResource;
use App\Models\Order;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        
        $order->save();

        foreach($request->responses["questions"] as $question)
        {
            $order->questionResponses()->create($question);
        }

        foreach($request->responses["phone_problems"] as $phone_problem)
        {
            $order->phoneProblemResponses()->create([
                "phone_problem_id" => $phone_problem["phone_problem_id"],
                "answers" => json_encode($phone_problem["answers"])
            ]);
        }

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
}
