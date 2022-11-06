@extends('layouts_console.app_console')

@section('title') {{'Users'}} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Edit User Profile Picture</h2>
                <p class="card-text"><?= $user->username ?></p>
            </div>

            <div class="card-body">
                <form method="post" action="<?= route('user.image',[$user->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4 mt-2">
                        <label for="profile_image" class="form-label">Profile Picture:</label>
                        <input type="file" name="profile_image" id="profile_image" value="<?= old('profile_image') ?>" required class="form-control">
                        <?php if($errors->first('profile_image')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('profile_image'); ?></span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-success mb-3">Edit Profile Picture</button>

                </form>
            </div>
        </div>

        <br>
        <a href="<?= route('user.list') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> Back to User List</a>

    </section>

@endsection