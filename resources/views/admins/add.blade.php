@extends('layouts_console.app_console')

@section('title') {{ __('Admins') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ __('Add New Admin') }}</h2>
            </div>

            <div class="card-body">
                <form method="post" action="<?= route('admin.add')?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <label for="email" class="form-label">{{ __('Email:') }}</label>
                        <input type="text" name="email" id="email" value="<?= old('email') ?>" required class="form-control">
                        <?php if($errors->first('email')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('email'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">{{ __('Password:') }}</label>
                        <input type="text" name="password" id="password" required class="form-control">
                        <?php if($errors->first('password')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('password'); ?></span>
                        <?php endif; ?>
                        <p class="card-text">{{ __('Note: Password must be at least 8 characters long.') }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="f_name" class="form-label">{{ __('First Name:') }}</label>
                        <input type="text" name="f_name" id="f_name" value="<?= old('f_name') ?>" required class="form-control">
                        <?php if($errors->first('f_name')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('f_name'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="l_name" class="form-label">{{ __('Last Name:') }}</label>
                        <input type="text" name="l_name" id="l_name" value="<?= old('l_name') ?>" required class="form-control">
                        <?php if($errors->first('l_name')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('l_name'); ?></span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-success mb-3">{{ __('Add New Admin') }}</button>

                </form>
            </div>
        </div>

        <br>
        <a href="<?= route('admin.list') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Admin List') }}</a>

    </section>

@endsection