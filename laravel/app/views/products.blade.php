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
        <h4><?php echo stripslashes($product->title); ?></h4>
    </div>
    <div class="col-lg-8">
        <div class="progress progress-striped">
            <div class="progress-bar progress-bar-success" role="progressbar"
                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                 style="width: 15%">
                <span class="sr-only">15% Complete (success)</span>
            </div>
        </div>
    </div>
</div>

<div class="row">

    {{ Form::open(array('url' => '/survey')) }}

    <div class="col-lg-12">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="thumbnail">
                <img src="<?php echo $product->picture_url_1; ?>"
                     alt="<?php echo stripslashes($product->title); ?>"
                     title="<?php echo stripslashes($product->title); ?>">

                <div class="caption">
                    <small><?php echo stripslashes(
                            $product->description
                        ); ?></small>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="col-sm-6 col-md-4 col-lg-6" style="padding-left:0;padding-right:15px;">
                <!-- Q1 -->
                <div class="form-group <?php echo (!empty($validationErrorAr['q1'])) ? "has-error has-feedback" : ""; ?>">
                    <div class="well">
                        <script>
                            $(document).ready(function () {

                                var opinionArray = new Array;

                                opinionArray[10] = "I don't really like this :(";
                                opinionArray[20] = "It's OK";
                                opinionArray[30] = "It's great :)";

                                $("#theSlider")
                                    .bind("slider:ready slider:changed", function (event, data) {
                                        $("#opinion_text").html(opinionArray[data.value]);
                                        $("#opinion").val(opinionArray[data.value]);
                                    });
                            })
                        </script>
                        <p>1) What do you think about this? <span style="font-style: italic">Use the slider below</span><?php echo (!empty($validationErrorAr['q1']))
                                ? " <br/><span class='invalid'>"
                                . $validationErrorAr['q1'] . "</span>" : ""; ?></p>

                        <input value="20" type="text" id="theSlider"
                               data-slider="true"
                               data-slider-range="10,30" data-slider-step="10"
                               data-slider-snap="true" data-slider-theme="volume"
                               data-slider-highlight="true"/>
                        <span style="vertical-align: top"></span>

                        <p id="opinion_text">It's OK</p>
                        <input type="hidden" name="opinion" value="It's OK"/>
                    </div>
                </div>


                <!-- Q2 -->
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                <input type="hidden" name="hash"
                       value="<?php echo $product->hash; ?>">

                <div class="checkbox" style="padding:0;margin-top: 0;">
                    <div class="form-group <?php echo (!empty($validationErrorAr['q2']))
                        ? "has-error has-feedback" : ""; ?>">
                        <div class="well">
                            <p>2) Please choose all that apply <?php echo (!empty($validationErrorAr['q2']))
                                    ? " <br/><span class='invalid'>"
                                    . $validationErrorAr['q2'] . "</span>" : ""; ?></p>
                            <label>
                                <input type="checkbox"
                                       value="I would buy this for a friend" name="q2[]"
                                       style="margin:3px 5px 0 0;">
                                <p <?php echo (!empty($validationErrorAr['q2'])) ? "class='invalid_text'" : ""; ?>> I <b>would</b> buy this for a friend</p>
                            </label>
                            <label>
                                <input type="checkbox"
                                       value="I would buy this someone in my family"
                                       name="q2[]" style="margin:3px 5px 0 0;">

                                <p <?php echo (!empty($validationErrorAr['q2'])) ? "class='invalid_text'" : ""; ?>>I <b>would</b> buy this someone in my family</p>
                            </label>
                            <label>
                                <input type="checkbox"
                                       value="I'd quite like this for myself"
                                       name="q2[]" style="margin:3px 5px 0 0;">
                                <p <?php echo (!empty($validationErrorAr['q2'])) ? "class='invalid_text'" : ""; ?>>I'd quite like this for myself</p>
                            </label>
                            <label>
                                <input type="checkbox"
                                       value="I'd like to buy this for someone right now"
                                       name="q2[]" style="margin:3px 5px 0 0;">
                                <p <?php echo (!empty($validationErrorAr['q2'])) ? "class='invalid_text'" : ""; ?>>I'd like to buy this for someone right now</p>
                            </label>
                            <label>
                                <input type="checkbox"
                                       value="I've seen this product before" name="q2[]"
                                       style="margin:3px 5px 0 0;">
                                <p <?php echo (!empty($validationErrorAr['q2'])) ? "class='invalid_text'" : ""; ?>>I've seen this product before</p>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-6" style="padding-left:0;">
                <!-- Q3 -->
                <div class="form-group" id="spend">
                    <div class="form-group <?php echo (!empty($validationErrorAr['q3'])) ? "has-error has-feedback" : ""; ?>">
                        <div class="well">
                            <p class="pull-left">3) The most i would pay for this is: &nbsp;<?php echo (!empty($validationErrorAr['q3']))
                                    ? " <br/><span class='invalid'>"
                                    . $validationErrorAr['q3'] . "</span>" : ""; ?></p>
                            <div class="input-group col-lg-4 pull-left">
                                <span class="input-group-addon">£</span>
                                <input type="text" name="q3" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <!-- Q4 -->
                <div class="form-group">
                    <div class="well">
                        <p>4) Do you have other feedback on this product?</p>
                        <textarea class="form-control" rows="2"
                                  name="q4"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success pull-right">Next</button>
        </div>
        {{ Form::close() }}
    </div>
    @stop
</div>