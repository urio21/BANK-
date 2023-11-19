@extends('bank.layouts.app')

@section('content')
  <div class="justify-items-center">
    @if (isset($meterData))
      <form action="{{ route('generate_token') }}" method="post" id="submitForm">
        @csrf
        <div class="card container mt-4 justify-items-center ">
          <!-- Display data from the "meter" table here -->
          <h2>Meter Data</h2>
          <p class="fw-bold fs-6">Customer Name: {{$meterData["customerName"]}}</p>
          <p>Phone Number: {{$meterData["customerPhone"]}}</p>
          <p>Meter Number: {{$meterData["meterNumber"]}}</p>
          <p>utility Provider: {{$meterData["utilityProvider"]}}</p>
          <p>Amount: {{$meterData["amount"]}}</p>

          <!-- Continue button -->
            <div class="row col-md-4 mb-4 align-items-center justify-items-center">
              <div class="col-sm">
                <button type="submit" class="btn btn-primary btn-block" id="sendButton">Confirm</button>
              </div>
            </div>
        </div>
      </form>
    @else
    <div class="card container mt-4 justify-items-center align-items-center">
      <!-- Display data from the "meter" table here -->
      <h2>{{ $errorMessage }}</h2>
    </div>
    @endif
  </div>

  <div class="loading-overlay" style="display: none" id="spinner">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
  </div>

<!-- JavaScript that Allow spinning during Request Processing -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const submitForm = document.getElementById("submitForm");
      const sendButton = document.getElementById("sendButton");
      const spinner = document.getElementById("spinner");

      submitForm.addEventListener("submit", function () {
        // Show spinner when form is submitted
        spinner.style.display = "flex";

        // You can also disable the submit button to prevent multiple submissions
        sendButton.setAttribute("disabled", "disabled");
      });
    });
  </script>
@endsection
