@extends('layouts_console.app_console')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Console Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- {{ __('You are logged in!') }} -->

                        <ul id="dashboard">
                            <li><a href="/console/plastic-products/list">Plastic Products</a></li>
                            <li><a href="/console/questionnaire/list">Questionnaire</a></li>
                            <li><a href="/console/clients/list">User Accounts</a></li>
                            <li><a href="/console/admins/list">Admin Accounts</a></li> <!-- NOTE: Rename routing from 'users' to 'admin'. -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
