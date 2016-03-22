@extends('layouts.admin')


@section('content')

    <a href="{{ route('part.index') }}" class="btn btn-link">Back</a>
    
    <h2>Editing</h2>
    <h1>{{ $part->name }}</h1>

    @include('partial.alerts.error')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    {{ Form::model($part, [
        'method' => 'Patch',
        'route' => ['part.update', $part->id]
    ]) }}

        <div class="form-group">
            {!! Form::label('name', 'Part name') !!}
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('desciption', 'Description') !!}
            {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('start', 'Start time') !!}
            <select class="form-control" id="start" name="start">
                <option selected>{{ $part->start }}</option>
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('finish', 'Finish time') !!}
            <select class="form-control" id="finish" name="finish">
                <option selected>{{ $part->finish }}</option>
            </select>
        </div>

        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@endsection
