@extends('layout')

@section('content')
<table>
    @if(isset($all))
    <h3>Все новости</h3>
    @foreach ($all as $item)
    <tr>
        <td><a href="{{ route('news.view',$item->id) }}">{{ $item->title }}</a></td>
        <td><a href="{{ route('news.edit',$item->id) }}">Редактировать</a></td>
        <td><a href="{{ route('news.destroy',$item->id) }}">Удалить</a></td>
    </tr>
    @endforeach
    @else
    <h3>Нет добавленных новостей!</h3>
    @endif
</table>
<a href="{{ route('news.index') }}">На главную</a>
@endsection