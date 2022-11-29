@extends('layouts_console.app_console')

@section('title') {{ __('Users') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ __('Edit User') }}</h2>
                <p class="card-text"><?= $user->username ?></p>
            </div>

            <div class="card-body">
                <form method="post" action="<?= route('user.edit',[$user->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4 mt-2">
                        <label for="username" class="form-label">{{ __('Username:') }}</label>
                        <input type="text" name="username" id="f_name" value="<?= old('username', $user->username) ?>" required class="form-control">
                        <?php if($errors->first('username')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('username'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">{{ __('Email:') }}</label>
                        <input type="text" name="email" id="email" value="<?= old('email', $user->email) ?>" required class="form-control">
                        <?php if($errors->first('email')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('email'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">{{ __('Password:') }}</label>
                        <input type="text" name="password" id="password" required class="form-control" aria-describedby="passwordHelp">
                        <?php if($errors->first('password')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('password'); ?></span>
                        <?php endif; ?>
                        <div id="passwordHelp" class="form-text">{{ __('Note: Password must be at least 8 characters long.') }}</div>
                    </div>

                    <button type="submit" class="btn btn-success mb-3">{{ __('Edit User') }}</button>

                </form>
            </div>
        </div>

        <br>
        <a href="<?= route('user.list') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to User List') }}</a>

    </section>

@endsection