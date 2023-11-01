<?php

namespace App\Http\Controllers\Bank\MeterValidation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class MeterValidationController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function index()
    {
        $successStatus = 'Failed to fetch available provider!';

        $providers = [];

        try {
            $utility_providers = Http::post('http://127.0.0.1:8000/api/utilityProviders')['providers'];
        } catch (\Exception $e) {
            Log::error("UP fetch Exception:" . $e->getMessage());
        }

        return view('bank.customerinput', compact('utility_providers'));
    }

    public function validateMeterInformation(Request $request)
    {
        $this->validate($request, [
            'meterNumber' => 'required',
            'amount' => 'required',
            'utilityProvider' => 'required'
        ]);

        $inputs = [
            'meter_num' => $request->input('meterNumber'),
            'amount' => $request->input('amount'),
            'utilityProvider' => $request->input('utilityProvider')
        ];

        Log::channel('daily')->info('Inputs' . json_encode($inputs));

        $errorMessage = null;

        $meterData = null;

        try {
            $meterInfo = Http::post('http://127.0.0.1:8000/api/meter', $inputs);

            $meterInfoArray = json_decode($meterInfo, true);

            if (array_key_exists('message', $meterInfoArray)) {
                $errorMessage = $meterInfo['message'];
            } else {
                $meterData = $meterInfo['Meter Information'];
            }
        } catch (\Exception $e) {
            Log::info("Meter Validate Exception:" . $e->getMessage());
            $errorMessage = 'Something went wrong on our end.';
        }

        if (isset($errorMessage)) {
            return view('bank.validation', compact('errorMessage'));
        }
        return view('bank.validation', compact('meterData'));
    }

    public function confirmGenerateToken(Request $request)
    {

        $inputs = [
            'meterNumber' => $request->input('meterNumber'),
            'amount' => $request->input('amount'),
            'utilityProvider' => $request->input('utilityProvider')
        ];

        Log::channel('daily')->info('Confirm Genearte Token Inputs' . json_encode($inputs));

        $message = null;

        try {
            $message = Http::post('http://127.0.0.1:8000/api/token-generator', $inputs)['message'];
        } catch (\Exception $e) {
            Log::info("Meter Validate Exception:" . $e->getMessage());
            $message = 'Something went wrong on our end.';
        }

        return redirect()->to('meter/'.$request->input('meterNumber').'/request/9908009595');
        // return redirect()->to('tokens', [$request->input('meterNumber')]);
    }

    public function getNotifications(Request $request)
    {
        $notificationsResponse = [];
        $notifications = [];
        try {
            $notificationsResponse = Http::post('http://127.0.0.1:8000/api/token-receiver')['notifications'];
        } catch (\Exception $e) {
            Log::error("Meter Validate Exception:" . $e->getMessage());
        }

        $notifications = json_decode(json_encode($notificationsResponse), true);
        // if(array_key_exists('notifications', $notificationsResponse)){

        // }
        // $notifications = $notificationsResponse['notifications'] ?? [];
        return view('bank.notification', compact('notifications'));
    }

    public function getTokenByMeterNumberAndRequestId(Request $request, $meterNumber, $requestId)
    {
        echo "$meterNumber"."$requestId";
        // $notificationsResponse = [];
        // $notifications = [];
        // try {
        //     $notificationsResponse = Http::post('http://127.0.0.1:8000/api/token-receiver')['notifications'];
        // } catch (\Exception $e) {
        //     Log::error("Meter Validate Exception:" . $e->getMessage());
        // }

        // $notifications = json_decode(json_encode($notificationsResponse), true);
        // // if(array_key_exists('notifications', $notificationsResponse)){

        // // }
        // // $notifications = $notificationsResponse['notifications'] ?? [];
        // return view('bank.notification', compact('notifications'));
    }
}
