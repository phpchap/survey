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
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                <span class="sr-only">75% Complete</span>
            </div>
        </div>
    </div>
</div>

<div class="row">

    {{ Form::open(array('url' => '/questions')) }}

    <div class="col-md-6">

        <!-- Question Thirteen -->
        <div class="well">
            <h4><?php echo $questionsAr[13];?><span class="mandatory">*</span></h4>
            <?php
//            $q13Ar[] = "Birthday gifts";
//            $q13Ar[] = "Christmas gifts";
//            $q13Ar[] = "New Baby gifts";
//            $q13Ar[] = "Wedding gifts";
//            $q13Ar[] = "Valentines gifts";
//            $q13Ar[] = "New home gifts";
//            $q13Ar[] = "Anniversary gifts";
//            $q13Ar[] = "Thank you gifts";
//            $q13Ar[] = "Halloween gift";
//            $q13Ar[] = "Not planning on buying any gifts";

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
    <div class="col-md-6">

        <!-- Question Thirteen -->
        <div class="well">
            <h4><?php echo $questionsAr[14];?><span class="mandatory">*</span></h4>
            <?php
//            $q14Ar[] = "Books";
//            $q14Ar[] = "Jewellery";
//            $q14Ar[] = "Candles";
//            $q14Ar[] = "Toiletries";
//            $q14Ar[] = "Purses / Tote bags";
//            $q14Ar[] = "Home accessories";
//            $q14Ar[] = "Garden accessories";
//            $q14Ar[] = "Stationary";
//            $q14Ar[] = "Toys and games";
//            $q14Ar[] = "Art prints";
//            $q14Ar[] = "None of the above";

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
<div class="row">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-success pull-right">Next
        </button>
    </div>
</div>
{{ Form::close() }}

@stop