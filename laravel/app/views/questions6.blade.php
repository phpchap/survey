@extends('layouts.master')

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

    {{ Form::open(array('url' => '/survey')) }}

    <input type="hidden" name="s" value="1"/>

    <div class="col-lg-12">
        <!-- Question Fifteen -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q15'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[15];?><?php echo (!empty($validationErrorAr['q15']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q15'] . "</span>" : ""; ?></h4>
                <?php
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
        </div>

        <!-- Question Sixteen -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q16'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[16];?><?php echo (!empty($validationErrorAr['q16']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q16'] . "</span>" : ""; ?></h4>
                <?php
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
        </div>

        <div class="col-lg-12">
            <button type="submit" class="btn btn-success pull-right">Next</button>
        </div>
        {{ Form::close() }}
    </div>
    @stop
</div>