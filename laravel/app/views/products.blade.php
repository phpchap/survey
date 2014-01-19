@extends('layouts.master')
@section('navigation')
<div class="header">
    <ul class="nav nav-pills pull-right">
        <li><?php echo link_to('/', 'Home'); ?></a></li>
        <li class="active"><?php echo link_to('/products', 'Gift Chooser'); ?></li>
        <li><?php echo link_to('/about-us', 'About Us'); ?></li>
    </ul>
    <h3 class="text-muted">TooWrappedUp</h3>
</div>
@stop

@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Gift Chooser</li>
    </ol>
</div>

<h1><?php echo $product->title; ?></h1>

<div class="row">

    <div class="col-lg-12">        
        <div class="col-sm-6 col-md-4 col-lg-6">
            <div class="thumbnail">
                <img src="<?php echo $product->picture_url_1; ?>" alt="<?php echo $product->title; ?>" title="<?php echo $product->title; ?>">
                <div class="caption">
                    <small><?php echo $product->description; ?></small>
                </div>
            </div>
        </div>        

        <div class="col-sm-6 col-md-4 col-lg-6">
            
            {{ Form::open(array('url' => '/products')) }}            
                
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                <input type="hidden" name="hash" value="<?php echo $product->hash; ?>">
                
                <div class="form-group">
                    <div class="well">
                        <h4>What do you think about this?</h4>
                        <input type="text" class="span2" value="1" id="slider" >
                        <p id="opinion_text">I don't really like this</p>
                        <input type="hidden" name="q1" value="" id="opinion">
                    </div>
                </div>

                <div class="checkbox" style="padding:0">
                    <div class="well">
                        <h4>Tick all that apply</h4>
                        <label>
                            <input type="checkbox" value="I wouldnt buy this for friends or family" name="q2[]" style="margin:3px 5px 0 0;">
                            <p>I <b>wouldn't</b> buy this</p>
                        </label>
                        <label>
                            <input type="checkbox" value="I would buy this for a friend" name="q2[]" style="margin:3px 5px 0 0;">
                            <p>I <b>would</b> buy this for a friend</p>
                        </label>
                        <label>
                            <input type="checkbox" value="I would buy this someone in my family" name="q2[]" style="margin:3px 5px 0 0;">
                            <p>I <b>would</b> buy this someone in my family</p>
                        </label>
                        <label>
                            <input type="checkbox" value="I'd quite like this for myself" name="q2[]" style="margin:3px 5px 0 0;">
                            <p>I'd quite like this for myself</p>
                        </label>
                        <label>
                            <input type="checkbox" value="I'd like to buy this for someone right now" name="q2[]" style="margin:3px 5px 0 0;">
                            <p>I'd like to buy this for someone right now</p>
                        </label>
                        <label>
                            <input type="checkbox" value="I've seen this product before" name="q2[]" style="margin:3px 5px 0 0;">
                            <p>I've seen this product before</p>
                        </label>
                        <label>
                            <input type="checkbox" value="This is the first time I've seen this product" name="q2[]" style="margin:3px 5px 0 0;">
                            <p>This is the first time I've seen this product</p>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="well">
                        <p>I would be prepared to spend a maximum of</p>
                        <div class="input-group">
                            <span class="input-group-addon">£</span>
                            <input type="text" name="q3" class="form-control">
                        </div>
                        <p>on this</p>
                    </div>
                </div>                

                <div class="form-group">
                    <p>Do you have any other feedback on this product?</p>
                    <textarea class="form-control" rows="2" name="q4"></textarea>
                </div>

                <button type="submit" class="btn btn-success pull-right">Next</button>

            {{ Form::close() }}

        </div>
        @stop