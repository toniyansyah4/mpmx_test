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
                <a href="{{route('add-news')}}" class="btn btn-primary">Add News</a>
            </div>
        @endif
        @foreach ($news as $berita)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{ asset('storage/' . $berita->banner) }}" style="max-width: 300px;" alt="banner" data-holder-rendered="true">
                <div class="card-body">
                    <p class="card-text">{{ $berita->content }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('read-news', $berita->slug) }}" class="btn btn-sm btn-outline-secondary">View</a>
                        @if(Auth::user()->level_id == 1)
                        <a href="{{ route('edit-news', $berita->slug) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <a href="{{ route('destroy-news', $berita->slug) }}" class="btn btn-sm btn-outline-secondary">Delete</a>
                        @endif
                    </div>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($berita->created_at)->diffForHumans() }}</small>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
