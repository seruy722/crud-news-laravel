@extends('layout')

@section('content')
<div class="wrapper">
    <div>
        <h2 class="title">{{ $one->title }}</h2>
        <div class="img"><img src="{{asset('images/'.$one->image_name)}}" alt="img"></div>
        <p class="text-justify">{{ $one->description }}</p>
    </div>
    <a href="{{route('news.show')}}" class="btn btn-danger">Отменить</a>
    <a href="{{ route('news.edit',$one->id) }}" class="btn btn-warning">Редактировать</a>
    <a href="{{ route('news.destroy',$one->id) }}" class="btn btn-danger">Удалить</a>
    <a href="{{ route('news.index') }}" class="btn btn-primary">На главную</a>
</div>
@endsection