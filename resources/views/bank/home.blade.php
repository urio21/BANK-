@extends('bank.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($message = Session::get('success'))
                    <div class=" alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    {{ __('Welcome') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
