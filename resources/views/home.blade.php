@extends('layouts.app')
@section('scripts')
@parent
<script src={{asset("js/protect.js")}}></script>
@show
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Все статьи</div>
                    <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Check</th>
                                    <th>Img</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Categories</th>
                                    <th>Author</th>
                                    <th>URL</th>
                                    <th>Date</th>
                                    <th>Showhide</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($content as $v)
                                        <tr>
                                            <th><div class="checkbox">
                                                    <label><input type="checkbox" name="id[]" value="{{$v->id}}"></label>
                                                </div></th>
                                            <th>
                                                <?php $image = $v->img ? ('s_'.$v->img):'user.png' ?>
                                                <img src="{{ asset('/public/media/uploads/'.$image) }}" class="img-circle" width="100" height="100"" >
                                            </th>
                                            <th>{{ $v->id }}</th>
                                            <th>{{ $v->title }}</th>
                                            <th>{{ $v->description }}</th>
                                            <th>{{ $v->categories_id }}</th>
                                            <th>{{ $v->author }}</th>
                                            <th>{{ $v->url }}</th>
                                            <th>{{ $v->date }}</th>
                                            <th>{{ $v->showhide }}</th>
                                            <th>
                                                <p><a href="#" onClick = "dele('{{'home/delete/'. $v->id }}','Точно удалить?')" >Удалить</a></p>
                                                <p><a href={{ asset('home/update/'.$v->id) }}>Редактировать</a></p>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <div align = 'center'>{!! $content->render() !!}</div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection