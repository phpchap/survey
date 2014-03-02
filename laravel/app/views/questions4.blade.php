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
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                <span class="sr-only">60% Complete</span>
            </div>
        </div>
    </div>
</div>

<div class="row">

    {{ Form::open(array('url' => '/questions')) }}

    <div class="col-lg-12">

        <!-- Question Ten-->
        <div class="well">
            <h4><?php echo $questionsAr[10];?><span class="mandatory">*</span></h4>
            <?php

//            $q10Ar[] = "Yes";
//            $q10Ar[] = "No";

            // question ten
            foreach ($q10Ar as $id => $qval) {
                ?>
                <label class="radio-inline">
                    <input type="radio" name="q10" id="q10"
                           value="<?php echo $qval; ?>">
                    <?php echo $qval; ?>
                </label>
            <?php
            }
            ?>
        </div>

        <!-- Question Eleven -->
        <div class="well">
            <h4><?php echo $questionsAr[11];?><span class="mandatory">*</span></h4>
            <label class="radio-inline">
                <textarea name="q11" class="form-control" rows="2"></textarea>
            </label>
        </div>

        <!-- Question Twelve -->
        <div class="well">
            <h4><?php echo $questionsAr[12];?><span class="mandatory">*</span></h4>
            <label class="radio-inline">
                <textarea name="q12" class="form-control" rows="2"></textarea>
            </label>
        </div>

        <div class="col-lg-12">
            <button type="submit" class="btn btn-success pull-right">Next
            </button>
        </div>
        {{ Form::close() }}
    </div>
    @stop
</div>