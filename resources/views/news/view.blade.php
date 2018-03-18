@extends('layout')

@section('content')
<div>
<div class="title">{{ $one->title }}</div>
    <div class="img"><img src="{{asset('images/'.$one->image_name)}}" alt="img"></div>
    <div class="text">{{ $one->text }}</div>
</div>
<a href="{{ route('news.index') }}">Назад</a>
@endsection