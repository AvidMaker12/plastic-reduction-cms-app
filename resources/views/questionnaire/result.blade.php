@extends('layouts.app')

@section('title') {{'Questionnaire'}} @endsection <!-- Dynamic page tab title. -->

@section('styles') <link rel="stylesheet" href="{{ asset('/css/quick-questionnaire.css') }}"> @endsection <!-- Dynamic page styles. -->

@section('content')
    <section class="container">

        <h1 class="h4 d-flex justify-content-center">{{ __('Plastic Reduction Questionnaire - Results') }}</h1>

        <div class="card text-center border-success mt-5" id="output">
            <div class="card-header text-white bg-success">
                <h2 class="card-title mt-2" id="scoreMsgBox">Score</h2>
            </div>
            <div class="card-body text-success">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <p class="card-text h4 mt-2" id="scoreSummaryMsgBox"></p>
                    </li>
                    <li class="list-group-item h4 mt-2">
                        <p class="card-text">{{ __('Category: ') }} <?= $segmentURL ?></p>
                    </li>
                </ul>
            </div>
        </div>
		
        <br>

        <div class="d-flex justify-content-between">
            <a href="<?= route('questionnaire.pg2',$segmentURL) ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back') }}</a>
            <a href="<?= route('user.home') ?>" class="btn btn-outline-dark" role="button">{{ __('Return to Dashboard') }} <i class="bi bi-chevron-right"></i></a>
        </div>

        <!--DELETE COOKIES: Delete after debug complete.-->
	    <!-- <p><input type="button" id="btnDel" value="Delete your Stored Information" /></p> -->

    </section>
@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('/js/questionnaire-results.js') }}"></script>
@endsection <!-- Page-specific scripts for Quick Calculator. -->