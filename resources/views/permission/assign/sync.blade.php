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
        <div class="card-header">Assign Permission</div>
        <div class="card-body">
            <form action="{{ route('assign.edit', $role) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                    <option selected disabled hidden>Choose a role!</option>
                    @foreach ($roles as $item)
                        <option {{ $role->id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                    </select>
                    @error('role')
                      <span class="text-danger mt-2 d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="permissions">Permissions</label>
                    <select name="permissions[]" id="permissions" class="form-control select2" multiple>
                    @foreach ($permissions as $permission)
                        <option {{ $role->permissions()->find($permission->id) ? "selected" : '' }} value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                    </select>
                    @error('permissions')
                      <span class="text-danger mt-2 d-block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Sync</button>
            </form>
        </div>
    </div>
@endsection