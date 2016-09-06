@extends('layouts.app')

@section('form')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Флрма редактирования статей</div>

                <div class="panel-body">
                    @if(count($errors))
                        @foreach($errors as $err)
                        <p>{{$err}}</p>
                        @endforeach
                    @endif

                    <!--Начало формы -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/home/update/'.$entery->id) }}" enctype = 'multipart/form-data'>
                        {{ csrf_field() }}

                        <!--Начало input title -->
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}" >
                            <label for="title" class="col-md-4 control-label">Нзвание статьи*</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value=
                                @if(!count($errors))
                                    "{{ $entery->title }}";
                                @else
                                    "{{ old('title') }}";
                                @endif
                                placeholder="Введи название">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Конец input title -->

                        <!--Начало input description -->
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Текст статьи*</label>

                            <div class="col-md-6">
                                <textarea id="description"
                                          class="form-control" name="description" placeholder="Вы что-то хотели написать?">@if(!count($errors)){{$entery->description}}@else{{old('description')}}@endif</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Конец input description -->

                        <!--Начало select categories_id -->
                        <div class="form-group{{ $errors->has('categories_id') ? ' has-error' : '' }}">
                            <label for="categories_id" class="col-md-4 control-label">Категория*</label>

                            <div class="col-md-6">
                                <p><select id="categories_id" class="form-control" name="categories_id"  >

                                        @foreach($category as $cat)
                                        <option
                                            @if($cat->id == $entery->categories_id )
                                                {{ 'selected' }}
                                            @endif
                                        value= {{ $cat->id }} >{{ $cat->alias }}</option>
                                        @endforeach
                                    </select></p>

                                @if ($errors->has('categories_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categories_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Конец select categories_id -->

                        <!--Начало input URL -->
                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}" >
                            <label for="url" class="col-md-4 control-label">ЧПУ адрес</label>

                            <div class="col-md-6">
                                <input id="url" type="text" class="form-control" name="url" value=
                                    @if(!count($errors))
                                    "";
                                    @else
                                    "{{ old('url') }}";
                                    @endif
                                placeholder="Оставьте пустым, если не хотите менять URL ">

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Конец input URL -->

                        <!--Начало select showhide -->
                        <div class="form-group{{ $errors->has('showhide') ? ' has-error' : '' }}">
                            <label for="showhide" class="col-md-4 control-label">Видимость записи</label>

                            <div class="col-md-6">
                                <p><select id="showhide" class="form-control" name="showhide">
                                        @if('show' == $entery->showhide )
                                            <option selected value='show'>Показать</option>
                                            <option value= 'hide' >Скрыть</option>
                                        @else
                                            <option value='show'>Показать</option>
                                            <option selected value= 'hide' >Скрыть</option>
                                        @endif
                                    </select>
                                </p>

                                @if ($errors->has('showhide'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('showhide') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Конец select showhide -->


                        <!--Начало input img -->
                        <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                            <label for="img" class="col-md-4 control-label">
                                @if($entery->img)
                                    {{'Картинка есть. Обновить.'}}
                                   @else
                                   {{'Добавить изображения'}}
                                   @endif
                            </label>

                            <div class="col-md-6">
                                <input id="img" type="file"  name="picture1">

                                @if ($errors->has('img'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Конец input img -->
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" >
                                     Сохранить
                                </button>
                            </div>
                        </div>

                        <span class="help-block">
                            @if(count($errors))
                             <strong>Поля помеченые * обязательны для заполнения</strong>
                            @endif

                        </span>

                    </form>
                    <!--Конец формы -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection