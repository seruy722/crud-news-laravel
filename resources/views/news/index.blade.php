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
            <td><span class="badge badge-pill badge-secondary">{{date('H:i',strtotime($item->updated_at))}}</span><a href="{{ route('news.view',$item->id) }}" class="badge badge-light size">{{ $item->title }}</a></td>
            @else
            <td><span class="badge badge-pill badge-secondary">{{date('d M',strtotime($item->updated_at))}}</span><a href="{{ route('news.view',$item->id) }}" class="badge badge-light size">{{ $item->title }}</a></td>
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