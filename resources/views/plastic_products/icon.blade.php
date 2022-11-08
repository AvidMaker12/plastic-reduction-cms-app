@extends('layouts_console.app_console')

@section('title') {{ __('Plastic Products') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ __('Edit Plastic Product Icon') }}</h2>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-start mb-4 align-items-end">
                    <?php if($plastic_product->icon): ?>
                        <div>
                            <p class="card-text">{{ __('Current Plastic Product Icon:') }}</p>
                            <img src="<?= asset('storage/'.$plastic_product->icon) ?>" height="200" alt="{{ __('Current plastic product icon') }}" class="border border-5">
                        </div>
                    <?php elseif(!asset('storage/site_images/NoImage1.jpg')): ?>
                        <h2><i class="bi bi-card-image"></i></h2>
                    <?php else: ?>
                        <div>
                            <p class="card-text">{{ __('Current Plastic Product Icon:') }}</p>
                            <img src="<?= asset('storage/site_images/NoImage1.jpg') ?>" height="200" alt="{{ __('Plastic product picture placeholder') }}">
                        </div>
                    <?php endif; ?>

                    <div id="preview" style="display:none;" class="ms-4">
                        <p class="card-text">{{ __('New Plastic Product Image Preview:') }}</p>
                        <img id="preview_image" height="200" class="border border-5" alt="{{ __('Plastic product icon preview') }}"/>
                    </div>
                </div>

                <form method="post" action="<?= route('plastic.icon',[$plastic_product->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4 mt-2">
                        <label for="icon" class="form-label">{{ __('Select Plastic Product Icon:') }}</label>
                        <input type="file" name="icon" id="image" value="<?= old('icon') ?>" required class="form-control" onchange="loadFile(event)">
                        <?php if($errors->first('icon')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('icon'); ?></span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-success mb-3" aria-label="{{ __('Save plastic product icon') }}">{{ __('Save') }}</button>

                </form>
            </div>
        </div>

        <br>
        <a href="<?= route('plastic.list') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Plastic Products List') }}</a>

    </section>

@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('/js/image_preview_CRUD.js') }}"></script>
@endsection