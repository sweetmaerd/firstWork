@extends('templates.default')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Img</th>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Categories</th>
            <th>Author</th>
            <th>URL</th>
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
            <th>{{ $v->category->alias }}</th>
            @endif
            <th>{{ $v->author }}</th>
            <th>{{ $v->url }}</th>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div align='center'>{{$all->render()}}</div>
@endsection