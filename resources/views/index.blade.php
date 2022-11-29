@extends('layouts.app')

@section('title') {{'Home'}} @endsection <!-- Dynamic page tab title. -->

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-md-8 mt-4">
                <!-- SITE WELCOME TITLE -->
                <h1 class="d-flex justify-content-center"><b>{{ __('EcoLife Plastic Reduction') }}</b></h1>
                <br>
                <!-- SLOGAN -->
                <p class="d-flex justify-content-center h5">{{ __('The simple web app that helps reduce your plastic consumption') }}</p>
                <!-- PLASTIC REDUCTION CALCULATOR BUTTON LINK -->
                <div class="d-flex justify-content-center mt-5">
                    <a href="<?= route('quick_calculator.pg1') ?>" class="btn btn-success btn-lg" role="button"><i class="bi bi-play-fill"></i> {{ __('Start Plastic Waste Calculator') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
