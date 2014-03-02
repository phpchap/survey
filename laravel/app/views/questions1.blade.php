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
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                <span class="sr-only">15% Complete (success)</span>
            </div>
        </div>
    </div>
</div>

<div class="row">

    {{ Form::open(array('url' => '/questions')) }}

    <div class="col-lg-12">

        <!-- Question One -->
        <div class="well">
            <h4><?php echo $questionsAr[1];?><span class="mandatory">*</span></h4>
            <?php
//            $q1Ar[] = "Under 18";
//            $q1Ar[] = "18 - 24";
//            $q1Ar[] = "25 - 33";
//            $q1Ar[] = "34 - 44";
//            $q1Ar[] = "45 - 54";
//            $q1Ar[] = "55 - 65";
//            $q1Ar[] = "Over 65";

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

        <!-- Question Two -->
        <div class="well">
            <h4><?php echo $questionsAr[2];?><span class="mandatory">*</span></h4>
            <?php
//            $q2Ar[] = "Male";
//            $q2Ar[] = "Female";
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

        <!-- Question Three -->
        <div class="well">
            <h4><?php echo $questionsAr[3];?><span class="mandatory">*</span></h4>
            <?php
//            $q3Ar[] = "Very easy, as I live/work near shops";
//            $q3Ar[] = "Very easy, I purchase online";
//            $q3Ar[] = "Not very easy, as I work long hours";
//            $q3Ar[] = "Not very easy, as I don’t live/work near shops";
//            $q3Ar[] = "Not very easy, as the shops near me aren’t very good";
//            $q3Ar[] = "I prefer to purchase gifts at the weekend";

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
        <div class="col-lg-12">
            <button type="submit" class="btn btn-success pull-right">Next
            </button>
        </div>
        {{ Form::close() }}
    </div>
    @stop
</div>