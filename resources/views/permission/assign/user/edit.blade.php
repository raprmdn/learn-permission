@extends('layouts.back')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select Permissions"
            });
        });
    </script>
@endpush

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-5">
        <div class="card-header">Sync role user :: {{ $user->name }}</div>
        <div class="card-body">
            <form action="{{ route('assign.user.edit', $user) }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="email">User email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="User email" value=" {{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="roles">Select role</label>
                    <select name="roles[]" id="roles" class="form-control select2" multiple>
                        @foreach ($roles as $role)
                            <option {{ $user->roles()->find($role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Sync</button>
            </form>
        </div>
    </div>

@endsection