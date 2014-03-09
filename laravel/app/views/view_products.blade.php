@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <h4>Questionaire Progress</h4>
    </div>
    <div class="col-lg-8">
        <div class="progress progress-striped">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="sr-only">100% Complete</span>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron">
    <h1>Thank you for completing the gift survey!</h1>
    <p class="lead">We’d be grateful if you could now give your feedback on some products</p>
    {{ Form::open(array('url' => '/survey')) }}
    <input type="hidden" value="1" name="c">
    <input type="submit" class="btn btn-lg btn-success" value="Enter the Product Survey" role="button">
    {{ Form::close() }}
</div>
@stop