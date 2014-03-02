@extends('layouts.master')
@section('navigation')
<div class="header">
    <ul class="nav nav-pills pull-right">
        <li class="active"><?php echo link_to('/', 'Home'); ?></a></li>
        <li><?php echo link_to('/questions', 'Start Questionaire'); ?></li>
        <li><?php echo link_to('/about-us', 'About Us'); ?></li>
    </ul>
    <h3 class="text-muted">TooWrappedUp</h3>
</div>
@stop

@section('content')
    <div class="jumbotron">
        <h1>Gift Chooser</h1>
        <p class="lead">We would value your opinion on a selection of gifts, wrapping paper & greetings cards</p>
        <p class="lead">Please be honest - we won't be offended if you don't like something, it's all part of the process for us!</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Get Started</a></p>
    </div>
@stop