@extends('templates.default')

@section('content')

@if($tov == 0)
    {{'Корзина пуста, но вы можете выбрать товар в '}}<a href="{{asset('/content')}}">каталоге</a>
@else


     <table class="table table-striped">
        <thead>
        <tr>
            <th><label for="Img" class="control-label">Img</label></th>
            <th><label for="Title" class="control-label">Title</label></th>
            <th><label for="Count" class="control-label">Количество</label></th>
            <th><label for="Action" class="control-label">Действие</label></th>
        </tr>
        </thead>
        <tbody>

        @foreach($tov as $v)
            <tr>
                <th>
                    <?php $image = $v->img ? ('uploads/s_'.$v->img):'default.jpg'; ?>
                    <img src="{{ asset('/public/media/'.$image) }}" class="img-circle" width="100" height="100" >
                </th>
                <th>{{ $v->title }}</th>
                <th>
                    <form id="count" action="{{asset('/basket/add/'.$v->id)}}" class="form-horizontal" role="form" method="POST">
                        {{csrf_field()}}
                        <ul style="display:inline">
                            <li style="float:left"><input id="count" size='20' type="number" class="form-control" name="count" value="{{$v->count}}"></li>
                            <li style="float:left"><input id="count" type="submit" class="btn btn-primary" value='Обновить' ></li>
                        </ul>
                    </form>
                </th>
                <th> <p><a href="{{'/basket/deleted/'. $v->id }}" >Удалить</a></p></th>
            </tr>
        @endforeach

        </tbody>
    </table>

<form id="order" method="POST" class="form-horizontal" role="form" action="/basket/buy">
    {{ csrf_field() }}
    <!--Начало input name -->
    <div class="form-group{{ $errors->has('fio') ? ' has-error' : '' }}" >
        <label for="fio" class="col-md-4 control-label">ФИО</label>

        <div class="col-md-6">
            <input id="fio" type="text" class="form-control" placeholder="Введи имя" name="fio" value=
            @if(!count($errors))
            @if(Auth::user())
            "{{ Auth::user()->name }}"
            @endif
            @else
            " {{ old('fio') }} ";
            @endif
            >
            @if ($errors->has('fio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fio') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <!--Конец input name -->

    <!--Начало input email -->
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
        <label for="fio" class="col-md-4 control-label">Почта</label>

        <div class="col-md-6">
            <input id="fio" type="email" class="form-control" name="email" placeholder="Введи почту" value=
            @if(!count($errors))
            @if(Auth::user())
            "{{ Auth::user()->email }}"
            @endif
            @else
            " {{ old('email') }} ";
            @endif
            >
            @if ($errors->has('fio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <!--Конец input email -->

    <!--Начало input phone -->
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}" >
        <label for="order" class="col-md-4 control-label">Телефон</label>

        <div class="col-md-6">
            <input id="fio" type="string" class="form-control" name="phone" placeholder="Введи номер телефона" value=
            @if(count($errors))
            " {{ old('phone') }} ";
            @endif
            >
            @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <!--Конец input phone -->
    <input id="order" type="hidden" class="form-control" name="status" value="new">
    <input id="order" type="hidden" class="form-control" name="user_id" value=
    @if(Auth::user())
        "{{ Auth::user()->id }}"
    @endif
    >
    <input id="order" type="hidden" class="form-control" name="zakaz" value="{{$_COOKIE['basket']}}">
    <button id="order" type="submit" class="btn btn-primary pull-right"  >
        Заказать
    </button>
 </form>
@endif
@endsection