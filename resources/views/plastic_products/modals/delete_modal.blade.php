<div class="modal fade" id="modalDelete{{ $plastic->id }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" area-labelledby="modalDeleteTitle{{ $plastic->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalDeleteTitle{{ $plastic->id }}" >{{ __('Confirm Delete Plastic Product') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                {{ __('Permanently delete plastic product') }} <b>{{ $plastic->plastic_product_name }}</b> ?
            </div>
            <div class="modal-footer">
                <a href="<?= route('plastic.delete',[$plastic->id]) ?>" class="btn btn-danger" data-be-dismiss="modal" role="button">Delete</a>
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>