@extends('layout')
@section('title','Page Child')
@section('sidebar')
@parent
this is layout child sidebar
@endsection
@section('content')
<h1>Content of child</h1>
@endsection