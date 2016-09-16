@extends('templates.default')

@section('content')

        <div class="row">

            <div class="col-sm-5 news">
                <h3 style="border-top: 3px solid red"></h3sty>
                @foreach($news as $v)
                    <div id="{{$v->id}}" class=" index_content">
                        <div class="row">
                            <div id="img_content" class="col-sm-5">
                                <img class="img-thumbnail img_content" src="/public/media/uploads/{{$v->img}}" alt="{{$v->title}}">
                            </div>
                            <div class="text_content" class="col-sm-6">
                                <div id="title"><h3>{{$v->title}}</h3></div>
                                <div id="description">{{$v->description}}</div>
                                <div id="about" class="row">
                                    <div id="author" class="col-sm-2"><h4><small>{{$v->author}}</small></h4></div>
                                    <div id="date" class="col-sm-2"><h5><small>{{'дата'}}</small></h5></div>
                                    <div id="view" class="col-sm-1"><h5><small>{{'100'}}</small></h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-sm-5 news">
                <h3 style="border-top: 3px solid blue"></h3sty>
                @foreach($news as $v)
                    <div id="{{$v->id}}" class=" index_content">
                        <div class="row">
                            <div id="img_content" class="col-sm-5">
                                <img class="img-thumbnail img_content" src="/public/media/uploads/{{$v->img}}" alt="{{$v->title}}">
                            </div>
                            <div class="text_content" class="col-sm-6">
                                <div id="title"><h3>{{$v->title}}</h3></div>
                                <div id="description">{{$v->description}}</div>
                                <div id="about" class="row">
                                    <div id="author" class="col-sm-2"><h4><small>{{$v->author}}</small></h4></div>
                                    <div id="date" class="col-sm-2"><h5><small>{{'дата'}}</small></h5></div>
                                    <div id="view" class="col-sm-1"><h5><small>{{'100'}}</small></h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>




            <div class="col-sm-2">
                <h3 style="border-top: 3px solid lightgrey"></h3sty>
                <div><h1><span>Sidebar</span></h1></div>
            </div>
        </div>
@endsection