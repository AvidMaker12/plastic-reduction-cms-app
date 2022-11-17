<div class="modal fade" id="modalDeleteChoice{{ $multiple_choice->id }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" area-labelledby="modalDeleteChoiceTitle{{ $multiple_choice->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalDeleteChoiceTitle{{ $multiple_choice->id }}" ><i class="bi bi-x-square-fill me-2"></i> {{ __('Confirm Delete Multiple Choice') }} <b>ID <?= $multiple_choice->id ?></b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                {{ __('Permanently delete this multiple choice') }}?
            </div>
            <div class="modal-footer">
                <a href="<?= route('plastic_calculator_question.deleteChoice',[$multiple_choice->id]) ?>" class="btn btn-danger" data-be-dismiss="modal" role="button">{{ __('Delete') }}</a>
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
            </div>
        </div>
    </div>
</div>