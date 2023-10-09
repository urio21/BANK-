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
    public function index(Request $request)
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

    public function validateMeterInformation(Request $request) {
        $this->validate($request, [
            'meterNumber' => 'required',
            'phoneNumber' => 'required',
            'amount' => 'required',
            'utility_provider' => 'required'
        ]);

        $inputs = [
            'meterNumber' => $request->input('meterNumber'),
            'phoneNumber' => $request->input('phoneNumber'),
            'amount' => $request->input('amount'),
            'utility_provider' => $request->input('utility_provider')
        ];

        Log::info("Inputs::" . "JJk\jjdfsjdjksdjaksdjksdjka");

        $successStatus = 'Failed to assign debts.';

        // try {
        //     $debtResponse = Http::post('http://127.0.0.1:8000/api/assigndebt', $inputs);
        //     //['message'];
        //     $debtsArray = json_decode($debtResponse, true);

        //     if (array_key_exists('message', $debtsArray)){
        //         $successStatus = $debtResponse['message'][0];
        //     } else {
        //         $successStatus = 'Successfully assigned debt.';
        //     }
        // } catch (\Exception $e) {
        //     Log::info("Debt Assign Exception:" . $e->getMessage());
        // }

        return redirect()->route('/')->with('success', $successStatus);
    }
}
