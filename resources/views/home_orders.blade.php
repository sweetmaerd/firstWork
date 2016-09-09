@extends('layouts.app')

@section('form')
@if($orders == 0)
{{'Вы еще не делали заказов, но вы можете сделать заказ в '}}<a href="{{asset('/content')}}">каталоге</a>
@else
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Все статьи</div>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><label  class="control-label">ID</label></th>
                            <th><label  class="control-label">Имя</label></th>
                            <th><label  class="control-label">Email</label></th>
                            <th><label  class="control-label">Дата</label></th>
                            <th><label  class="control-label">Статус заказа</label></th>
                            <th><label  class="control-label">Количество товара</label></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $v)
                        <tr>
                            <th><a href="/home/order/{{ $v->id }}">{{ $v->id }}</a></th>
                            <th>{{ $v->fio }}</th>
                            <th>{{ $v->email }}</th>
                            <th>{{ 'Дата' }}</th>
                            <th>{{ $v->status }}</th>
                            <th>{{ $v->counts }}</th>

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