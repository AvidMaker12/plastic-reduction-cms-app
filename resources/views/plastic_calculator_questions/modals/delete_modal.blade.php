<div class="modal fade" id="modalDelete{{ $question->id }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" area-labelledby="modalDeleteTitle{{ $question->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalDeleteTitle{{ $question->id }}" >{{ __('Confirm Delete Plastic Calculator Question') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                {{ __('Permanently delete plastic calculator question') }}?
            </div>
            <div class="modal-footer">
                <a href="<?= route('plastic_calculator_question.delete',[$question->id]) ?>" class="btn btn-danger" data-be-dismiss="modal" role="button">{{ __('Delete') }}</a>
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
            </div>
        </div>
    </div>
</div>