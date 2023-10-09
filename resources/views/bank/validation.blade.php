<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meter Data</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                     Bank validation system

                    </div>
               </nav>
<form action="{{ route('notification') }}" method="get">
  <div class="container mt-4">
    <!-- Display data from the "meter" table here -->
    <h2>Meter Data</h2>
    <p>Meter Number: </p>
    <p>Amount:</p>
    <p>Phone Number:</p>
    <p>Utility Provider: </p>
    <p>available amount:</p>
    <!-- Continue button -->
    <button type="submit" class="btn btn-primary btn-block">Continue</button>
  </div>
</form>
</div>
</body>
</html>
