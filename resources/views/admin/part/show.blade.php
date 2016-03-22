@extends('layouts.admin')

@section('content')

    <a href="{{ route('part.index') }}" class="btn btn-link">Back</a>
    
    <h1>{{ $part->name }}</h1>

    <p class="lead">{{ $part->description }}</p>

    <span>{{ $part->start }} - {{ $part->finish }}</span>

@endsection
