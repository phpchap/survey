@extends('layouts.master')
@section('navigation')
<div class="header">
    <ul class="nav nav-pills pull-right">
        <li><?php echo link_to('/', 'Home'); ?></a></li>
        <li><?php echo link_to('/products', 'Gift Chooser'); ?></li>
        <li class="active"><?php echo link_to('/about-us', 'About Us'); ?></li>
    </ul>
    <h3 class="text-muted">TooWrappedUp</h3>
</div>
@stop

@section('content')
<div class="jumbotron">
    <h1>About Us!</h1>
    <p class="lead"></p>
</div>
@stop