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
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                <span class="sr-only">45% Complete</span>
            </div>
        </div>
    </div>
</div>


<div class="row">

    {{ Form::open(array('url' => '/questions')) }}

    <div class="col-lg-12">

        <!-- Question Seven -->
        <div class="well">
            <h4><?php echo $questionsAr[7];?><span class="mandatory">*</span></h4>
            <?php
//            $q7Ar[] = "Never";
//            $q7Ar[] = "Once a year";
//            $q7Ar[] = "Every few months";
//            $q7Ar[] = "Every month";
//            $q7Ar[] = "Every week";

            // question seven
            foreach ($q7Ar as $id => $qval) {
                ?>
                <label class="radio-inline">
                    <input type="radio" name="q7" id="q7"
                           value="<?php echo $qval; ?>">
                    <?php echo $qval; ?>
                </label>

            <?php
            }
            ?>
        </div>

        <!-- Question Eight -->
        <div class="well">
            <h4><?php echo $questionsAr[8];?><span class="mandatory">*</span></h4>
            <?php
//            $q8Ar[] = "Never";
//            $q8Ar[] = "Occasionally";
//            $q8Ar[] = "Often";

            // question eight
            foreach ($q8Ar as $id => $qval) {
                ?>
                <label class="radio-inline">
                    <input type="radio" name="q8" id="q8"
                           value="<?php echo $qval; ?>">
                    <?php echo $qval; ?>
                </label>
            <?php
            }
            ?>
        </div>

        <!-- Question Nine-->
        <div class="well">
            <h4><?php echo $questionsAr[9];?><span class="mandatory">*</span></h4>
            <?php
//            $q9Ar[] = "Never";
//            $q9Ar[] = "Occasionally";
//            $q9Ar[] = "Often";

            // question nine
            foreach ($q9Ar as $id => $qval) {
                ?>
                <label class="radio-inline">
                    <input type="radio" name="q9" id="q9"
                           value="<?php echo $qval; ?>">
                    <?php echo $qval; ?>
                </label>
            <?php
            }
            ?>
        </div>

        <div class="col-lg-12">
            <button type="submit" class="btn btn-success pull-right">Next
            </button>
        </div>
        {{ Form::close() }}
    </div>
    @stop
</div>