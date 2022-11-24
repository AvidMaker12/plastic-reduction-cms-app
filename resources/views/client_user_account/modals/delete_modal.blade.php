<div class="modal fade" id="modalDelete{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" area-labelledby="modalDeleteTitle{{ $user->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalDeleteTitle{{ $user->id }}" ><i class="bi bi-x-square-fill me-2"></i> {{ __('Confirm Delete Account') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                {{ __('Are you sure you want to permanently delete your account?') }}
            </div>
            <div class="modal-footer">
                <a href="<?= route('client_user_account.delete',[$user->id]) ?>" class="btn btn-danger" data-be-dismiss="modal" role="button">{{ __('Delete') }}</a>
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
            </div>
        </div>
    </div>
</div>