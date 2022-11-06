@extends('layouts_console.app_console')

@section('title') {{'Console'}} @endsection <!-- Dynamic page tab title. -->

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

                        <p class="card-text">Selection of website data categories available for editing:</p>

                        <ul id="dashboard">
                            <li><a href="/console/plastic-products/list" class="btn btn-outline-dark mb-2 mt-2" role="button">Plastic Products</a></li>
                            <li><a href="/console/questionnaire/list" class="btn btn-outline-dark mb-2" role="button">Questionnaire</a></li>
                            <li><a href="<?= route('user.list') ?>" class="btn btn-outline-dark mb-2" role="button">User Accounts</a></li>
                            <li><a href="<?= route('admin.list') ?>" class="btn btn-outline-dark" role="button">Admin Accounts</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
