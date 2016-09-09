@extends('templates.default')

@section('content')   
    <table class="table table-striped">
        <thead>
        <tr>
            <th><label for="Img" class="control-label">Img</label></th>
            <th><label for="ID" class="control-label">ID</label></th>
            <th><label for="Title" class="control-label">Title</label></th>
            <th><label for="Description" class="control-label">Description</label></th>
            <th><label for="Category" class="control-label">Categories</label></th>
            <th><label for="Author" class="control-label">Author</label></th>
            <th><label for="URL" class="control-label">URL</label></th>
            <th><label for="Count" class="control-label">Количество</label></th>
        </tr>
        </thead>
        <tbody>
        @foreach($all as $v)
        <tr>
            <th>
                <?php $image = $v->img ? ('uploads/s_'.$v->img):'default.jpg' ?>
                <img src="{{ asset('/public/media/'.$image) }}" class="img-circle" width="100" height="100" >
            </th>
            <th>{{ $v->id }}</th>
            <th>{{ $v->title }}</th>
            <th>{{ $v->description }}</th>
            @if(isset($v->category->alias))
            <th><a href="/content/category/{{ $v->category->alias }}">{{ $v->category->alias }}</th>
            @endif
            <th>{{ $v->author }}</th>
            <th>{{ $v->url }}</th>
            <th>
                <form action="{{asset('/basket/add/'.$v->id)}}" lass="form-horizontal" role="form" method="POST">
                    {{csrf_field()}}
                    <input id="count" type="number" class="form-control" name="count" value="1" placeholder="1">
                    <button type="submit" class="btn btn-primary" >
                        Добавить
                    </button>
                </form>
            </th>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div align='center'>{{$all->render()}}</div>
@endsection