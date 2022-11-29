@extends('layouts_console.app_console')

@section('title') {{ __('Plastic Calculator Questions') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ __('Edit Plastic Calculator Question Icon') }}</h2>
            </div>

            <div class="card-body">
                <!-- Icon Upload Preview: -->
                <div class="d-flex justify-content-start mb-4 align-items-end">
                    <?php if($plastic_calculator_question->icon): ?>
                        <div>
                            <p class="card-text">{{ __('Current Icon:') }}</p>
                            <img src="<?= asset('storage/'.$plastic_calculator_question->icon) ?>" height="200" alt="{{ __('Current plastic calculator question icon') }}" class="border border-5">
                        </div>
                    <?php elseif(!asset('storage/site_images/NoImage1.jpg')): ?>
                        <h2><i class="bi bi-card-image"></i></h2>
                    <?php else: ?>
                        <div>
                            <p class="card-text">{{ __('Current Icon:') }}</p>
                            <img src="<?= asset('storage/site_images/NoImage1.jpg') ?>" height="200" alt="{{ __('Plastic calculator question icon placeholder') }}">
                        </div>
                    <?php endif; ?>

                    <div id="preview" style="display:none;" class="ms-4">
                        <p class="card-text">{{ __('New Icon Preview:') }}</p>
                        <img id="preview_image" height="200" class="border border-5" alt="{{ __('Plastic calculator question icon preview') }}"/>
                    </div>
                </div>

                <form method="post" action="<?= route('plastic_calculator_question.icon',[$plastic_calculator_question->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4 mt-2">
                        <label for="icon" class="form-label">{{ __('Select Plastic Calculator Question Icon:') }}</label>
                        <input type="file" name="icon" id="image" value="<?= old('icon') ?>" required class="form-control" onchange="loadFile(event)">
                        <?php if($errors->first('icon')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('icon'); ?></span>
                        <?php endif; ?>
                        <p class="card-text mt-2">{{ __('Note: Maximum image size is 2048 kilobytes (2.048 megabytes).') }}</p>
                    </div>

                    <button type="submit" class="btn btn-success mb-3" aria-label="{{ __('Save plastic calculator question icon') }}">{{ __('Save') }}</button>

                </form>
            </div>
        </div>

        <br>
        <a href="<?= route('plastic_calculator_question.list') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Plastic Calculator Questions List') }}</a>

    </section>

@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('/js/image_preview_CRUD.js') }}"></script>
@endsection