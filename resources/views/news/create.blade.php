@extends('layout')

@section('content')
@include('errors')
<div class="wrapper">
<h3>Форма создания новости</h3>
<form action="{{ route('news.add') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
    <label for="exampleFormControlInput1">Заголовок</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Текст</label>
    <textarea name="text" id="exampleFormControlTextarea1" class="form-control" cols="30" rows="10"></textarea>
</div>
    <div class="form-group">
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
</div>
    <input type="submit"  class="btn btn-success" value="Отправить">
    <a href="{{route('news.index')}}" class="btn btn-danger">Отменить</a>
</form>
</div>
@endsection