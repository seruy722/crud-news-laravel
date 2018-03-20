@extends('layout')

@section('content')
<div class="wrapper">
<a href="{{ route('news.create') }}" class="btn btn-success">Создать новость</a>
@if(count($lastNews)>0)
<a href="{{ route('news.show') }}" class="btn btn-warning">Редактировать</a>
<h3>Последние новости</h3>
<table class="table table-striped"> 
    @foreach ($lastNews as $item)
    <tr>
        @if (date('d',time())==date('d',strtotime($item->updated_at)))
        <td><h3>{{date('H:i',strtotime($item->updated_at))}}<a href="{{ route('news.view',$item->id) }}">{{ $item->title }}</a></h3></td>
        @else
        <td><h3>{{date('d M',strtotime($item->updated_at))}}<a href="{{ route('news.view',$item->id) }}">{{ $item->title }}</a></h3></td>
        @endif
    </tr>
    @endforeach
</table>
@else
<h3>Нет добавленных новостей!</h3>
@endif
{{$lastNews->links()}}
</div>
@endsection