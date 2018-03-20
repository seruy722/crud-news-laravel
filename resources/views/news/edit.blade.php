@extends('layout')

@section('content')
@include('errors')
<div class="wrapper">
<h3>Форма редактирования новости</h3>
<p>Пользователь # - {{$one->id}}</p>

<form action="{{ route('news.update',$one->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
    <label for="exampleFormControlInput1">Заголовок</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $one->title }}">
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Текст</label>
    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" cols="30" rows="10">{{ $one->text }}</textarea>
</div>
    <div class="form-group">
    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
</div>
    <input type="submit" value="Отправить" class="btn btn-success">
    <a href="{{route('news.show')}}" class="btn btn-danger">Отменить</a>
    <a href="{{ route('news.index') }}" class="btn btn-primary">На главную</a> 
</form>
<img src="{{asset('images/'.$one->image_name)}}" alt="img" class="img">
</div>
@endsection