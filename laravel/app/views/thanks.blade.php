@extends('layouts.master')
@section('navigation')
<div class="header">
    <ul class="nav nav-pills pull-right">
        <li><?php echo link_to('/', 'Home'); ?></a></li>
    </ul>
    <h3 class="text-muted">TooWrappedUp</h3>
</div>
@stop

@section('content')
<div class="jumbotron">
    <h1>Thank you for your feedback!</h1>
    <?php if($sent == true) { ?>
        <p class="lead">We'll let you know as soon as we go live!</p>
    <?php } else { ?>
        {{ Form::open(array('url' => '/thanks')) }}
        <div class="form-group">
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email to join our mailing list">
            <p><label class="checkbox-inline"><input type="checkbox" name="opt_in" id="q5" value="yes">Let me know when TooWrappedUp.com launches</label></p>
        </div>
        <p><input type="submit" class="btn btn-lg btn-success" value="Enter John Lewis Voucher Draw"/></p>
        {{ Form::close() }}
    <?php } ?>
</div>
@stop