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
        <h4>Survey Progress</h4>
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

    {{ Form::open(array('url' => '/survey')) }}

    <input type="hidden" name="s" value="1"/>

    <div class="col-lg-12">

        <!-- Question Ten-->
        <div class="form-group <?php echo (!empty($validationErrorAr['q10'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[10];?><?php echo (!empty($validationErrorAr['q10']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q10'] . "</span>" : ""; ?></h4>
                <?php
                // question ten
                foreach ($q10Ar as $id => $qval) {
                    ?>
                    <label class="radio-inline">
                        <input type="radio" name="q10" id="q10"
                               <?php echo ($q10 == $qval) ? "checked=checked" : ""; ?>
                               value="<?php echo $qval; ?>">
                        <?php echo $qval; ?>
                    </label>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- Question Eleven -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q11'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[11];?><?php echo (!empty($validationErrorAr['q11']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q11'] . "</span>" : ""; ?></h4>
                <label class="radio-inline">
                    <textarea name="q11" class="form-control" rows="2"><?php echo $q11; ?></textarea>
                </label>
            </div>
        </div>

        <!-- Question Twelve -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q12'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[12];?><?php echo (!empty($validationErrorAr['q12']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q12'] . "</span>" : ""; ?></h4>
                <label class="radio-inline">
                    <textarea name="q12" class="form-control" rows="2"><?php echo $q12; ?></textarea>
                </label>
            </div>
        </div>

        <div class="col-lg-12">
            <button type="submit" class="btn btn-success pull-right">Next
            </button>
        </div>
        {{ Form::close() }}
    </div>
    @stop
</div>