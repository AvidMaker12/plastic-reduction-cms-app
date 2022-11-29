@extends('layouts_console.app_console')

@section('title') {{ __('Plastic Products') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ __('Edit Plastic Product Image') }}</h2>
            </div>

            <div class="card-body">
                <!-- Image Upload Preview: -->
                <div class="d-flex justify-content-start mb-4 align-items-end">
                    <?php if($plastic_product->image): ?>
                        <div>
                            <p class="card-text">{{ __('Current Plastic Product Image:') }}</p>
                            <img src="<?= asset('storage/'.$plastic_product->image) ?>" height="200" alt="{{ __('Current plastic product image') }}" class="border border-5">
                        </div>
                    <?php endif; ?>
                    <div id="preview" style="display:none;">
                        <img id="preview_image" height="200" class="border border-5" alt="{{ __('Plastic product image preview') }}"/>
                    </div>
                </div>

                <form method="post" action="<?= route('plastic.image',[$plastic_product->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4 mt-2">
                        <label for="image" class="form-label">{{ __('Select Plastic Product Image:') }}</label>
                        <input type="file" name="image" id="image" value="<?= old('image') ?>" required class="form-control" onchange="loadFile(event)">
                        <?php if($errors->first('image')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('image'); ?></span>
                        <?php endif; ?>
                        <p class="card-text mt-2">{{ __('Note: Maximum image size is 2048 kilobytes (2.048 megabytes).') }}</p>
                    </div>

                    <button type="submit" class="btn btn-success mb-3" aria-label="{{ __('Save plastic product image') }}">{{ __('Save') }}</button>
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