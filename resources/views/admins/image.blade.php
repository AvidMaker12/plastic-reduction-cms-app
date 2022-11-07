@extends('layouts_console.app_console')

@section('title') {{'Admins'}} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Edit Admin Profile Picture</h2>
                <p class="card-text"><?= $user->f_name ?> <?= $user->l_name ?></p>
            </div>

            <div class="card-body">
                <?php if($user->profile_image): ?>
                    <div class="mb-4">
                        <p class="card-text">Current Profile Picture:</p>
                        <img src="<?= asset('storage/'.$user->profile_image) ?>" width="200" alt="User profile picture">
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= route('admin.image',[$user->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4 mt-2">
                        <label for="profile_image" class="form-label">New Profile Picture:</label>
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
        <a href="<?= route('admin.list') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> Back to Admin List</a>

    </section>

@endsection