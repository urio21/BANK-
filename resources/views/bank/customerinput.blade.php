
@extends('bank.layouts.app')

@section('content')
@if ($message)
    @if ($message=="Failed Try Again later")
    <div class="container pt-4">
        <div class="d-flex flex-row-reverse">
            <div class="alert alert-danger alert-dismissible col-sm-3" >
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ $message }}!</strong>
              </div>
            </div>
    @else
    <div class="container pt-4">
        <div class="d-flex flex-row-reverse">
            <div class="alert alert-success alert-dismissible col-sm-3" >
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ $message }}!</strong>
              </div>
            </div>
    @endif
@endif
  <div class="custom-container">
    <form action="{{ route('meter_validation') }}" method="post" class="custom-form" id="submitForm">
      @csrf
      <div>
        Fill in the following details to buy a token.
      </div>
      <div class="form-group">
        <label for="meterNumber" class="required-field">Meter Number</label>
        <input type="text" class="form-control" id="meterNumber" name="meterNumber" placeholder="Enter meter number" required>
        <span class="required-text">required</span>
      </div>
      <div class="form-group">
        <label for="amount" class="required-field">Amount</label>
        <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter amount" required pattern="^\d+(\.\d+)?$">
        <span class="required-text">required</span>
      </div>
      {{-- <div class="form-group">
        <label for="phoneNumber" class="required-field">Phone Number</label>
        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number" required pattern="0[67]\d{8}">
        <span class="required-text">required</span>
      </div> --}}
      <div class="form-group">
        <label for="utilityProvider" class="required-field">Utility Provider</label>
        <select class="form-control" id="utilityProvider" name="utilityProvider" required>
          @foreach($utility_providers as $provider)
            <option value="{{ $provider['id'] }}">{{ ucfirst($provider['provider_name']) }}</option>
          @endforeach
        </select>
        <span class="required-text">required</span>
      </div>
      <button type="submit" class="btn btn-primary btn-block" id="sendButton">Send</button>
    </form>
  </div>
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

  <!-- JavaScript to show "required" text on Send button click -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const sendButton = document.getElementById("sendButton");
      const requiredTexts = document.querySelectorAll(".required-text");

      sendButton.addEventListener("click", function () {
        requiredTexts.forEach(function (text) {
          text.style.display = "inline"; // Display "required" text
        });
      });
    });
  </script>

  <!-- JavaScript to show "required" text only for empty input fields -->
  <script>
      document.addEventListener("DOMContentLoaded", function () {
        const sendButton = document.getElementById("sendButton");
        const requiredTexts = document.querySelectorAll(".required-text");

        // sendButton.addEventListener("click", function () {
        //   // Loop through each required input field and check if it's empty
        //   requiredTexts.forEach(function (text) {
        //     const inputField = text.previousElementSibling; // Get the input field before the "required" text
        //     if (inputField.value.trim() === "") {
        //       text.style.display = "inline"; // Display "required" text for empty fields
        //     } else {
        //       text.style.display = "none"; // Hide "required" text for filled fields
        //     }
        //   });
        // });

        // Listen for input events on the input fields to hide "required" text when the user starts typing
        const inputFields = document.querySelectorAll(".form-control");
        inputFields.forEach(function (inputField) {
          inputField.addEventListener("input", function () {
            const requiredText = inputField.nextElementSibling; // Get the "required" text after the input field
            requiredText.style.display = "none"; // Hide "required" text when the user starts typing
          });
        });
      });
    </script>
@endsection
