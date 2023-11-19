@extends('bank.layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if ($message = Session::get('success'))

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
