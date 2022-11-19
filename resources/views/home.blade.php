@extends('layouts.app')

@section('title') {{ __('Dashboard') }} @endsection <!-- Dynamic page tab title. -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title h4 mt-2">{{ __('Dashboard') }}</h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- {{ __('You are logged in!') }} -->

                        <ul class="list-group list-group-flush me-3">
                            <li class="list-group-item list-group-item-action ms-2">
                                <p class="card-text">Find out how much plastic you use in your daily life, and get suggestions on how to reduce it.</p>
                                <a href="<?= route('questionnaire.pg1') ?>" class="btn btn-success mb-3" role="button">{{ __('Plastic Reduction Questionnaire') }}</a>
                            </li>
                            <li class="list-group-item list-group-item-action ms-2">
                                <p class="card-text mt-2">Check out your current and past plastic reduction scores.</p>
                                <a href="#" class="btn btn-success" role="button" aria-label={{ __('User plastic reduction scores statistics page') }}">{{ __('Statistics') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
