@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8 pb-2">
                <a href="{{ route('add-user') }}" class="btn btn-primary">Add User</a>
            </div>
            <div class="col-md-8 pt-2">
                <div class="card-header">User</div>
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->level->level }}</td>
                                        <td>
                                            <a href="{{ route('edit-user', $user->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('read-user', $user->id) }}" class="btn btn-info">Read</a>
                                            <a href="{{ route('destroy-user', $user->id) }}"
                                                class="btn btn-danger">Hapus</a>
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
