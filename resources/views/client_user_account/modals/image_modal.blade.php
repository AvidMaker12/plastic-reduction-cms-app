<form method="post" action="<?= route('client_user_account.image',[$user->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="modal fade" id="modalImage{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" area-labelledby="modalImageTitle{{ $user->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalImageTitle{{ $user->id }}" ><i class="bi bi-card-image me-2"></i> {{ __('Edit Profile Picture') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <div id="currentImage">
                            <p class="card-text">{{ __('Current Profile Picture:') }}</p>
                            <?php if($user->profile_image): ?>
                                <img src="<?= asset('storage/'.$user->profile_image) ?>" height="200" class="border border-5" alt="{{ __('User profile picture') }}">
                            <?php elseif(!asset('storage/users/NoProfilePic1.png')): ?>
                                <h2><i class="bi bi-person-bounding-box"></i></h2>
                            <?php else: ?>
                                <img src="<?= asset('storage/users/NoProfilePic1.png') ?>" height="200" class="border border-5" alt="{{ __('User profile picture') }}">
                            <?php endif; ?>
                        </div>
                        <div id="preview" style="display:none;" class="ms-4">
                            <p class="card-text">{{ __('New Profile Picture Preview:') }}</p>
                            <img id="preview_image" height="200" class="border border-5" alt="{{ __('Profile picture preview') }}"/>
                        </div>
                    </div>
                    <div class="mt-5 mb-4">
                        <label for="profile_image" class="form-label">{{ __('Select Profile Picture (optional):') }}</label>
                        <input type="file" name="profile_image" id="image" value="<?= old('profile_image', $user->profile_image) ?>" required class="form-control" onchange="loadFile(event)" aria-describedby="imageHelp">
                        <?php if($errors->first('profile_image')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('profile_image'); ?></span>
                        <?php endif; ?>
                        <div id="imageHelp" class="form-text">{{ __('Note: Maximum image size is 2048 kilobytes (2.048 megabytes).') }}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" aria-label="{{ __('Edit profile picture') }}">{{ __('Save') }}</button>
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
