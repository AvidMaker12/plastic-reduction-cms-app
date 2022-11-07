@extends('layouts_console.app_console')

@section('title') {{'Users'}} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Add New User</h2>
            </div>

            <div class="card-body">
                <form method="post" action="<?= route('user.add')?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" id="username" value="<?= old('username') ?>" required class="form-control">
                        <?php if($errors->first('username')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('username'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" name="email" id="email" value="<?= old('email') ?>" required class="form-control">
                        <?php if($errors->first('email')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('email'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password:</label>
                        <input type="text" name="password" id="password" required class="form-control">
                        <?php if($errors->first('password')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('password'); ?></span>
                        <?php endif; ?>
                        <p class="card-text">Note: Password must be at least 8 characters long.</p>
                    </div>

                    <button type="submit" class="btn btn-success mb-3">Add New User</button>

                </form>
            </div>
        </div>

        <br>
        <a href="<?= route('user.list') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> Back to User List</a>

    </section>

@endsection