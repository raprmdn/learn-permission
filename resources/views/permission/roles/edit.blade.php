@extends('layouts.back')

@section('content')
    <div class="card mb-4">
        <div class="card-header">Edit role</div>
        <div class="card-body">
            <form action="{{ route('roles.edit', $role) }}" method="post">
                @csrf
                @method('put')
                @include('permission.roles.partials.form-control')
            </form>
        </div>
    </div>
@endsection