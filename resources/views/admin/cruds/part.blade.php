@extends('layouts.admin')

@section('script')
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery-timepicker-1.3.2/jquery.timepicker.min.js') }}"></script>
@endsection

@section('style')
    <link href="{{ URL::asset('public/js/jquery-timepicker-1.3.2/jquery.timepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    {!! Form::open(array('url' => 'part', 'method' => 'post', 'role' => 'form')) !!}

        <div class="form-group">
            {!! Form::label('partname', 'Part name') !!}
            {!! Form::text('partname', '', array('class' => 'form-control')) !!}
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
