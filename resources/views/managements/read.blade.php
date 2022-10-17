@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <p class="card-text">Nama : <b>{{ $management->user->name }}</b></p>
                    <p class="card-text">Jabatan : <b>{{ $management->position }}</b></p>
                    <p class="card-text">Direktur : <b>{{ $management->direktur->name }}</b></p>
                    <p class="card-text">Departement : <b>{{ $management->departement->name }}</b></p>
                    <p class="card-text">Divisi : <b>{{ $management->divisi->name }}</b></p>
                    <p class="card-text">Jobdesc : <b>{{ $management->jobdesc }}</b></p>
                    <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{ \Carbon\Carbon::parse($management->created_at)->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
            <a href="{{ route('management') }}" class="btn btn-danger">Back</a>
        </div>
    </div>
</div>
@endsection
