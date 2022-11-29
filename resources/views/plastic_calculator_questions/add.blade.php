@extends('layouts_console.app_console')

@section('title') {{ __('Plastic Calculator Questions') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ __('Add New Plastic Calculator Question') }}</h2>
            </div>

            <div class="card-body">
                <form method="post" action="<?= route('plastic_calculator_question.add')?>" novalidate class="form-horizontal" enctype="multipart/form-data">

                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <label for="question" class="form-label">{{ __('Question:') }}</label>
                        <input type="text" name="question" id="question" value="<?= old('question') ?>" required class="form-control">
                        <?php if($errors->first('question')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('question'); ?></span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-success mb-3">{{ __('Add New Plastic Calculator Question') }}</button>

                </form>
            </div>
        </div>

        <br>
        <a href="<?= route('plastic_calculator_question.list') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Plastic Calculator Questions List') }}</a>

    </section>

@endsection
