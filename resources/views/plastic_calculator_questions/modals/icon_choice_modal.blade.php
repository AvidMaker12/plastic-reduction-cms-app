<form method="post" action="<?= route('plastic_calculator_question.iconChoice',[$multiple_choice->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="modal fade" id="modalIconChoice{{ $multiple_choice->id }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" area-labelledby="modalIconChoiceTitle{{ $multiple_choice->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalIconChoiceTitle{{ $multiple_choice->id }}" ><i class="bi bi-card-image me-2"></i> {{ __('Edit Multiple Choice Icon') }} <b>ID <?= $multiple_choice->id ?></b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}">
                        <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        For Question <?= $question->id ?>:
                        <br><?= $question->question ?>
                    </div>

                    <div id="preview" style="display:none;" class="ms-4">
                        <p class="card-text">{{ __('New Icon Preview:') }}</p>
                        <img id="preview_image" height="200" class="border border-5" alt="{{ __('Multiple choice icon preview') }}"/>
                    </div>
                    <div class="mb-4 mt-2">
                        <label for="icon" class="form-label">{{ __('Select Plastic Calculator Multiple Choice Icon (optional):') }}</label>
                        <input type="file" name="icon" id="image" value="<?= old('icon', $multiple_choice->icon) ?>" required class="form-control" onchange="loadFile(event)" aria-describedby="iconHelp">
                        <?php if($errors->first('icon')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('icon'); ?></span>
                        <?php endif; ?>
                        <div id="iconHelp" class="form-text">{{ __('Note: Maximum image size is 2048 kilobytes (2.048 megabytes).') }}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" aria-label="{{ __('Edit Multiple Choice Icon') }}">{{ __('Save') }}</button>
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
