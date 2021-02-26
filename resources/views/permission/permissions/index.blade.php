@extends('layouts.back')

@section('content')
    <div class="card mb-4">
        <div class="card-header">Create a new permission</div>
        <div class="card-body">
            <form action="{{ route('permissions.create') }}" method="post">
                @csrf
                @include('permission.permissions.partials.form-control', ['submit' => 'Create'])
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">Table of Permission</div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Guard Name</td>
                    <td>Create at</td>
                    <td>Action</td>
                </tr>
                @foreach ($permissions as $index => $permission)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>{{ $permission->created_at->format('d F Y') }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection