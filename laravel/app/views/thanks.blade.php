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

<div class="jumbotron">
    <h1>Thank you for your feedback!</h1>
    <p class="lead">If you would like to hear more about toowrappedup.com, you can join our mailing list</p>
    {{ Form::open(array('url' => '/mailing')) }}
    <div class="form-group">
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email to join our mailing list">
    </div>
    <p><a class="btn btn-lg btn-success" href="#" role="button">Join Mailing List</a></p>
    {{ Form::close() }}

</div>




@stop