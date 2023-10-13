@extends('bank.layouts.app')

@section('content')
  <div class="justify-items-center">
    @if (isset($meterData))
      <form action="{{ route('generate_token') }}" method="post">
        @csrf
        <div class="card container mt-4 justify-items-center ">
          <!-- Display data from the "meter" table here -->
          <h2>Meter Data</h2>
          <p class="fw-bold fs-6">Customer Name: {{$meterData["customerName"]}}</p>
          <p>Phone Number: {{$meterData["customerPhone"]}}</p>
          <p>Meter Number: {{$meterData["meternumber"]}}</p>
          <p>utility Provider: {{$meterData["utility_provider"]}}</p>
          <p>Amount: {{$meterData["amount"]}}</p>
          <div class="form-group" hidden>
            <label for="meterNumber" class="required-field">Meter Number</label>
            <input type="text" class="form-control" id="meterNumber" name="meterNumber" value="{{$meterData["meternumber"]}}" placeholder="Enter meter number" required>
            <span class="required-text">required</span>
          </div>
          <div class="form-group" hidden>
            <label for="amount" class="required-field">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" value="{{$meterData["amount"]}}" placeholder="Enter amount" required pattern="^\d+(\.\d+)?$">
          </div>
          <div class="form-group" hidden>
            <label for="amount" class="required-field">Utility Provider</label>
            <input type="text" class="form-control" id="utilityProvider" name="utilityProvider" value="{{$meterData["utility_provider_id"]}}" placeholder="Enter Utility Provider">
          </div>
          <!-- Continue button -->
            <div class="row col-md-4 mb-4 align-items-center justify-items-center">
               
              <div class="col-sm">
                <button type="submit" class="btn btn-primary btn-block">Confirm</button>
              </div>
            </div>
          {{-- </div> --}}
        </div>
      </form>
    @else
    <div class="card container mt-4 justify-items-center align-items-center">
      <!-- Display data from the "meter" table here -->
      <h2>{{ $errorMessage }}</h2>
    </div>
    @endif
  </div>
@endsection
