<div class="modal fade" id="modalDelete{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" area-labelledby="modalDeleteTitle{{ $user->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalDeleteTitle{{ $user->id }}" >{{ __('Confirm Delete Admin') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                Permanently delete admin <b>{{ $user->f_name }} {{ $user->l_name }}</b> ?
            </div>
            <div class="modal-footer">
                <a href="<?= route('user.delete',[$user->id]) ?>" class="btn btn-danger" data-be-dismiss="modal" role="button">Delete</a>
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>