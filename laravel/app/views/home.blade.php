@extends('layouts.master')
@section('navigation')
<div class="header">
    <ul class="nav nav-pills pull-right">
        <li class="active"><?php echo link_to('/', 'Home'); ?></a></li>
        <li><?php echo link_to('/survey', 'Start Survey'); ?></li>
    </ul>
    <h3 class="text-muted">TooWrappedUp</h3>
</div>
@stop

@section('content')
    <div class="jumbotron">
        <h1>Gifting and Product Survey</h1>
        <p class="lead">We’re launching a new website selling gifts, wrapping paper and cards. We’d be grateful if you could complete a short survey for us and then give your feedback on some products.</p>
        <p class="lead">Please be honest – we won’t be offended if you don’t like something, it’s all part of the process for us!</p>
        <p class="lead">As a thank you for taking part in the survey, we’ll pick one recipient at random to win a £20 John Lewis voucher</p>
        <p><a class="btn btn-lg btn-success" href="/survey" role="button">Get Started</a></p>
    </div>
@stop