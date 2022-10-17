@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts._partials.alerts')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('put-management', $management->id), }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="mb-3">
                    <label class="form-label">Nama Karyawan</label>
                    <select class="form-select form-control" name="user_id" aria-label="Default select example">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}"
                            @if ($user->id == $management->user_id)
                                selected
                            @endif>{{ $user->name }}</option>  
                        @endforeach
                    </select>
                </div> 
                <div class="mb-3">
                    <label class="form-label">Nama Direktur</label>
                    <select class="form-select form-control" name="direktur_id" aria-label="Default select example">
                        @foreach ($direkturs as $direktur)
                            <option value="{{$direktur->id}}"
                            @if ($direktur->id == $management->direktur_id)
                                selected
                            @endif>{{ $direktur->name }}</option>  
                        @endforeach
                    </select>
                </div>  
                <div class="mb-3">
                    <label class="form-label">Nama Departement</label>
                    <select class="form-select form-control" name="departement_id" aria-label="Default select example">
                        @foreach ($departements as $departement)
                            <option value="{{$departement->id}}"
                            @if ($departement->id == $departement->departement_id)
                                selected
                            @endif>{{ $departement->name }}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Divisi</label>
                    <select class="form-select form-control" name="divisi_id" aria-label="Default select example">
                        @foreach ($divisi as $divisii)
                            <option value="{{$divisii->id}}"
                            @if ($divisii->id == $management->divisi_id)
                                selected
                            @endif>{{ $divisii->name }}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Position</label>
                    <input type="text" class="form-control" value="{{ $management->position }}" name="position">
                </div>
                <div class="mb-3">
                    <label class="form-label">Level</label>
                    <input type="number" value="{{ $management->level }}" class="form-control" name="level">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jobdesc</label>
                    <textarea class="form-control" name="jobdesc">{{ $management->jobdesc }}</textarea>
                </div>
                    <a href="{{ route('management') }}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
