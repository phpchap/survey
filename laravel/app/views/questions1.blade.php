@extends('layouts.master')
@section('navigation')
<!--<div class="header">-->
<!--    <ul class="nav nav-pills pull-right">-->
<!--        <li>--><?php //echo link_to('/', 'Home'); ?><!--</a></li>-->
<!--        <li class="active">--><?php //echo link_to('/products', 'Gift Chooser'); ?><!--</li>-->
<!--        <li>--><?php //echo link_to('/about-us', 'About Us'); ?><!--</li>-->
<!--    </ul>-->
<!--    <h3 class="text-muted">TooWrappedUp</h3>-->
<!--</div>-->
@stop

@section('content')

<div class="row">
    <div class="col-lg-4">
        <h4>Questionaire Progress</h4>
    </div>
    <div class="col-lg-8">
        <div class="progress progress-striped">
            <div class="progress-bar progress-bar-success" role="progressbar"
                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                 style="width: 15%">
                <span class="sr-only">15% Complete (success)</span>
            </div>
        </div>
    </div>
</div>

<div class="row">

    {{ Form::open(array('url' => '/survey')) }}

    <input type="hidden" name="s" value="1"/>

    <div class="col-lg-12">
        <!-- Question One -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q1']))
            ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[1]; ?><?php echo (!empty($validationErrorAr['q1']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q1'] . "</span>" : ""; ?></h4>
                <?php
                // question one
                foreach ($q1Ar as $id => $qval) {
                    ?>
                    <label class="radio-inline">
                        <input type="radio" name="q1" id="q1"
                               value="<?php echo $qval; ?>">
                        <?php echo $qval; ?>
                    </label>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- Question Two -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q2']))
            ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[2]; ?><span
                        class="mandatory">*</span> <?php echo (!empty($validationErrorAr['q2']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q2'] . "</span>" : ""; ?></h4>
                <?php
                // question two
                foreach ($q2Ar as $id => $qval) {
                    ?>
                    <label class="radio-inline">
                        <input type="radio" name="q2" id="q2"
                               value="<?php echo $qval; ?>">
                        <?php echo $qval; ?>
                    </label>
                <?php } ?>
            </div>
        </div>

        <!-- Question Three -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q3']))
            ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[3]; ?><span
                        class="mandatory">*</span> <?php echo (!empty($validationErrorAr['q3']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q3'] . "</span>" : ""; ?></h4>
                <?php
                // question three
                foreach ($q3Ar as $id => $qval) {
                    ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="q3[]" id="q3"
                                   value="<?php echo $qval; ?>">
                            <?php echo $qval; ?>
                        </label>
                    </div>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-success pull-right">Next
            </button>
            {{ Form::close() }}
        </div>
        @stop
    </div>
</div>