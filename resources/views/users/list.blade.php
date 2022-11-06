@extends('layouts_console.app_console')

@section('title') {{'Users'}} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <!-- Page status messages.
         Example: "New Plastic Product has successfully been added." -->
    @if(session()->has('message'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button> <!-- Alert message close button. -->
                <?= session()->get('message') ?>
            </div>
        </div>
    @endif
    @if (session('status'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button> <!-- Alert message close button. -->
                {{ session('status') }}
            </div>
        </div>
    @endif

    <section class="container">

        <h2>Manage Users</h2>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <tr class="table-primary">
                    <th>Profile Picture</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Date Joined</th>
                    <th></th> <!-- 'Profile Picture' edit button, 'Edit' button, 'Delete' button. -->
                </tr>
                <?php foreach($users as $user): ?>
                    <?php if($user->is_admin == 0): ?>
                        <tr>
                            <td>
                                <?php if($user->profile_image): ?>
                                    <img src="<?= asset('storage/'.$user->profile_image) ?>" width="200" alt="User profile picture">
                                <?php endif; ?>
                            </td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->created_at->format('M j, Y') ?></td>
                            <td><a href="<?= route('user.image',[$user->id]) ?>" class="btn btn-primary" role="button">Profile Picture</a>
                            <a href="<?= route('user.edit',[$user->id]) ?>" class="btn btn-primary" role="button">Edit</a>
                            <a href="<?= route('user.delete',[$user->id]) ?>" class="btn btn-danger" role="button">Delete</a></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </div>

        <a href="<?= route('admin.add') ?>" class="btn btn-success" role="button">Add New User</a>
        <br>
        <br>
        <a href="<?= route('admin.home') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> Back to Dashboard</a>

    </section>
@endsection