
@extends('bank.layouts.app')

@section('content')
  <div class="justify-items-center">
    <div class="container mt-4">
        <h2 class="mb-4">Notifications</h2>

        <!-- Display the notification content here -->
        @foreach ($notifications as $key => $notification)
            @if ($key == 0)
                <div class="alert alert-success">
                    <strong>{{$notification['created_at']}}</strong><br>
                    <i class="fas fa-check-circle mr-2"></i> <!-- Checkmark icon -->
                    <label>Success!</label> Token {{$notification['token']}} generated for meter number: {{$notification['meternumber']}}<span class="font-weight-bold"> </span>.
                </div>
            @else
                <div class="alert alert-secondary">
                    <strong>{{$notification['created_at']}}</strong><br>
                    <i class="fas fa-check-circle mr-2"></i> <!-- Checkmark icon -->
                    <label>Success!</label> Token {{$notification['token']}} generated for meter number: {{$notification['meternumber']}}<span class="font-weight-bold"> </span>.
                </div>
            @endif
        @endforeach
        <!-- You can display more notifications or customize the output as needed -->
    </div>
  </div>
@endsection

