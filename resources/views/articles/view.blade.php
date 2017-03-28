@extends('layouts.app')
@section('content')
<?php
foreach ($errors->all() as $message) {
    echo '<p>' . $message . '</p>';
}
?>
@if(Session::has('message')) 
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif
{!! Form::open(['url' => route('add_article'),'method' => 'post']) !!}

<input type="text" name="title"><br><br>
<textarea name="body" rows="8" cols="30"></textarea><br><br>
<button type="submit">Save</button>
{!! Form::close() !!}
@stop