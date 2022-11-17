<form method="post" action="<?= route('plastic_calculator_question.editChoice',[$multiple_choice->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="modal fade" id="modalEditChoice{{ $multiple_choice->id }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" area-labelledby="modalEditChoiceTitle{{ $multiple_choice->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalEditChoiceTitle{{ $multiple_choice->id }}" ><i class="bi bi-gear-fill me-2"></i> {{ __('Edit Multiple Choice') }} <b>ID <?= $multiple_choice->id ?></b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}">
                        <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="question_id" class="form-label">{{ __('Question:') }} <?= $question->question ?></label>
                        <input type="text" name="question_id" id="question_id" value="<?= old('question_id', $question->id) ?>"  required class="form-control">
                        <?php if($errors->first('question_id')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('question_id'); ?></span>
                        <?php endif; ?>
                        <div id="questionHelp" class="form-text">{{ __('Note: Above is question ID for reference only.') }}</div>
                    </div>

                    <div class="mb-4">
                        <label for="choice" class="form-label">{{ __('Multiple Choice Text:') }}</label>
                        <input type="text" name="choice" id="choice" value="<?= old('choice', $multiple_choice->choice) ?>" required class="form-control">
                        <?php if($errors->first('choice')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('choice'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="choice_category" class="form-label">{{ __('Category:') }}</label>
                        <input type="text" name="choice_category" id="choice_category" value="<?= old('choice_category', $multiple_choice->choice_category) ?>" required class="form-control">
                        <?php if($errors->first('choice_category')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('choice_category'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="slug" class="form-label">{{ __('Page Slug:') }}</label>
                        <input type="text" name="slug" id="slug" value="<?= old('slug', $multiple_choice->slug) ?>" required class="form-control">
                        <?php if($errors->first('slug')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('slug'); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('Edit Multiple Choice') }}</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
