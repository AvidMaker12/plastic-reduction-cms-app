@extends('layouts_console.app_console')

@section('title') {{ __('Plastic Calculator Questions') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">
        <div class="d-flex justify-content-between mb-2 align-items-center">
            <h2>{{ __('Manage Plastic Calculator Questions and Choices') }}</h2>

            <a href="<?= route('plastic_calculator_question.add') ?>" class="btn btn-success" role="button" aria-label="{{ __('Add New Plastic Calculator Question') }}">{{ __('Add New Question') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-responsive">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">{{ __('ID') }}</th>
                        <th scope="col">{{ __('Icon') }}</th>
                        <th scope="col">{{ __('Image') }}</th>
                        <th scope="col">{{ __('Question') }}</th>
                        <th scope="col">{{ __('Multiple Choice Answers') }}</th>
                        <th scope="col">{{ __('Admin Info') }}</th>
                        <th scope="col"></th> <!-- 'Icon' edit button, 'Edit' button, 'Delete' button. -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($plastic_calculator_questions as $question): ?>
                        <tr>
                            <td>
                                <?= $question->id ?>
                            </td>
                            <td>
                                <?php if($question->icon): ?>
                                    <img src="<?= asset('storage/'.$question->icon) ?>" height="50" alt="{{ __('Plastic calculator question icon') }}">
                                <?php else: ?>
                                    <h2><i class="bi bi-card-image" alt="{{ __('Icon placeholder') }}"></i></h2>
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
                            <td class="col-3"><?= $question->question ?></td>
                            <td class="col-3 p-0">

                                <table class="table table-hover table-responsive mb-0">
                                    <thead class="table-info">
                                        <tr>
                                            <th scope="col">ID</th> <!-- Icon for multiple choice text. -->
                                            <th scope="col">Icon</th> <!-- Icon for multiple choice text. -->
                                            <th scope="col">Multiple Choice</th>
                                            <th scope="col"></th> <!-- Space for Settings button -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($plastic_calculator_multiple_choices as $multiple_choice): ?>
                                            <?php if($multiple_choice->plastic_calculator_question_id === $question->id): ?>
                                                <tr>
                                                    <!-- Multiple Choice ID -->
                                                    <td>
                                                        <?= $multiple_choice->id ?>
                                                    </td>

                                                    <!-- Multiple Choice Icon -->
                                                    <td>
                                                        <?php if($multiple_choice->icon): ?>
                                                            <img src="<?= asset('storage/'.$multiple_choice->icon) ?>" height="50" alt="{{ __('Plastic calculator multiple choice icon') }}">
                                                        <?php else: ?>
                                                            <h2><i class="bi bi-card-image" alt="{{ __('Icon placeholder') }}"></i></h2>
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- Multiple Choice ID & Text -->
                                                    <td>
                                                        <?= $multiple_choice->choice ?>
                                                    </td>
                                                    
                                                    <!-- Multiple Choice Settings Dropdown Menu -->
                                                    <td>
                                                        <div class="dropdown mt-2">
                                                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton<?= $multiple_choice->id ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Settings
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $multiple_choice->id ?>">
                                                                <li>
                                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditChoice{{ $multiple_choice->id }}">
                                                                        <i class="bi bi-gear-fill me-2"></i> {{ __('Edit') }}
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalIconChoice{{ $multiple_choice->id }}">
                                                                        <i class="bi bi-card-image me-2"></i> {{ __('Icon') }}
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDeleteChoice{{ $multiple_choice->id }}">
                                                                        <i class="bi bi-x-square-fill me-2"></i> {{ __('Delete') }}
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @include('plastic_calculator_questions.modals.add_choice_modal')
                                                @include('plastic_calculator_questions.modals.edit_choice_modal')
                                                @include('plastic_calculator_questions.modals.icon_choice_modal')
                                                @include('plastic_calculator_questions.modals.delete_choice_modal')
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end align-items-center m-2">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAddChoice{{ $question->id }}" aria-label="{{ __('Add New Multiple Choice') }}" title="Add New Multiple Choice">{{ __('Add') }}</button>
                                </div>
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
                                <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalDeleteQuestion{{ $question->id }}">{{ __('Delete') }}</button>
                            </td>
                            @include('plastic_calculator_questions.modals.delete_question_modal')
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <a href="<?= route('admin.home') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Dashboard') }}</a>
        <a href="#top" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-double-up"></i> {{ __('Back to Top') }}</a>

    </section>
@endsection