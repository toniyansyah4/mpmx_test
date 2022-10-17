@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pb-2">
                <a href="{{ route('departement') }}" class="btn btn-danger">Back</a>
        </div>
        <div class="col-md-8">
            <div class="mb-3">
            <label class="form-label">Departement</label>
            <input type="text" class="form-control" value="{{ $departement->name }}" name="name">
            </div>
        </div>
    </div>
</div>
@endsection
