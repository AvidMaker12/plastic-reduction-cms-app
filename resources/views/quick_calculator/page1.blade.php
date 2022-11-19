@extends('layouts.app')

@section('title') {{'Quick Calculator'}} @endsection <!-- Dynamic page tab title. -->

@section('styles') <link rel="stylesheet" href="{{ asset('/css/quick-questionnaire.css') }}"> @endsection <!-- Dynamic page styles. -->

@section('content')
    <section class="container">

        <h1 class="h4">{{ __('Plastic Waste Calculator') }}</h1>
        <br>
        <?php if($quick_questions->id == 1): ?>
            <h2 class="h3"><?= $quick_questions->question ?></h2>
        <?php endif; ?>

        <div>
            <?php foreach($quick_choices as $quick_choice): ?>
                <?php if($quick_choice->plastic_calculator_question_id == 1): ?> <!-- Only show list of question1 choices: 'Home', 'Workplace', 'Travel'. -->
                    <a href="<?= route('quick_calculator.pg2',[$quick_choice->slug]) ?>" class="btn btn-success mb-1" role="button"><?= $quick_choice->choice ?></a>
                    <br><br>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
		

        <!-- <a href="/quick-calculator/page2">Next</a> -->

        <!--DELETE COOKIES: Delete after debug complete.-->
	    <!-- <p><input type="button" id="btnDel" value="Delete your Stored Information" /></p> -->


    </section>
@endsection
