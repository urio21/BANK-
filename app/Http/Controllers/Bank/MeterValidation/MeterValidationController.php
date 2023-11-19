<?php

namespace App\Http\Controllers\Bank\MeterValidation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Http;

class MeterValidationController extends Controller
{

    /**
     * Point That I must remember is that ,I have to implement model that will carry out data throughout the Token Purchase operation for the purpose And avoid using Form
     *
     * Display the specified resource.
     */
    public function index()
    {
        try {
            $utility_providers = Http::post('http://127.0.0.1:8000/api/utilityProviders')['providers'];
        } catch (\Exception $e) {
            Log::error("UP fetch Exception:" . $e->getMessage());
        }
        $message = null;

        return view('bank.customerinput', ['utility_providers' => $utility_providers, 'message' => $message]);
    }

    public function validateMeterInformation(Request $request)
    {
        // Set session variable to indicate form submission
        session(['submitting' => true]);
        $this->validate($request, [
            'meterNumber' => 'required',
            'amount' => 'required',
            'utilityProvider' => 'required'
        ]);

        $inputs = [
            'meterNumber' => $request->input('meterNumber'),
            'utilityProvider' => $request->input('utilityProvider'),
            'requestId' => 244,
            'partnerCode' => 'CRDB112',
            'requestTime' => Date::now()->format('Y-m-d H:i:s')
        ];

        Log::channel('daily')->info('Inputs' . json_encode($inputs));

       $errorMessage = null;

        try {
            $meterInfo = Http::post('http://127.0.0.1:8000/api/meter', $inputs)['data'];


                if (array_key_exists('errorMessage', $meterInfo)) {
                    $errorMessage = $meterInfo['errorMessage'];
                } else {
                    $meterData = $meterInfo;
                $meterData['amount'] = $request->input('amount');
                }


        } catch (\Exception $e) {
            Log::info("Meter Validate Exception:" . $e->getMessage());
            $errorMessage = 'Something went wrong on our end.';
        }

        $inputs['amount'] = $request->input('amount');
        session(['user_data' => $inputs]);

        if (isset($errorMessage)) {
            return view('bank.validation', compact('errorMessage'));
        }

        return view('bank.validation', ['meterData' => $meterData ]);
    }

    public function confirmGenerateToken()
    {
        $data = session('user_data');
        $inputs = [
            'meterNumber' => $data['meterNumber'],
            'amount' => $data['amount'],
            'utilityProvider' => $data['utilityProvider'],
            'requestId' => $data['requestId'],
            'partnerCode' => $data['partnerCode'],
            'requestTime' => Date::now()->format('Y-m-d H:i:s')
        ];

        Log::channel('daily')->info('Confirm Generate Token Inputs' . json_encode($inputs));

        $message = null;

        try {
            $message1 = Http::post('http://127.0.0.1:8000/api/token-generator', $inputs);
            if($message1){
                $message = $message1['message'];
            }
            else{
                $message = "api failed";
            }
        } catch (\Exception $e) {
            Log::info("Meter Validate Exception:" . $e->getMessage());
            $message = 'Failed Try Again later';
        }

        //Am going to modify this to increase the system performance.
        try {
            $utility_providers = Http::post('http://127.0.0.1:8000/api/utilityProviders')['providers'];
        } catch (\Exception $e) {
            Log::error("UP fetch Exception:" . $e->getMessage());
        }
        // Clear the session data if necessary
            session()->forget('user_data');

        return view('bank.customerinput', ['utility_providers' => $utility_providers, 'message' => $message]);
    }

    public function getNotifications(Request $request)
    {
        $notifications = [];
        $input = ['partnerCode' => 'CRDB112'];

        try {
            $notifications = Http::post('http://127.0.0.1:8000/api/notification', $input)['notifications'];
        } catch (\Exception $e) {
            Log::error("Meter Validate Exception:" . $e->getMessage());
        }

     //   $notifications = json_decode(json_encode($notificationsResponse), true);
        // if(array_key_exists('notifications', $notificationsResponse)){

        // }
        // $notifications = $notificationsResponse['notifications'] ?? [];
        return view('bank.notification', compact('notifications'));
    }

    public function getTokenByMeterNumberAndRequestId($meterNumber, $requestId)
    {
       // echo "$meterNumber"."$requestId";
        // $notificationsResponse = [];
        // $notifications = [];
        $inputs = [
            'meterNumber' => $meterNumber,
            'requestId' => $requestId
        ];

        try {
            $notificationsResponse = Http::post('http://127.0.0.1:8000/api/notification',$inputs);

            $notification = json_decode($notificationsResponse->body(), true);

            return view('bank.updatedNotification', compact('notification'));
        } catch (\Exception $e) {
            Log::error("Token Fetching exception: " . $e->getMessage());
        }


    }
}
