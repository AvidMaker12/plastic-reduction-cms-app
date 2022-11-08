@extends('layouts_console.app_console')

@section('title') {{ __('Plastic Products') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">
        <div class="d-flex justify-content-between mb-2 align-items-center">
            <h2>{{ __('Manage Plastic Products') }}</h2>

            <a href="<?= route('plastic.add') ?>" class="btn btn-success" role="button">{{ __('Add New Plastic Product') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <tr class="table-primary">
                    <th>{{ __('Icon') }}</th>
                    <th>{{ __('Picture') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Category') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Product Statistics') }}</th>
                    <th>{{ __('Date Created') }}</th>
                    <th>{{ __('Date Updated') }}</th>
                    <th>{{ __('Created By') }}</th>
                    <th></th> <!-- 'Icon' edit button, 'Picture' edit button, 'Edit' button, 'Delete' button. -->
                </tr>
                <?php foreach($plastic_products as $plastic): ?>
                    <tr>
                        <td>
                            <?php if($plastic->icon): ?>
                                <img src="<?= asset('storage/'.$plastic->icon) ?>" height="50" alt="{{ __('Plastic product icon') }}">
                            <?php else: ?>
                                <h2><i class="bi bi-card-image" alt="{{ __('Plastic product icon') }}"></i></h2>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($plastic->image): ?>
                                <img src="<?= asset('storage/'.$plastic->image) ?>" height="50" alt="{{ __('Plastic product picture') }}">
                            <?php elseif(!asset('storage/site_images/NoImage1.jpg')): ?>
                                <h2><i class="bi bi-card-image"></i></h2>
                            <?php else: ?>
                                <img src="<?= asset('storage/site_images/NoImage1.jpg') ?>" height="50" alt="{{ __('Plastic product picture placeholder') }}">
                            <?php endif; ?>
                        </td>
                        <td><?= $plastic->plastic_product_name ?></td>
                        <td><?= $plastic->category ?></td>
                        <td><?= $plastic->description ?></td>
                        <td><?= $plastic->product_stat ?></td>
                        <td><?= $plastic->created_at->format('M j, Y, G:i e') ?></td>
                        <td><?= $plastic->updated_at->format('M j, Y, G:i e') ?></td>
                        <td><?= $plastic->user->f_name ?> <?= $plastic->user->l_name ?></td>
                        <td>
                            <a href="<?= route('plastic.icon',[$plastic->id]) ?>" class="btn btn-primary" role="button">{{ __('Icon') }}</a>
                            <a href="<?= route('plastic.image',[$plastic->id]) ?>" class="btn btn-primary" role="button">{{ __('Image') }}</a>
                            <a href="<?= route('plastic.edit',[$plastic->id]) ?>" class="btn btn-primary" role="button">{{ __('Edit') }}</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $plastic->id }}">{{ __('Delete') }}</button>
                        </td>
                        @include('plastic_products.modals.delete_modal')
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <a href="<?= route('admin.home') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Dashboard') }}</a>
        <a href="#top" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-double-up"></i> {{ __('Back to Top') }}</a>

    </section>
@endsection