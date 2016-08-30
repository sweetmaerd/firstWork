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
                                <input id="title" type="text" class="form-control" name="title" value="{{ $entery->title }}" placeholder="Введи название">

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
                                          class="form-control" name="description" placeholder="Вы что-то хотели написать?">{{ $entery->description }}
                                </textarea>

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
                                            @if($cat->id == $entery->categories_id )
                                                <option selected value= {{ $cat->id }} >{{ $cat->description }}</option>
                                            @else
                                                <option value= {{ $cat->id }} >{{ $cat->description }}</option>
                                            @endif
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

                        <!--Начало input date -->
                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}" >
                            <label for="date" class="col-md-4 control-label">Дата мероприятия</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="{{ $entery->date }}">

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Конец input date -->

                        <!--Начало input URL -->
                        <div class="form-group{{ $errors->has('URL') ? ' has-error' : '' }}" >
                            <label for="URL" class="col-md-4 control-label">ЧПУ адрес</label>

                            <div class="col-md-6">
                                <input id="URL" type="text" class="form-control" name="URL" value="{{ $entery->url }}" placeholder="kak-zarabotat-mnogo-deneg">

                                @if ($errors->has('URL'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('URL') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Конец input URL -->

                        <!--Начало input author -->
                        <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}" >
                            <label for="author" class="col-md-4 control-label">Автор статьи</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author" value="{{ $entery->author }}" placeholder="Например John">

                                @if ($errors->has('author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Конец input author -->

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
                            <label for="img" class="col-md-4 control-label">Добавить изображения</label>

                            <div class="col-md-6">
                                <input id="img" type="file"  name="img">

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