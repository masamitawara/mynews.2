@extends('NewsController')

@section('News', 'home')

@section('content')
    <h1>{{ $news->id }}</h1>
    <p>{!! nl2br(e($news->id)) !!}</p>
@endsection