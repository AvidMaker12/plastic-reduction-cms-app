@extends('layouts_console.app_console')

@section('title') {{ __('Users') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ __('Edit User Profile Picture') }}</h2>
                <p class="card-text">{{ __('User') }}: <b><?= $user->username ?></b></p>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-start mb-4 align-items-end">
                    <?php if($user->profile_image): ?>
                        <div>
                            <p class="card-text">{{ __('Current Profile Picture:') }}</p>
                            <img src="<?= asset('storage/'.$user->profile_image) ?>" height="200" alt="{{ __('Current user profile picture') }}" class="border border-5">
                        </div>
                    <?php endif; ?>
                    <div id="preview" style="display:none;" class="ms-4">
                        <p class="card-text">{{ __('New Profile Picture Preview:') }}</p>
                        <img id="preview_image" height="200" class="border border-5" alt="{{ __('User profile picture preview') }}"/>
                    </div>
                </div>

                <form method="post" action="<?= route('user.image',[$user->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4 mt-2">
                        <label for="profile_image" class="form-label">{{ __('Select New Profile Picture:') }}</label>
                        <input type="file" name="profile_image" id="image" value="<?= old('profile_image') ?>" required class="form-control" onchange="loadFile(event)">
                        <?php if($errors->first('profile_image')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('profile_image'); ?></span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-success mb-3" aria-label="{{ __('Save profile picture') }}">{{ __('Save') }}</button>
                </form>

            </div>
        </div>

        <br>
        <a href="<?= route('user.list') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to User List') }}</a>

    </section>

@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('/js/image_preview_CRUD.js') }}"></script>
@endsection