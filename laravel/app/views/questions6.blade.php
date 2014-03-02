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
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                <span class="sr-only">90% Complete</span>
            </div>
        </div>
    </div>
</div>

<div class="row">

    {{ Form::open(array('url' => '/questions')) }}

    <div class="col-lg-12">

        <!-- Question Fifteen -->
        <div class="well">
            <h4><?php echo $questionsAr[15];?><span class="mandatory">*</span></h4>
            <?php
//            $q15Ar[] = "Every time that I buy wrapping paper";
//            $q15Ar[] = "Very often";
//            $q15Ar[] = "Not very often";
//            $q15Ar[] = "Never";

            // question fifteen
            foreach ($q15Ar as $id => $qval) {
                ?>
                <div class="radio">
                    <label class="radio">
                        <input type="radio" name="q15" id="q15"
                               value="<?php echo $qval; ?>">
                        <?php echo $qval; ?>
                    </label>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- Question Sixteen -->
        <div class="well">
            <h4><?php echo $questionsAr[16];?><span class="mandatory">*</span></h4>
            <?php
//            $q16Ar[] = "I like to spend time selecting wrapping paper, accessories & wrapping my presents";
//            $q16Ar[] = "I tend to use whatever wrapping paper I have already";
//            $q16Ar[] = "I prefer not to wrap presents, as I can’t be bothered";
//            $q16Ar[] = "I prefer not to wrap presents, as I don’t have the time";
//            $q16Ar[] = "I prefer gift bags";
//            $q16Ar[] = "I wish I was better at wrapping presents, but I’m not sure how to do it properly";

            // question fifteen
            foreach ($q16Ar as $id => $qval) {
                ?>
                <div class="radio">
                    <label class="radio">
                        <input type="radio" name="q16" id="q16"
                               value="<?php echo $qval; ?>">
                        <?php echo $qval; ?>
                    </label>
                </div>
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