@extends('layouts.app')

@section('title') {{'Questionnaire'}} @endsection <!-- Dynamic page tab title. -->

@section('styles') <link rel="stylesheet" href="{{ asset('/css/quick-questionnaire.css') }}"> @endsection <!-- Dynamic page styles. -->

@section('content')
    <section class="container">

        <h1 class="h4">{{ __('Plastic Reduction Questionnaire') }}</h1>
        <br>
        <h2 class="h3">Results</h2>

        <div class="mt-5" id="output">
            <h2 id="scoreMsgBox">Score</h2>
        </div>
		
        <br>

        <div class="d-flex justify-content-between">
            <a href="<?= route('quick_calculator.pg2',$segmentURL) ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back') }}</a>
        </div>

        <!--DELETE COOKIES: Delete after debug complete.-->
	    <!-- <p><input type="button" id="btnDel" value="Delete your Stored Information" /></p> -->


    </section>
@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('/js/questionnaire-results.js') }}"></script>
@endsection <!-- Page-specific scripts for Quick Calculator. -->