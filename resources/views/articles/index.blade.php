@extends('layouts.app')
@section('content')
<?php
foreach ($errors->all() as $message) {
    echo '<p>' . $message . '</p>';
}
?>
@foreach($articles as $art)
<h2>{{ $art->title }}</h2>
<small>{{ $art->created_at }}</small>
<p>{{ $art->body }}</p>
<p><a href="#">modifier</a></p>    
@endforeach
@stop