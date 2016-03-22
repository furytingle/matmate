@extends('layouts.admin')

@section('content')

@include('partial.alerts.error')

    <a href="{{ route('part.index') }}" class="btn btn-link">Back</a>
    
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    {!! Form::open(array('url' => 'part', 'method' => 'post', 'role' => 'form')) !!}

        <div class="form-group">
            {!! Form::label('name', 'Part name') !!}
            {!! Form::text('name', '', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('desciption', 'Description') !!}
            {!! Form::textarea('description', '', array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('start', 'Start time') !!}
            <select class="form-control" id="start" name="start">
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('finish', 'Finish time') !!}
            <select class="form-control" id="finish" name="finish">
            </select>
        </div>

        <button type="submit" class="btn btn-success">New Part</button>

    {!! Form::close() !!}

@endsection
