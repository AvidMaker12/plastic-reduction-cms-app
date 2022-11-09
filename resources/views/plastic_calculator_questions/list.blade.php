@extends('layouts_console.app_console')

@section('title') {{ __('Plastic Calculator Questions') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">
        <div class="d-flex justify-content-between mb-2 align-items-center">
            <h2>{{ __('Manage Plastic Calculator Questions') }}</h2>

            <a href="<?= route('plastic_calculator_question.add') ?>" class="btn btn-success" role="button">{{ __('Add New Plastic Calculator Question') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <tr class="table-primary">
                    <th>{{ __('Icon') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Question') }}</th>
                    <th>{{ __('Date Created') }}</th>
                    <th>{{ __('Date Updated') }}</th>
                    <th>{{ __('Created By') }}</th>
                    <th></th> <!-- 'Icon' edit button, 'Edit' button, 'Delete' button. -->
                </tr>
                <?php foreach($plastic_calculator_questions as $plastic_calculator_question): ?>
                    <tr>
                        <td>
                            <?php if($plastic_calculator_question->icon): ?>
                                <img src="<?= asset('storage/'.$plastic_calculator_question->icon) ?>" height="50" alt="{{ __('Plastic calculator question icon') }}">
                            <?php else: ?>
                                <h2><i class="bi bi-card-image" alt="{{ __('Plastic calculator question icon') }}"></i></h2>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($plastic_calculator_question->image): ?>
                                <img src="<?= asset('storage/'.$plastic_calculator_question->image) ?>" height="50" alt="{{ __('Plastic calculator question picture') }}">
                            <?php elseif(!asset('storage/site_images/NoImage1.jpg')): ?>
                                <h2><i class="bi bi-card-image"></i></h2>
                            <?php else: ?>
                                <img src="<?= asset('storage/site_images/NoImage1.jpg') ?>" height="50" alt="{{ __('Plastic calculator question picture placeholder') }}">
                            <?php endif; ?>
                        </td>
                        <td><?= $plastic_calculator_question->question ?></td>
                        <td><?= $plastic_calculator_question->created_at->format('M j, Y, G:i e') ?></td>
                        <td><?= $plastic_calculator_question->updated_at->format('M j, Y, G:i e') ?></td>
                        <td><?= $plastic_calculator_question->user->f_name ?> <?= $plastic_calculator_question->user->l_name ?></td>
                        <td>
                            <a href="<?= route('plastic_calculator_question.icon',[$plastic_calculator_question->id]) ?>" class="btn btn-primary" role="button">{{ __('Icon') }}</a>
                            <a href="<?= route('plastic_calculator_question.image',[$plastic_calculator_question->id]) ?>" class="btn btn-primary" role="button">{{ __('Image') }}</a>
                            <a href="<?= route('plastic_calculator_question.edit',[$plastic_calculator_question->id]) ?>" class="btn btn-primary" role="button">{{ __('Edit') }}</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $plastic_calculator_question->id }}">{{ __('Delete') }}</button>
                        </td>
                        @include('plastic_calculator_questions.modals.delete_modal')
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <a href="<?= route('admin.home') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Dashboard') }}</a>
        <a href="#top" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-double-up"></i> {{ __('Back to Top') }}</a>

    </section>
@endsection