@extends('layouts_console.app_console')

@section('title') {{ __('Users') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">
        <div class="d-flex justify-content-between mb-2 align-items-center">
            <h2>{{ __('Manage Users') }}</h2>

            <a href="<?= route('user.add') ?>" class="btn btn-success" role="button">Add New User</a>
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
                    <?php if($user->is_admin == 0): ?>
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
                                <a href="<?= route('user.image',[$user->id]) ?>" class="btn btn-primary mb-1" role="button">{{ __('Profile Picture') }}</a>
                                <a href="<?= route('user.edit',[$user->id]) ?>" class="btn btn-primary mb-1" role="button">{{ __('Edit') }}</a>
                                <!-- <a href="<?= route('user.delete',[$user->id]) ?>" class="btn btn-danger" role="button">Delete</a></td> -->
                                <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $user->id }}" >{{ __('Delete') }}</button>
                            </td>
                            @include('users.modals.delete_modal')
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </div>

        <a href="<?= route('admin.home') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Dashboard') }}</a>
        <a href="#top" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-double-up"></i> {{ __('Back to Top') }}</a>
    </section>
@endsection