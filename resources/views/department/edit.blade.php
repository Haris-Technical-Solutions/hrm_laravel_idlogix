
{{-- {{ Form::model($department, ['route' => ['department.update', $department->id], 'method' => 'PUT']) }}
<div class="modal-body">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                {{ Form::label('branch_id', __('Branch'), ['class' => 'form-label']) }}
                <div class="form-icon-user">
                    {{ Form::select('branch_id', $branch, null, ['class' => 'form-control ','placeholder' => __('Select Branch')]) }}
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
                <div class="form-icon-user">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Department Name')]) }}
                </div>
                @error('name')
                    <span class="invalid-name" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary">
</div>
{{ Form::close() }} --}}

@extends('layouts.admin')

@section('page-title')
    {{ __('Edit Department') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ url('department') }}">{{ __('Department') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit Department') }}</li>
@endsection

@section('content')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
{{-- <div class="container"> --}}
    {{-- <h2>Edit Department</h2> --}}
    <form action="{{ route('department.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card em-card">
                    <div class="card-header">
                        <h5>{{ __('Department Detail') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
 
                            <label for="department_name">Department Name<span class="text-danger">*</span></label>
                            <input type="text" name="department_name" id="department_name" class="form-control" value="{{ old('department_name', $department->department_name) }}" required>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="short_name">Short Name<span class="text-danger">*</span></label>
                            <input type="text" name="short_name" id="short_name" class="form-control" value="{{ old('short_name', $department->short_name) }}" required>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="hod">HOD</label>
                            <input type="number" name="hod" id="hod" class="form-control" value="{{ old('hod', $department->hod) }}">
                            </div>

                            <div class="form-group col-md-6">
                            <label for="client_id">Client<span class="text-danger">*</span></label>
                            <select name="client_id" id="client_id" class="form-control" required>
                            <option value="">Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ $department->client_id == $client->id ? 'selected' : '' }}>
                                    {{ $client->client_name }}
                                </option>
                            @endforeach
                            </select>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="project_id">Project<span class="text-danger">*</span></label>
                            <select name="project_id" id="project_id" class="form-control">
                            <option value="">Select Project</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ $department->project_id == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                            </select>
                            </div>

                            <div class="form-group col-md-6 form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ $department->is_active ? 'checked' : '' }}>
                            <label for="is_active" class="form-check-label">Active</label>
                            </div>
                        </div>
                        </div>
                       </div>
                </div>
            </div>

            <div class="float-end">
                <button type="submit" class="btn btn-primary">{{ __('Update Department') }}</button>
            </div>
            <br>
                            {{-- <button type="submit" class="btn btn-primary">Update Department</button>
                            <a href="{{ route('department.index') }}" class="btn btn-secondary">Cancel</a> --}}
    </form>
{{-- </div> --}}

@endsection