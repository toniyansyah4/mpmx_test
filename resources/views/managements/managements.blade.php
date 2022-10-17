@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        @if(Auth::user()->level_id == 1)
            <div class="col-md-12 pb-2">
                <a href="{{route('add-management')}}" class="btn btn-primary">Add Management</a>
            </div>
        @endif
        @foreach ($managements as $management)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <p class="card-text">Nama : <b>{{ $management->user->name }}</b></p>
                    <p class="card-text">Jabatan : <b>{{ $management->position }}</b></p>
                    <p class="card-text">Divisi : <b>{{ $management->divisi->name }}</b></p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('read-management', $management->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                        @if(Auth::user()->level_id == 1)
                        <a href="{{ route('edit-management', $management->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <a href="{{ route('destroy-management', $management->id) }}" class="btn btn-sm btn-outline-secondary">Delete</a>
                        @endif
                    </div>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($management->created_at)->diffForHumans() }}</small>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
