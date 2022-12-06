@extends('layouts.app')

@section('title') {{'Questionnaire'}} @endsection <!-- Dynamic page tab title. -->

@section('styles') <link rel="stylesheet" href="{{ asset('/css/quick-questionnaire.css') }}"> @endsection <!-- Dynamic page styles. -->

@section('content')
    <section class="container">

        <h1 class="h4 d-flex justify-content-center">{{ __('Plastic Waste Questionnaire') }}</h1>
        <br>
        <p class="h3 mb-5 d-flex justify-content-center">Let's begin by selecting a category.</p>
        <?php if($quick_questions->id == 1): ?>
            <h2 class="h3"><?= $quick_questions->question ?></h2>
        <?php endif; ?>

        <div class="mt-4">
            <?php foreach($quick_choices as $quick_choice): ?>
                <?php if($quick_choice->plastic_calculator_question_id == 1): ?> <!-- Only show list of question1 choices: 'Home', 'Workplace', 'Travel'. -->
                    <div class="d-flex justify-content-center align-items-center">
                        <?php if($quick_choice->icon): ?>
                            <img src="<?= asset('storage/'.$quick_choice->icon) ?>" height="25" alt="{{ __('Plastic calculator multiple choice icon') }}">
                        <?php endif; ?>
                        <a href="<?= route('questionnaire.pg2',[$quick_choice->slug]) ?>" class="btn btn-success ms-3" role="button"><?= $quick_choice->choice ?></a>
                    </div>
                    <br><br>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
		

        <!-- <a href="/quick-calculator/page2">Next</a> -->

        <!--DELETE COOKIES: Delete after debug complete.-->
	    <!-- <p><input type="button" id="btnDel" value="Delete your Stored Information" /></p> -->


    </section>
@endsection
