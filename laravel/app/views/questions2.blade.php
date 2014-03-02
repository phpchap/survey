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
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                <span class="sr-only">30% Complete</span>
            </div>
        </div>
    </div>
</div>

<div class="row">

    {{ Form::open(array('url' => '/questions')) }}

    <div class="col-lg-12">

        <!-- Question Four -->
        <div class="well">
            <h4><?php echo $questionsAr[4];?><span class="mandatory">*</span></h4>
            <?php
//            $q4Ar[] = "Very easy, as I live/work near card shops";
//            $q4Ar[] = "Very easy, I purchase online";
//            $q4Ar[] = "Not very easy, as I work long hours";
//            $q4Ar[] = "Not very easy, as I don’t live/work near card shops";
//            $q4Ar[]
//                = "Not very easy, as the card shops near me aren’t very good";
//            $q4Ar[] = "I prefer to purchase wrapping paper/cards at the weekend";

            // question four
            foreach ($q4Ar as $id => $qval) {
                ?>
                <div class="checkbox">
                    <label class="checkbox">
                        <input type="checkbox" name="q4[]" id="q4"
                               value="<?php echo $qval; ?>">
                        <?php echo $qval; ?>
                    </label>
                </div>
            <?php
            }
            ?>
        </div>
        <!-- Question Five -->
        <div class="well">
            <h4><?php echo $questionsAr[5];?><span class="mandatory">*</span></h4>
            <?php
//            $q5Ar[] = "Friends";
//            $q5Ar[] = "Family";
//            $q5Ar[] = "Partners";
//            $q5Ar[] = "Myself";
//            $q5Ar[] = "No one";

            // question five
            foreach ($q5Ar as $id => $qval) {
                ?>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="q5[]" id="q5"
                               value="<?php echo $qval; ?>">
                        <?php echo $qval; ?>
                    </label>

            <?php
            }
            ?>
        </div>

        <!-- Question Six -->
        <div class="well">
            <h4><?php echo $questionsAr[6];?><span class="mandatory">*</span></h4>
            <?php
//            $q6Ar[] = "Never";
//            $q6Ar[] = "Once a year";
//            $q6Ar[] = "Every few months";
//            $q6Ar[] = "Every month";
//            $q6Ar[] = "Every week";

            // question six
            foreach ($q6Ar as $id => $qval) {
                ?>
                <label class="radio-inline">
                    <input type="radio" name="q6" id="q6"
                           value="<?php echo $qval; ?>">
                    <?php echo $qval; ?>
                </label>
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