<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank Validation System</title>
  <!-- Include Bootstrap CSS and JavaScript -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include your custom CSS styles -->
  <style>
    /* Custom CSS to center the form and set max-width */
    .custom-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 80vh;
    }

    .custom-form {
      max-width: 500px; /* Adjust the maximum width as needed */
      width: 100%;
      padding: 10px;
    }

    /* Style for required fields */
    .required-field::after {
      content: " *";
      color: red;
    }

    /* Style for the "required" text */
    .required-text {
      color: red;
      display: none; /* Initially hide the "required" text */
    }
  </style>
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        Bank Validation System
      </div>
    </nav>
  </div>
  <div class="custom-container">
    <form action="{{ route('validation') }}" method="GET" class="custom-form">
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
      <div class="form-group">
        <label for="phoneNumber" class="required-field">Phone Number</label>
        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number" required pattern="0[67]\d{8}">
        <span class="required-text">required</span>
      </div>
      <div class="form-group">
        <label for="utilityProvider" class="required-field">Utility Provider</label>
        <select class="form-control" id="utilityProvider" name="utilityProvider" required>
          <option value="dawasco">Dawasco</option>
          <option value="tanesco">Tanesco</option>
          <option value="oryxgas">Oryx Gas</option>
        </select>
        <span class="required-text">required</span>
      </div>
      <button type="submit" class="btn btn-primary btn-block" id="sendButton">Send</button>
    </form>
  </div>

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
</body>
</html>
