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
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                <span class="sr-only">30% Complete</span>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // question 6 why show/hide
        $('input:radio[name=q6]').change(function(){
            // hide / show why box
            if($('input:radio[name=q6]:checked').val() == 'Never') {
                $("#display_q6_why").show();
            } else {
                $("#display_q6_why").hide();
            }
        });
    })
</script>

<div class="row">

    {{ Form::open(array('url' => '/survey')) }}

    <input type="hidden" name="s" value="1"/>

    <div class="col-lg-12">
        <div class="form-group <?php echo (!empty($validationErrorAr['q4'])) ? "has-error has-feedback" : ""; ?>">
            <!-- Question Four -->
            <div class="well">
                <h4><?php echo $questionsAr[4];?><?php echo (!empty($validationErrorAr['q4']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q4'] . "</span>" : ""; ?></h4>
                <?php
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
        </div>
        <!-- Question Five -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q5'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[5];?><?php echo (!empty($validationErrorAr['q5']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q5'] . "</span>" : ""; ?></h4>
                <?php
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
        </div>

        <!-- Question Six -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q6'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[6];?><?php echo (!empty($validationErrorAr['q6']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q6'] . "</span>" : ""; ?></h4>
                <?php
                // question six
                foreach ($q6Ar as $id => $qval) {
                    ?>
                    <label class="radio-inline">
                        <input type="radio" name="q6" id="q6"
                               value="<?php echo $qval; ?>">
                        <?php echo $qval; ?>
                    </label>
                <?php } ?>
                <label class="radio-inline" id="display_q6_why" style="display:none">
                    Please state why?
                    <textarea name="q6_why" class="form-control" rows="2" cols="14"></textarea>
                </label>
            </div>
        </div>

        <div class="col-lg-12">
            <button type="submit" class="btn btn-success pull-right">Next</button>
        </div>
        {{ Form::close() }}
    </div>
    @stop
</div>