@extends('layouts.app')

@section('form')
@if($tov == 0)
{{'Вы еще не делали заказов, но вы можете сделать заказ в '}}<a href="{{asset('/content')}}">каталоге</a>
@else
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Все статьи<lable class="pull-right"><a href="/redirect/back">Назад к заказам</a></lable></div>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><label for="Img" class="control-label">Img</label></th>
                            <th><label for="Title" class="control-label">Title</label></th>
                            <th><label for="Description" class="control-label">Описание</label></th>
                            <th><label for="Count" class="control-label">Количество</label></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($tov as $v)
                        <tr>
                            <th>
                                <img src="{{ asset('/public/media/uploads/'.$v->img) }}" class="img-circle" width="100" height="100" >
                            </th>
                            <th>{{ $v->title }}</th>
                            <th>{{ $v->description }}</th>
                            <th>{{ $v->count }}</th>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endif

@endsection