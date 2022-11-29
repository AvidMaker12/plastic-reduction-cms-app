@extends('layouts.app')

@section('title') {{ __('Statistics') }} @endsection <!-- Dynamic page tab title. -->

@section('content')

    <section class="container">
        <div class="d-flex justify-content-between mb-2 align-items-center">
            <h2>{{ __('Statistics') }}</h2>
        </div>
        
        <div class="row justify-content-center mb-5">
            <h3 class="h4 d-flex justify-content-center">{{ __('Latest Score') }}</h3>
            <table class="table table-striped table-bordered table-hover w-auto">
                <thead class="align-top">
                    <tr class="table-primary">
                        <th class="col-1">{{ __('Category') }}</th>
                        <th class="col-1">{{ __('Score') }}</th>
                        <th class="col-2">{{ __('Score Percent') }}</th>
                        <th class="col-2">{{ __('Date of Score') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $connection = mysqli_connect("localhost","root","","plastic-reduction-cms-app");
                        $query = "SELECT * FROM scores ORDER BY id DESC LIMIT 1";
                        $query_run = mysqli_query($connection, $query);
                        
                        if(mysqli_num_rows($query_run) > 0) {
                            foreach($query_run as $stat) {
                                if($stat['user_id'] == Auth::user()->id): ?>
                                    <tr>
                                        <td>
                                            <?php foreach($plastic_calculator_multiple_choices as $choice): ?>
                                                <?php if($choice->plastic_calculator_question_id == 1): ?>
                                                    <?php if($stat['score_category'] == $choice->choice_category): ?>
                                                        <?php if($choice->icon): ?>
                                                            <img src="<?= asset('storage/'.$choice->icon) ?>" height="30" alt="{{ __('Score category icon') }}">
                                                        <?php elseif(!asset('storage/site_images/NoImage1.jpg')): ?>
                                                            <h2><i class="bi bi-card-image"></i></h2>
                                                        <?php else: ?>
                                                            <img src="<?= asset('storage/site_images/NoImage1.jpg') ?>" height="30" alt="{{ __('Score category icon placeholder') }}">
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <p class="mt-2"><?= $stat['score_category'] ?></p>
                                        </td>
                                        <td><?= $stat['score'] ?>/<?= $stat['total_point'] ?></td>
                                        <td><?= $stat['score_percent'] ?>%</td>
                                        <td><?= date('M j, Y, G:i e', strtotime($stat['created_at'])) ?></td>
                                    </tr>
                                <?php endif;
                            } // End of foreach loop.
                        } else {
                            ?>
                                <tr>
                                    <td colspan="4">No score to show yet.</td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="row justify-content-center">
            <h3 class="h4 d-flex justify-content-center">{{ __('Score History') }}</h3>
            <table class="table table-striped table-bordered table-hover w-auto">
                <thead class="align-top">
                    <tr class="table-primary">
                        <th class="col-1">{{ __('Category') }}</th>
                        <th class="col-1">{{ __('Score') }}</th>
                        <th class="col-2">{{ __('Score Percent') }}</th>
                        <th class="col-2">{{ __('Date of Score') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($scores as $stat): ?>
                        <?php if($stat->user_id == Auth::user()->id): ?>
                            <tr>
                                <td>
                                    <?php foreach($plastic_calculator_multiple_choices as $choice): ?>
                                        <?php if($choice->plastic_calculator_question_id == 1): ?>
                                            <?php if($stat->score_category == $choice->choice_category): ?>
                                                <?php if($choice->icon): ?>
                                                    <img src="<?= asset('storage/'.$choice->icon) ?>" height="30" alt="{{ __('Score category icon') }}">
                                                <?php elseif(!asset('storage/site_images/NoImage1.jpg')): ?>
                                                    <h2><i class="bi bi-card-image"></i></h2>
                                                <?php else: ?>
                                                    <img src="<?= asset('storage/site_images/NoImage1.jpg') ?>" height="30" alt="{{ __('Score category icon placeholder') }}">
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <p class="mt-2"><?= $stat->score_category ?></p>
                                </td>
                                <td><?= $stat->score ?>/<?= $stat->total_point ?></td>
                                <td><?= $stat->score_percent ?>%</td>
                                <td><?= $stat->created_at->format('M j, Y, G:i e') ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <a href="<?= route('user.home') ?>" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-left"></i> {{ __('Back to Dashboard') }}</a>
        <a href="#top" class="btn btn-outline-dark" role="button"><i class="bi bi-chevron-double-up"></i> {{ __('Back to Top') }}</a>
    </section>
@endsection