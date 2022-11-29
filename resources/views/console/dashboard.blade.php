@extends('layouts_console.app_console')

@section('title') {{ __('Console') }} @endsection <!-- Dynamic page tab title. -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title h4 mt-2">{{ __('Console Dashboard') }}</h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- {{ __('You are logged in!') }} -->

                        <p class="card-text">{{ __('Selection of website data categories available for editing') }}:</p>

                        <ul class="list-group list-group-flush me-3">
                            <li class="list-group-item list-group-item-action ms-2">
                                <a href="<?= route('plastic.list') ?>" class="btn mt-2" role="button">{{ __('Plastic Products') }}</a>
                            </li>
                            <li class="list-group-item list-group-item-action">
                                <div class="accordion accordion-flush" id="accordionPanelPlasticCalculator">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelHeadingOnePlasticCalculator">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelCollapseOnePlasticCalculator" aria-expanded="false" aria-controls="panelCollapseOnePlasticCalculator">
                                                {{ __('Plastic Calculator') }}
                                            </button>
                                        </h2>
                                        <div id="panelCollapseOnePlasticCalculator" class="accordion-collapse collapse" aria-labelledby="panelHeadingOnePlasticCalculator">
                                            <div class="accordion-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-group-item-action ms-2">
                                                        <a href="<?= route('plastic_calculator_question.list') ?>" class="btn" role="button">{{ __('Plastic Calculator Questions') }}</a>
                                                    </li>
                                                    <li class="list-group-item list-group-item-action ms-2">
                                                        <a href="<?= route('plastic_calculator_multiple_choice.list') ?>" class="btn" role="button">{{ __('Plastic Calculator Multiple Choice') }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action ms-2">
                                <a href="<?= route('user.list') ?>" class="btn" role="button">{{ __('User Accounts') }}</a>
                            </li>
                            <li class="list-group-item list-group-item-action ms-2">
                                <a href="<?= route('admin.list') ?>" class="btn" role="button">{{ __('Admin Accounts') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
