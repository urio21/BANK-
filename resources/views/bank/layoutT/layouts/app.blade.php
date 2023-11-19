<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank Validation System</title>
  <!-- Include Bootstrap CSS and JavaScript -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Include your custom CSS styles -->
  <style>
    /* Custom CSS to center the form and set max-width */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

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

    /* Navbar style */
    .navbar {
      background-color: #f8f9fa; /* Adjust the background color as needed */
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a box shadow for a subtle effect */
    }

    /* Navbar brand style */
    .navbar-brand {
      font-size: 1.5rem;
      font-weight: bold;
    }

    /* Navbar link style */
    .navbar-nav .nav-link {
      color: #333; /* Adjust the link color as needed */
      margin-right: 15px;
    }

    /* Alert style */
    .custom-alert {
      background-color: #ffe3e3; /* Adjust the background color as needed */
      border: 1px solid #ff7373; /* Adjust the border color as needed */
      color: #d60000; /* Adjust the text color as needed */
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    .custom-alert strong {
      font-weight: bold;
    }

    .custom-alert svg {
      fill: #d60000; /* Adjust the icon color as needed */
    }

    .custom-alert-close {
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Bank Validation System</a>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Holy smokes!</strong>
          <span class="block sm:inline">Something seriously bad happened.</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button"
              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <title>Close</title>
              <path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
          </span>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('customer_payment') }}">{{ __('Make Payment') }}</a>
            </li>
            <li class="nav-item mt-4">
              <a id="navbarDropdown" class="nav-link " href="{{ route('notifications')}}" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-bell"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="custom-container">
    <div class="custom-form">
      @yield('content')
    </div>
  </div>
  <!-- Include Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-J2X3xFZ81b9OmYF4FlYYpf9bYFoHRb6dsmN+BSQUMmkOp4rftLWpZU3H3ALC5dZ5"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyDYBfSe+vwE8Z6v1iCCmAYHTX2fXp6pr"
    crossorigin="anonymous"></script>
</body>

</html>
