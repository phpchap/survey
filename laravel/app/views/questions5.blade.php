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
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                <span class="sr-only">75% Complete</span>
            </div>
        </div>
    </div>
</div>

<div class="row">

    {{ Form::open(array('url' => '/survey')) }}

    <input type="hidden" name="s" value="1"/>

    <div class="col-md-6">
        <!-- Question Thirteen -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q13'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[13];?><?php echo (!empty($validationErrorAr['q13']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q13'] . "</span>" : ""; ?></h4>
                <?php
                // question thirteen
                foreach ($q13Ar as $id => $qval) {
                    ?>
                    <div class="checkbox">
                        <label class="checkbox">
                            <input type="checkbox" name="q13[]" id="q13"
                                   value="<?php echo $qval; ?>">
                            <?php echo $qval; ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Question Fourteen -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q14'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[14];?><?php echo (!empty($validationErrorAr['q14']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q14'] . "</span>" : ""; ?></h4>
                <?php
                // question fourteen
                foreach ($q14Ar as $id => $qval) {
                    ?>
                    <div class="checkbox">
                        <label class="checkbox">
                            <input type="checkbox" name="q14[]" id="q14"
                                   value="<?php echo $qval; ?>">
                            <?php echo $qval; ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-success pull-right">Next</button>
    </div>
</div>
{{ Form::close() }}

@stop