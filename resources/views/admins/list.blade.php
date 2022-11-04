@extends('layouts_console.app_console')

@section('title') {{'Admins'}} @endsection <!-- Dynamic page tab title. -->

@section('content')
    <section class="container">

        <h2>Manage Admins</h2>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <tr class="table-info">
                    <th>Profile Picture</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Date Joined</th>
                    <th></th> <!-- 'Profile Picture' edit button. -->
                    <th></th> <!-- 'Edit' button. -->
                    <th></th> <!-- 'Delete' button. -->
                </tr>
                <?php foreach($users as $user): ?>
                    <?php if($user->is_admin == 1): ?>
                        <tr>
                            <td>
                                <?php if($user->profile_image): ?>
                                    <img src="<?= asset('storage/'.$user->profile_image) ?>" width="200" alt="User profile picture">
                                <?php endif; ?>
                            </td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->f_name ?> <?= $user->l_name ?></td>
                            <td><?= $user->created_at->format('M j, Y') ?></td>
                            <td><a href="{{route('admin.image'<?= $user->id ?>)}}">Profile Picture</a></td>
                            <td><a href="{{route('admin.edit'<?= $user->id ?>)}}">Edit</a></td>
                            <td><a href="{{route('admin.delete<?= $user->id ?>')}}">Delete</a></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </div>

        <a href="{{route('admin.add')}}" class="btn btn-success" role="button">Add New Admin</a>

    </section>
@endsection