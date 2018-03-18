@extends('layout')

@section('content')
<h3><a href="{{ route('news.create') }}">Создать новость</a></h3>
@if(count($lastNews)>0)
<h3><a href="{{ route('news.show') }}">Редактировать</a></h3>
<h3>Последние новости</h3>
    <ul> 
            @foreach ($lastNews as $item)
                <li>
                    <td><a href="{{ route('news.view',$item->id) }}">{{ $item->title }}</a></td>
                </li>
            @endforeach
        
            </ul>
    @else
    <h3>Нет добавленных новостей!</h3>
@endif
@endsection