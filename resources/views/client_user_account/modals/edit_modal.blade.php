<form method="post" action="<?= route('client_user_account.edit',[$user->id])?>" novalidate class="form-horizontal" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="modal fade" id="modalEdit{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" area-labelledby="modalEditTitle{{ $user->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalEditTitle{{ $user->id }}" ><i class="bi bi-gear-fill me-2"></i> {{ __('Edit') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="username" class="form-label">{{ __('Username:') }}</label>
                        <input type="text" name="username" id="username" value="<?= old('username', $user->username) ?>" required class="form-control">
                        <?php if($errors->first('username')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('username'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">{{ __('E-mail:') }}</label>
                        <input type="text" name="email" id="email" value="<?= old('email', $user->email) ?>" required class="form-control">
                        <?php if($errors->first('email')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('email'); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">{{ __('Password:') }}</label>
                        <input type="text" name="password" id="password" required class="form-control" aria-describedby="passwordHelp">
                        <?php if($errors->first('password')): ?>
                            <br>
                            <span class="text-danger"><?= $errors->first('password'); ?></span>
                        <?php endif; ?>
                        <div id="passwordHelp" class="form-text">{{ __('Note: Password must be at least 8 characters long.') }}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" aria-label="{{ __('Edit profile') }}">{{ __('Save') }}</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
