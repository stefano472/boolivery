<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Dish;
use App\Http\Requests\Orders\OrderRequest;

class OrderController extends Controller
{
    //
    public function generate(Request $request, Gateway $gateway){

        $token = $gateway->clientToken()->generate();

        $data = [
            
            'success' => true,

            'token' => $token
        
        ];

        return response()->json($data, 200);
	}

	public function makePayment(OrderRequest $request, Gateway $gateway){

        // $dish = Dish::find($request->dish);
        // return 'make payment';
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

            if($result->success){

                $data = [
                
                    'success' => true,
            
                    'message' => ' Transazione eseguita'
                
                ];
                
                return response()->json($data, 200);
            
            }else{
            
                $data = [
                
                    'success' => false,
            
                    'message' => 'Transazione fallita'
                
                ];
                
                return response()->json($data, 401);
            
            }

	}
}