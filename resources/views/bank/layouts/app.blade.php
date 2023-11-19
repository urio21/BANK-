<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank Validation System</title>
  <!-- Include Bootstrap CSS and JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Include your custom CSS styles -->
  <style>
    /* Custom CSS to center the form and set max-width */

    .loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8); /* Adjust the background color and opacity as needed */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Adjust the z-index to make sure it's above other elements */
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
  </style>
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Bank Validation System
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customer_payment') }}">{{ __('Make Payment') }}</a>
            </li>
            <li class="nav-item mt-4">
              <a id="navbarDropdown" class="nav-link " href="{{ route('notifications')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="fa fa-bell"></i>
              </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="">
    @yield('content')
</div>
</body>
