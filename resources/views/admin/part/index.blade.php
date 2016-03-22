@extends('layouts.admin')

@section('content')

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

    <a href="/part/create" class="btn btn-success">New</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Period</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parts as $part)
                <tr>
                    <td>{{ $part->id }}</td>
                    <td>{{ $part->name }}</td>
                    <td>{{ $part->description }}</td>
                    <td>{{ $part->start }} - {{ $part->finish }}</td>
                    <td>
                        <a href="{{ route('part.show', $part->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('part.edit', $part->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        {{ Form::open([
                            'method' => 'DELETE',
                            'route' => ['part.destroy', $part->id]
                            ])
                        }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
