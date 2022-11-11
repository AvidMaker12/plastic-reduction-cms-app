@extends('layouts_console.app_console')

@section('title') {{ __('Plastic Calculator Questions') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">
        <div class="d-flex justify-content-between mb-2 align-items-center">
            <h2>{{ __('Manage Plastic Calculator Question') }}</h2>

            <a href="<?= route('plastic_calculator_question.add') ?>" class="btn btn-success" role="button" aria-label="{{ __('Add New Plastic Calculator Question') }}">{{ __('Add New Question') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <tr class="table-primary">
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Icon') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Question') }}</th>
                    <th>{{ __('Multiple Choice Answers') }}</th>
                    <th>{{ __('Admin Info') }}</th>
                    <th></th> <!-- 'Icon' edit button, 'Edit' button, 'Delete' button. -->
                </tr>
                <?php foreach($plastic_calculator_questions as $question): ?>
                    <tr>
                        <td>
                            <?= $question->id ?>
                        </td>
                        <td>
                            <?php if($question->icon): ?>
                                <img src="<?= asset('storage/'.$question->icon) ?>" height="50" alt="{{ __('Plastic calculator question icon') }}">
                            <?php else: ?>
                                <h2><i class="bi bi-card-image" alt="{{ __('Plastic calculator question icon') }}"></i></h2>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($question->image): ?>
                                <img src="<?= asset('storage/'.$question->image) ?>" height="50" alt="{{ __('Plastic calculator question picture') }}">
                            <?php elseif(!asset('storage/site_images/NoImage1.jpg')): ?>
                                <h2><i class="bi bi-card-image"></i></h2>
                            <?php else: ?>
                                <img src="<?= asset('storage/site_images/NoImage1.jpg') ?>" height="50" alt="{{ __('Plastic calculator question picture placeholder') }}">
                            <?php endif; ?>
                        </td>
                        <td><?= $question->question ?></td>
                        <td>
                            <ul>
                                <?php foreach($plastic_calculator_multiple_choices as $multiple_choice): ?>
                                    <?php if($multiple_choice->plastic_calculator_question_id === $question->id): ?>
                                        <li><?= $multiple_choice->choice ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalAddChoice{{ $question->id }}" aria-label="{{ __('Add New Multiple Choice') }}">{{ __('Add Multiple Choice') }}</button>
                        </td>
                        <td>
                            <ul>
                                <li>{{ __('Date Created:') }} <br><?= $question->created_at->format('M j, Y, G:i e') ?></li>
                                <li>{{ __('Date Updated:') }} <br><?= $question->updated_at->format('M j, Y, G:i e') ?></li>
                                <li>{{ __('Created By:') }} <br><?= $question->user->f_name ?> <?= $question->user->l_name ?></li>
                            </ul>
                        </td>
                        <td>
                            <a href="<?= route('plastic_calculator_question.icon',[$question->id]) ?>" class="btn btn-primary mb-1" role="button">{{ __('Icon') }}</a>
                            <a href="<?= route('plastic_calculator_question.image',[$question->id]) ?>" class="btn btn-primary mb-1" role="button">{{ __('Image') }}</a>
                            <a href="<?= route('plastic_calculator_question.edit',[$question->id]) ?>" class="btn btn-primary mb-1" role="button">{{ __('Edit') }}</a>
                            <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $question->id }}">{{ __('Delete') }}</button>
                        </td>
                        @include('plastic_calculator_questions.modals.delete_modal')
                        @include('plastic_calculator_questions.modals.add_choice_modal')
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <a href="<?= route('admin.home') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Dashboard') }}</a>
        <a href="#top" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-double-up"></i> {{ __('Back to Top') }}</a>

    </section>
@endsection