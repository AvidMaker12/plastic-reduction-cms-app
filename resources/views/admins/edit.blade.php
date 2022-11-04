@extends('layouts_console.app_console')

@section('title') {{'Admins'}} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Edit Admin</h2>
                <p class="card-text"><?= $user->username ?>, <?= $user->f_name ?> <?= $user->l_name ?></p>
            </div>

            <div class="card-body">
                <form method="post" action="<?= route('admin.edit',[$user->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4 mt-2">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" id="f_name" value="<?= old('username', $user->username) ?>" required class="form-control">
                        <?php if($errors->first('username')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('username'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" name="email" id="email" value="<?= old('email', $user->email) ?>" required class="form-control">
                        <?php if($errors->first('email')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('email'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="f_name" class="form-label">First Name:</label>
                        <input type="text" name="f_name" id="f_name" value="<?= old('f_name', $user->f_name) ?>" required class="form-control">
                        <?php if($errors->first('f_name')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('f_name'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="l_name" class="form-label">Last Name:</label>
                        <input type="text" name="l_name" id="l_name" value="<?= old('l_name', $user->l_name) ?>" required class="form-control">
                        <?php if($errors->first('l_name')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('l_name'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password:</label>
                        <input type="text" name="password" id="password" required class="form-control">
                        <?php if($errors->first('password')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('password'); ?></span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-success mb-3">Edit Admin</button>

                </form>
            </div>
        </div>

        <br>
        <a href="<?= route('admin.list') ?>" class="btn btn-primary" role="button">Back to Admin List &nbsp;&#10140;</a>

    </section>

@endsection