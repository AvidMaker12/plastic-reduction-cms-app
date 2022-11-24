@extends('layouts_console.app_console')

@section('title') {{ __('Users') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">
        <div class="d-flex justify-content-between mb-2 align-items-center">
            <h2>{{ __('Account Settings') }}</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <tr class="table-primary">
                    <th>{{ __('Profile Picture') }}</th>
                    <th>{{ __('Username') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Date Joined') }}</th>
                    <th>{{ __('Date Last Updated') }}</th>
                    <th></th> <!-- 'Profile Picture' edit button, 'Edit' button, 'Delete' button. -->
                </tr>
                <?php foreach($users as $user): ?>
                    <?php if($user->id == Auth::user()->id && $user->is_admin == 0): ?>
                        <tr>
                            <td>
                                <?php if($user->profile_image): ?>
                                    <img src="<?= asset('storage/'.$user->profile_image) ?>" height="50" alt="{{ __('User profile picture') }}">
                                <?php elseif(!asset('storage/users/NoProfilePic1.png')): ?>
                                    <h2><i class="bi bi-person-bounding-box"></i></h2>
                                <?php else: ?>
                                    <img src="<?= asset('storage/users/NoProfilePic1.png') ?>" height="50" alt="{{ __('User profile picture') }}">
                                <?php endif; ?>
                            </td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->created_at->format('M j, Y, G:i e') ?></td>
                            <td><?= $user->updated_at->format('M j, Y, G:i e') ?></td>
                            <td>
                                <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalImage{{ $user->id }}" >{{ __('Profile Picture') }}</button>
                                <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $user->id }}" >{{ __('Edit') }}</button>
                                <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $user->id }}" >{{ __('Delete') }}</button>
                            </td>
                            @include('client_user_account.modals.image_modal')
                            @include('client_user_account.modals.edit_modal')
                            @include('client_user_account.modals.delete_modal')
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </div>

        <a href="<?= route('user.home') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Dashboard') }}</a>
    </section>
@endsection