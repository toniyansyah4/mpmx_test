@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts._partials.alerts')
    <div class="row justify-content-center">
        @if(Auth::user()->level_id == 1)
        <div class="col-md-12 pb-2">
                <a href="{{route('add-category')}}" class="btn btn-primary">add Category</a>
        </div>
        @endif
        <div class="col-md-12">
            <div class="card-header">{{ __('Category') }}</div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Category</th>
                            <th scope="col">Option</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($categorys as $category)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{$category->category}}</td>
                                <td>
                                    <a href="{{ route('read-category', $category->slug) }}" class="btn btn-info">Read</a>
                                    @if(Auth::user()->level_id == 1)
                                    <a href="{{ route('edit-category', $category->slug) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('destroy-category', $category->slug) }}" class="btn btn-danger">Hapus</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
