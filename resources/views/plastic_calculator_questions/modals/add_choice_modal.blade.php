<form method="post" action="<?= route('plastic_calculator_question.addChoice',[$question->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="modal fade" id="modalAddChoice{{ $question->id }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" area-labelledby="modalAddChoiceTitle{{ $question->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalAddChoiceTitle{{ $question->id }}" >{{ __('Add New Multiple Choice') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}">
                        <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="plastic_calculator_question_id" class="form-label">{{ __('Question:') }}</label>
                        <input type="text" name="plastic_calculator_question_id" id="plastic_calculator_question_id" value="<?= old('plastic_calculator_question_id'), $question->id ?>" required class="form-control" disabled>
                        <?php if($errors->first('plastic_calculator_question_id')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('plastic_calculator_question_id'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="choice" class="form-label">{{ __('Multiple Choice Text:') }}</label>
                        <input type="text" name="choice" id="choice" value="<?= old('choice') ?>" required class="form-control">
                        <?php if($errors->first('choice')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('choice'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="choice_category" class="form-label">{{ __('Category:') }}</label>
                        <input type="text" name="choice_category" id="choice_category" value="<?= old('choice_category') ?>" required class="form-control">
                        <?php if($errors->first('choice_category')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('choice_category'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="slug" class="form-label">{{ __('Page Slug:') }}</label>
                        <input type="text" name="slug" id="slug" value="<?= old('slug') ?>" required class="form-control">
                        <?php if($errors->first('slug')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('slug'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div id="preview" style="display:none;" class="ms-4">
                        <p class="card-text">{{ __('New Icon Preview:') }}</p>
                        <img id="preview_image" height="200" class="border border-5" alt="{{ __('Plastic calculator question icon preview') }}"/>
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="icon" class="form-label">{{ __('Select Plastic Calculator Question Icon (optional):') }}</label>
                        <input type="file" name="icon" id="image" value="<?= old('icon') ?>" required class="form-control" onchange="loadFile(event)" aria-describedby="iconHelp">
                        <?php if($errors->first('icon')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('icon'); ?></span>
                        <?php endif; ?>
                        <div id="iconHelp" class="form-text">{{ __('Note: Maximum image size is 2048 kilobytes (2.048 megabytes).') }}</div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('Add New Multiple Choice') }}</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('/js/image_preview_CRUD.js') }}"></script>
@endsection