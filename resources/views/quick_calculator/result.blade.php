@extends('layouts.app')

@section('title') {{'Quick Calculator'}} @endsection <!-- Dynamic page tab title. -->

@section('styles') <link rel="stylesheet" href="{{ asset('/css/quick-questionnaire.css') }}"> @endsection <!-- Dynamic page styles. -->

@section('content')
    <section class="container">

        <h1 class="h4">{{ __('Results - Plastic Waste Calculator') }}</h1>
        <br>
        <?php foreach($quick_questions as $quick_question): ?>
            <?php if($quick_question->id == 2): ?>
                <h2 class="h3"><?= $quick_question->question ?></h2>
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="mt-5">
            <form method="post" action="<?= route('plastic_calculator_question.edit',[$plastic_calculator_question->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">
                <!-- Logic for listing relevant categories that matches question 1 selected choice. -->
                <?php foreach($quick_choices as $quick_choice): ?>
                    <?php if($quick_choice->plastic_calculator_question_id == 2 && $segmentURL == $quick_choice->choice_category): ?>
                        <h3><b><?= $quick_choice->choice ?></b></h2> <!-- Room category names for plastic products. Ex. Kitchen, Restroom, Office. -->
                        <?php foreach($plastic_products as $plastic): ?>
                            <?php if($plastic->category == $quick_choice->choice): ?> <!-- If the category names match, then output respective plastic products. -->
                                <ul>
                                    <li>
                                        <div class="mb-2">
                                            <?php if($plastic->image): ?>
                                                <img src="<?= asset('storage/'.$plastic->image) ?>" height="200">
                                            <?php endif; ?>
                                        </div>
                                        <h4><?= $plastic->plastic_product_name ?></h4>
                                        <?= $plastic->description ?><br>
                                        <h5 class="mt-4">Statistics:</h5>
                                        <?= $plastic->product_stat ?>
                                    </li><hr><br>
                                </ul>
                                <!-- Add JavaScript dropdown feature here to hide/display plastic product description. -->
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </form>
        </div>
		
        <br>

        <a href="<?= route('quick_calculator.pg1') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back') }}</a>
        <a href="/quick-calculator/results">Next</a>

        <!--DELETE COOKIES: Delete after debug complete.-->
	    <!-- <p><input type="button" id="btnDel" value="Delete your Stored Information" /></p> -->


    </section>
@endsection

@section('scripts') <script src="{{ asset('/js/quick-calculator.js') }}"></script> @endsection <!-- Page-specific scripts for Quick Calculator. -->