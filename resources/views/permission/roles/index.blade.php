@extends('layouts.back')

@section('content')
    <div class="card mb-4">
        <div class="card-header">Create a new role</div>
        <div class="card-body">
            <form action="{{ route('roles.create') }}" method="post">
                @csrf
                @include('permission.roles.partials.form-control', ['submit' => 'Create'])
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">Table of Role</div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Guard Name</td>
                    <td>Create at</td>
                    <td>Action</td>
                </tr>
                @foreach ($roles as $index => $role)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>{{ $role->created_at->format('d F Y') }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection