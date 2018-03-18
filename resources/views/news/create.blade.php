@extends('layout')

@section('content')
<h3>Форма создания новости</h3>
<form action="{{ route('news.add') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="title">Заголовок</label>
    <input type="text" name="title" id="title">
    <label for="text">Текст</label>
    <textarea name="text" id="text" cols="30" rows="10"></textarea>
    <input type="file" name="image">
    <input type="submit" value="Отправить">
</form>
<a href="{{route('news.index')}}">Отменить</a>
@endsection