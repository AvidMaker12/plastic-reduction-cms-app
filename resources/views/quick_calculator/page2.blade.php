@extends('layouts.app')

@section('title') {{'Quick Calculator'}} @endsection <!-- Dynamic page tab title. -->

@section('styles') <link rel="stylesheet" href="{{ asset('/css/quick-questionnaire.css') }}"> @endsection <!-- Dynamic page styles. -->

@section('content')
    <section class="container">

        <h1 class="h4 d-flex justify-content-center">{{ __('Plastic Waste Calculator') }}</h1>
        <br>
        
        <?php foreach($quick_questions as $quick_question): ?>
            <?php if($quick_question->id == 2): ?>
                <h2 class="h3 d-flex justify-content-center"><?= $quick_question->question ?></h2>
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="mt-5">
            <form method="get" action="<?= route('quick_calculator.result',$segmentURL)?>" name="quickCalculatorForm" novalidate class="form-horizontal" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <!-- Logic for listing relevant categories that matches question 1 selected choice. -->
                <?php foreach($quick_choices as $quick_choice): ?>
                    <?php if($quick_choice->plastic_calculator_question_id == 2 && $segmentURL == $quick_choice->choice_category): ?>
                        <hr>
                        <div class="d-flex align-items-center mt-5 mb-5 justify-content-center">
                            <?php if($quick_choice->icon): ?>
                                <img src="<?= asset('storage/'.$quick_choice->icon) ?>" height="35" alt="{{ __('Plastic calculator multiple choice icon') }}">
                            <?php endif; ?>
                            <h3 class="h1 m-0 ms-3"><b><?= $quick_choice->choice ?></b></h2> <!-- Room category names for plastic products. Ex. Kitchen, Restroom, Office. -->
                        </div>
                        
                        <div class="row row-cols-3 row-cols-md-4 g-4 mb-5 d-flex justify-content-center"> <!-- This wraps around all cards to control their page layout. -->
                        <?php foreach($plastic_products as $plastic): ?>
                            <?php if($plastic->category == $quick_choice->choice): ?> <!-- If the category names match, then output respective plastic products. -->
                                
                                <!-- Plastic Product Cards -->
                                <div class="col">
                                    <div class="card form-check p-0">
                                        <div class="d-flex justify-content-center m-4">
                                            <?php if($plastic->image): ?>
                                                <img src="<?= asset('storage/'.$plastic->image) ?>" height="200" class="image-responsive">
                                            <?php elseif(!asset('storage/site_images/NoImage1.jpg')): ?>
                                                <h2><i class="bi bi-card-image"></i></h2>
                                            <?php else: ?>
                                                <img src="<?= asset('storage/site_images/NoImage1.jpg') ?>" height="50" class="card-img-top" alt="{{ __('Plastic product image placeholder') }}">
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-body">
                                            <input class="btn-check" type="checkbox" value="<?= old($plastic->plastic_product_name) ?>" id="btn-check<?= $plastic->id ?>" autocomplete="off" role="button">
                                            <label class="btn btn-outline-primary btn-lg" for="btn-check<?= $plastic->id ?>"><b><?= $plastic->plastic_product_name ?></b></label>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <h5>Description:</h5>
                                                <p class="card-text mt-2"><?= $plastic->description ?></p>
                                            </li>
                                            <li class="list-group-item">
                                                <h5>Statistics:</h5>
                                                <p class="card-text mt-2"><?= $plastic->product_stat ?></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            <?php endif; ?>
                        <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="d-flex justify-content-between">
                    <a href="<?= route('quick_calculator.pg1') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back') }}</a>
                    <button type="submit" class="btn btn-success" aria-label="{{ __('Submit plastic calculator form to check results') }}">{{ __('Next') }}</button>
                </div>
            </form>
        </div>
		
        <br>

        <!--DELETE COOKIES: Delete after debug complete.-->
	    <!-- <p><input type="button" id="btnDel" value="Delete your Stored Information" /></p> -->


    </section>
@endsection

@section('scripts') <script src="{{ asset('/js/quick-calculator.js') }}"></script> @endsection <!-- Page-specific scripts for Quick Calculator. -->