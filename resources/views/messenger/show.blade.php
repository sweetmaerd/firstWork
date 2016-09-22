@extends('layouts.master')
@section('script')
@parent
<script type="text/javascript" src={{asset("js/realtime.js")}}></script>
@stop
@section('content')
<div class="col-md-6 ">
    <h1>{{ $thread->subject }}</h1>
<div class="messageses">
    @foreach($thread->messages as $message)
    <div class="media">
        <a class="pull-left" href="#">
            <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64" alt="{{ $message->user->name }}" class="img-circle">
        </a>
        <div class="media-body">
            <h5 class="media-heading">{{ $message->user->name }}</h5>
            <p>{{ $message->body }}</p>
            <div class="text-muted"><small>Posted {{ $message->created_at->diffForHumans() }}</small></div>
        </div>
    </div>
    @endforeach
    <div id="pusto"></div>
    <h2>Add a new message</h2>
    {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
    <!-- Message Form Input -->
    <div class="form-group">
        {!! Form::textarea('message', null, ['class' => 'form-control', 'id'=>'send-message']) !!}
    </div>

    @if($users->count() > 0)
    <div class="checkbox">
        @foreach($users as $user)
        <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->name }}</label>
        @endforeach
    </div>
    @endif

    <!-- Submit Form Input -->
    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
    <div>
        <input type="text" id="send-message">
</div>
@stop