@extends('layout')

@section('content')
<h3><a href="{{ route('news.create') }}">Создать новость</a></h3>
@if(count($lastNews)>0)
<h3><a href="{{ route('news.show') }}">Редактировать</a></h3>
<h3>Последние новости</h3>
<table> 
    @foreach ($lastNews as $item)
    <tr>
        @if (date('d',time())==date('d',strtotime($item->updated_at)))
        <td>{{date('H:i',strtotime($item->updated_at))}}</td>
        @else
        <td>{{date('d M',strtotime($item->updated_at))}}</td>
        @endif
        <td><a href="{{ route('news.view',$item->id) }}">{{ $item->title }}</a></td>
    </tr>
    @endforeach
</table>
@else
<h3>Нет добавленных новостей!</h3>
@endif
@endsection