@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts._partials.alerts')
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{ route('put-news', $news->slug), }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                  <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" value="{{ $news->title }}" name="title">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select form-control" name="category_id" aria-label="Default select example">
                        @foreach ($categorys as $category)
                            <option value="{{$category->id}}"
                            @if ($category->id == $news->category_id)
                                selected
                            @endif>{{ $category->category }}</option>  
                        @endforeach
                      </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Banner</label>
                    <br>
                    <img src="{{ asset('storage/' . $news->banner) }}" style="max-width: 300px" alt="banner">
                    <br>
                    <input type="file" name="banner" class="form-control" value="{{ $news->banner }}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="content" class="form-control">{{ $news->content }}</textarea>
                  </div>
                  <a href="{{ route('admin') }}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
