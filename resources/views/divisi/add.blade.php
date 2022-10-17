@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts._partials.alerts')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('post-divisi') }}" method="POST">
                @csrf
                  <div class="mb-3">
                    <label class="form-label">Nama Divisi</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                  <a href="{{ route('divisi') }}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
