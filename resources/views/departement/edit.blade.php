@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts._partials.alerts')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('put-departement', $departement->id), }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $departement->name }}" name="name">
                  </div>
                  <a href="{{ route('departement') }}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
