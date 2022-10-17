@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts._partials.alerts')
    <div class="row justify-content-center">
        @if(Auth::user()->level_id == 1)
        <div class="col-md-12 pb-2">
            <a href="{{route('add-divisi')}}" class="btn btn-primary">Add Divisi</a>
        </div>
        @endif
        <div class="col-md-12">
            <div class="card-header">{{ __('Divisi') }}</div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Option</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($divisi as $divisii)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{$divisii->name}}</td>
                                <td>
                                    <a href="{{ route('read-divisi', $divisii->id) }}" class="btn btn-info">Read</a>
                                    @if(Auth::user()->level_id == 1)
                                    <a href="{{ route('edit-divisi', $divisii->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('destroy-divisi', $divisii->id) }}" class="btn btn-danger">Hapus</a>
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
