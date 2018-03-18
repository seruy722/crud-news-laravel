@extends('layout')

@section('content')
    <h3>Форма редактирования новости</h3>
<p>Пользователь # - {{$one->id}}</p>
    @include('errors')
    <form action="{{ route('news.update',$one->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="title">Заголовок</label>
    <input type="text" name="title" id="title" value="{{ $one->title }}">
        <label for="text">Текст</label>
        <textarea name="text" id="text" cols="30" rows="10">{{ $one->text }}</textarea>
        <input type="file" name="image">
        <input type="submit" value="Отправить">
    </form>
    <p><img src="{{asset('images/'.$one->image_name)}}" alt="img"></p>
    <a href="{{route('news.show')}}">Отменить</a>
    <a href="{{ route('news.index') }}">На главную</a>
@endsection