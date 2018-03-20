@extends('layout')

@section('content')
<div class="wrapper">
<table class=" table table-bordered">
    @if(isset($all))
    <h3>Все новости</h3>
    @foreach ($all as $item)
    <tr>
        <td>{{ $item->title }}</td>
        <td><a href="{{ route('news.view',$item->id) }}" class="btn btn-info">Просмотр</a></td>
        <td><a href="{{ route('news.edit',$item->id) }}" class="btn btn-warning">Редактировать</a></td>
        <td><a href="{{ route('news.destroy',$item->id) }}" class="btn btn-danger">Удалить</a></td>
    </tr>
    @endforeach
    @else
    <h3>Нет добавленных новостей!</h3>
    @endif
</table>
<a href="{{ route('news.index') }}" class="btn btn-primary">На главную</a>
</div>
@endsection