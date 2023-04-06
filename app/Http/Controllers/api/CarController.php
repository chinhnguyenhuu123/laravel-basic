<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\api\Car;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $card = Car::all();
        $card=CarResource::collection($card);

       $arr=
        // 'message'=>'get success!',
        // CarResource::collection($card)
        $card
       ;
       return response()->json($arr,200);
    }
    public function create(Request $request)
    {
       
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name_car'=>'required',
            'vehicles'=>'required',
            'seat'=>'required',
            'distance'=>'required',
            'content'=>'required',
            'price'=>'required',
            'image'=>'required',
            'image_detail'=>'required',
            'maximum'=>'required',
            'maximum_torque'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(
                [
                    'message'=>$validator->errors()
                ],  
                404
            );
        }
        $card=Car::create([
            'name_car'=>$request->name_car,
            'vehicles'=>$request->vehicles,
            'seat'=>$request->seat,
            'distance'=>$request->distance,
            'content'=>$request->content,
            'price'=>$request->price,
            'image'=>$request->image,
            'image_detail'=>$request->image_detail,
            'maximum'=>$request->maximum,
            'maximum_torque'=>$request->maximum_torque,
            // 'detailed_image'=>$request->detailed_image,
        ]);
        return response()->json(
            [
                'message'=>'Created Success!',
                'data'=>new CarResource($card)  
            ],
            200
        );
    }
    public function show(string $id)
    {
        $car = Car::find($id);
        $car = new CarResource($car);
        $car = $car->showdetailcar();
        $arr=[
            'message'=>'get success!',
            'data'=>$car
        ];
        return response()->json($arr,200);
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            // 'name_car'=>'required',
            // 'vehicles'=>'required',
            // 'seat'=>'required',
            // 'distance'=>'required',
            // 'content'=>'required',
            // 'price'=>'required',
            // 'image'=>'required',
            'image_detail'=>'required',
            // 'maximum'=>'required',
            // 'maximum_torque'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(
                [
                    'message'=>$validator->errors()
                ],
                404
            );
        }
        echo $id;
        Car::find($id)->update(
            [
            // 'name_car'=>$request->name_car,
            // 'vehicles'=>$request->vehicles,
            // 'seat'=>$request->seat,
            // 'distance'=>$request->distance,
            // 'content'=>$request->content,
            // 'price'=>$request->price,
            // 'image'=>$request->image,
            'image_detail'=>$request->image_detail,
            // 'maximum'=>$request->maximum,
            // 'maximum_torque'=>$request->maximum_torque,
            ]
    );
        // $card->type=$request->input('type');
        // $card->vehicles=$request->input('vehicles');
        // $card->seat=$request->input('seat');
        // $card->distance=$request->input('distance');
        // $card->content=$request->input('content');
        // $card->price=$request->input('price');
        // $card->image=$request->input('image');
        // $card->save();
        return response()->json(
            [
                'message'=>'update Success!'
            ],
            200
        );
    }
    public function destroy(string $id)
    {
        $card = Car::find($id);
        $card->delete();
        return response()->json(
            [
                'message'=>'delete Success!',
                'data'=>new CarResource($card) 
            ],
            200
        );
    }
}
