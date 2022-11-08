@extends('layouts_console.app_console')

@section('title') {{ __('Plastic Products') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ __('Add New Plastic Product') }}</h2>
            </div>

            <div class="card-body">
                <form method="post" action="<?= route('plastic.add')?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <label for="plastic_product_name" class="form-label">{{ __('Plastic Product Name:') }}</label>
                        <input type="text" name="plastic_product_name" id="plastic_product_name" value="<?= old('plastic_product_name') ?>" required class="form-control">
                        <?php if($errors->first('plastic_product_name')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('plastic_product_name'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="category" class="form-label">{{ __('Category:') }}</label>
                        <input type="text" name="category" id="category" value="<?= old('category') ?>" required class="form-control">
                        <?php if($errors->first('category')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('category'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">{{ __('Description:') }}</label>
                        <textarea name="description" cols="40" rows="3" id="description" class="form-control"><?= old('description') ?></textarea>
                        <?php if($errors->first('description')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('description'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="product_stat" class="form-label">{{ __('Product Statistics:') }}</label>
                        <input type="text" name="product_stat" id="product_stat" value="<?= old('product_stat') ?>" required class="form-control">
                        <?php if($errors->first('product_stat')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('product_stat'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div id="preview1" style="display:none;">
                        <img id="preview_image1" height="200" class="border border-5" alt="{{ __('Plastic product icon preview') }}"/>
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="icon" class="form-label">{{ __('Select Plastic Product Icon:') }}</label>
                        <input type="file" name="icon" id="icon" value="<?= old('icon') ?>" required class="form-control" onchange="loadFile1(event)">
                        <?php if($errors->first('icon')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('icon'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div id="preview2" style="display:none;">
                        <img id="preview_image2" height="200" class="border border-5" alt="{{ __('Plastic product image preview') }}"/>
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="image" class="form-label">{{ __('Select Plastic Product Image:') }}</label>
                        <input type="file" name="image" id="image" value="<?= old('image') ?>" required class="form-control" onchange="loadFile2(event)">
                        <?php if($errors->first('image')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('image'); ?></span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-success mb-3">{{ __('Add New Plastic Product') }}</button>

                </form>
            </div>
        </div>

        <br>
        <a href="<?= route('plastic.list') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Plastic Products List') }}</a>

    </section>

@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('/js/2images_preview_CRUD.js') }}"></script>
@endsection