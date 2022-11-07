@extends('layouts_console.app_console')

@section('title') {{'Admins'}} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">
        <div class="d-flex justify-content-between mb-2 align-items-center">
            <h2>Manage Admins</h2>

            <a href="<?= route('admin.add') ?>" class="btn btn-success" role="button">Add New Admin</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <tr class="table-primary">
                    <th>Profile Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Joined</th>
                    <th></th> <!-- 'Profile Picture' edit button, 'Edit' button, 'Delete' button. -->
                </tr>
                <?php foreach($users as $user): ?>
                    <?php if($user->is_admin == 1): ?>
                        <tr>
                            <td>
                                <?php if($user->profile_image): ?>
                                    <img src="<?= asset('storage/'.$user->profile_image) ?>" height="50" alt="User profile picture">
                                <?php elseif(!asset('storage/users/NoProfilePic1.png')): ?>
                                    <h2><i class="bi bi-person-bounding-box"></i></h2>
                                <?php else: ?>
                                    <img src="<?= asset('storage/users/NoProfilePic1.png') ?>" height="50" alt="User profile picture">
                                <?php endif; ?>
                            </td>
                            <td><?= $user->f_name ?> <?= $user->l_name ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->created_at->format('M j, Y, G:i') ?></td>
                            <td>
                                <a href="<?= route('admin.image',[$user->id]) ?>" class="btn btn-primary" role="button">Profile Picture</a>
                                <a href="<?= route('admin.edit',[$user->id]) ?>" class="btn btn-primary" role="button">Edit</a>
                                <!-- <a href="<?= route('admin.delete',[$user->id]) ?>" class="btn btn-danger" role="button">Delete</a> -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $user->id }}" >Delete</button>
                            </td>
                            @include('admins.modals.delete_modal')
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </div>

        <a href="<?= route('admin.home') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> Back to Dashboard</a>
        <a href="#top" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-double-up"></i> Back to Top</a>

    </section>
@endsection