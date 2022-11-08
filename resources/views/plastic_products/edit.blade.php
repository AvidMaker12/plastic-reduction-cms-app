@extends('layouts_console.app_console')

@section('title') {{ __('Plastic Products') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ __('Edit Plastic Product') }}</h2>
                <p class="card-text"><?= $plastic_product->plastic_product_name ?></p>
            </div>

            <div class="card-body">
                <form method="post" action="<?= route('plastic.edit',[$plastic_product->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <label for="plastic_product_name" class="form-label">{{ __('Plastic Product Name:') }}</label>
                        <input type="text" name="plastic_product_name" id="plastic_product_name" value="<?= old('plastic_product_name', $plastic_product->plastic_product_name) ?>" required class="form-control">
                        <?php if($errors->first('plastic_product_name')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('plastic_product_name'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="category" class="form-label">{{ __('Category:') }}</label>
                        <input type="text" name="category" id="category" value="<?= old('category', $plastic_product->category) ?>" required class="form-control">
                        <?php if($errors->first('category')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('category'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">{{ __('Description:') }}</label>
                        <textarea name="description" cols="40" rows="3" id="description" class="form-control"><?= old('description', $plastic_product->description) ?></textarea>
                        <?php if($errors->first('description')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('description'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="product_stat" class="form-label">{{ __('Product Statistics:') }}</label>
                        <input type="text" name="product_stat" id="product_stat" value="<?= old('product_stat', $plastic_product->product_stat) ?>" required class="form-control">
                        <?php if($errors->first('product_stat')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('product_stat'); ?></span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-success mb-3">{{ __('Edit Plastic Product') }}</button>

                </form>
            </div>
        </div>

        <br>
        <a href="<?= route('plastic.list') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Plastic Product List') }}</a>

    </section>

@endsection