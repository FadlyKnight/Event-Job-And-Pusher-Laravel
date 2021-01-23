<?php

namespace App\Http\Controllers;

use App\Events\TryEvent;
use App\Jobs\DeletePayments;
use Illuminate\Http\Request;
use App\Models\PaymentData;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 100;
        $data = \DB::table('payments_data')->paginate($limit);
        return response()->json(['status' => true, 'data' => $data, 'msg' => 'List Data Payment']);        
    }

    public function insert(Request $request)
    {
        if (! $request->expectsJson()) {
            return response()->json(['status' => false, 'msg' => 'Expects Json Request']);       
        }

        $rules = [
            'name' => 'string|required',
        ];
        
        $validator = Validator::make($request->only('name'), $rules);
        if($validator->fails()) 
        return response()->json([ 'status'=> false, 'msg' => $validator->messages()->first() ]);

        if ($data = PaymentData::create($request->only('name'))) {
            return response()->json(['status' => true, 'data' => $data, 'msg' => 'Data Payment Created']);
        }
    }

    public function delete(Request $request)
    {
        // $request->only(['array_id']);
        // \DB::table('payments_data')->whereIn()
        $data_id = $request->only(['data_id'])['data_id'];
        $count = 0;
        $total = count($data_id);
        if ($total < 1) {
            return response()->json([ 'status'=> false, 'msg' => 'Data Id Empty' ]);
        }
        foreach ($data_id as $id) {
            DeletePayments::dispatch($id);
            // ->delay(now()->addSeconds(1));
            $count++;
            TryEvent::dispatch($count);
            if ($count == $total) {
                TryEvent::dispatch("Selesai");
            }
        }
        return response()->json(['status' => true, 'msg' => 'Data Payment Deleted']);
        // return redirect()->back();
    }

}
