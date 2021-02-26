@extends('layouts.back')

@section('content')
    <div class="card mb-4">
        <div class="card-header">Edit permission</div>
        <div class="card-body">
            <form action="{{ route('permissions.edit', $permission) }}" method="post">
                @csrf
                @method('put')
                @include('permission.permissions.partials.form-control')
            </form>
        </div>
    </div>
@endsection