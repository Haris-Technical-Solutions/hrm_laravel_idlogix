@extends('layouts.admin')

@section('page-title')
    {{ __('Create Department') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ url('department') }}">{{ __('Department') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create Department') }}</li>
@endsection


@section('content')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
    <form action="{{ route('department.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card em-card">
                    <div class="card-header">
                        <h5>{{ __('Department Detail') }}</h5>
                    </div>
                    <div class="card-body">
                        {{-- <div class="row">
                            <div class="form-group col-md-6">
                                <label for="department_name" class="form-label">{{ __('Department Name') }}<span class="text-danger pl-1">*</span></label>
                                <input type="text" name="department_name" id="department_name" class="form-control" value="{{ old('department_name') }}" required placeholder="Enter Department Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="short_name" class="form-label">{{ __('Short Name') }}<span class="text-danger pl-1">*</span></label>
                                <input type="text" name="short_name" id="short_name" class="form-control" value="{{ old('short_name') }}" required placeholder="Enter Department Short Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hod" class="form-label">{{ __('hod') }}<span class="text-danger pl-1">*</span></label>
                                <input type="number" name="hod" id="hod" class="form-control" value="{{ old('hod') }}" placeholder="Enter HOD">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="client_id" class="form-label">{{ __('Client') }}<span class="text-danger pl-1">*</span></label>
                                <select name="client_id" id="client_id" class="form-control" required>
                                    @php
                                        $clients = \App\Models\Client::getallClients();
                                    @endphp
                                    <option value="">Select Client</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                            {{ $client->client_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="form-group col-md-6">
                                <label for="project_id" class="form-label">{{ __('Project') }}<span class="text-danger pl-1">*</span></label>
                                <select name="project_id" id="project_id" class="form-control">
                                    @php
                                        $projects = \App\Models\Project::getAllProjects();
                                    @endphp
                                    <option value="">Select Project</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                            {{ $project->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="is_active" class="form-label">{{ __('Is Active') }}</label>
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active') ? 'checked' : '' }}>
                                    <label for="is_active" class="form-check-label">{{ __('Active') }}</label>
                                </div>
                            </div>
                     </div> --}}

                     <div class="row">
                        <div class="form-group col-md-6">
                            <label for="department_name" class="form-label">{{ __('Department Name') }}<span class="text-danger pl-1">*</span></label>
                            <input type="text" name="department_name" id="department_name" class="form-control" value="{{ old('department_name') }}" required placeholder="Enter Department Name">
                            @error('department_name')
                                <span class="invalid-feedback d-block">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="short_name" class="form-label">{{ __('Short Name') }}<span class="text-danger pl-1">*</span></label>
                            <input type="text" name="short_name" id="short_name" class="form-control" value="{{ old('short_name') }}" required placeholder="Enter Department Short Name">
                            @error('short_name')
                                <span class="invalid-feedback d-block">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="hod" class="form-label">{{ __('HOD') }}<span class="text-danger pl-1">*</span></label>
                            <input type="number" name="hod" id="hod" class="form-control" value="{{ old('hod') }}" placeholder="Enter HOD">
                            @error('hod')
                                <span class="invalid-feedback d-block">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="client_id" class="form-label">{{ __('Client') }}<span class="text-danger pl-1">*</span></label>
                            <select name="client_id" id="client_id" class="form-control" required>
                                @php
                                    $clients = \App\Models\Client::getallClients();
                                @endphp
                                <option value="">Select Client</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                        {{ $client->client_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <span class="invalid-feedback d-block">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="project_id" class="form-label">{{ __('Project') }}<span class="text-danger pl-1">*</span></label>
                            <select name="project_id" id="project_id" class="form-control">
                                @php
                                    $projects = \App\Models\Project::getAllProjects();
                                @endphp
                                <option value="">Select Project</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                        {{ $project->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <span class="invalid-feedback d-block">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="is_active" class="form-label">{{ __('Is Active') }}</label>
                            <div class="form-check">
                                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active') ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">{{ __('Active') }}</label>
                            </div>
                            @error('is_active')
                                <span class="invalid-feedback d-block">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                 </div>
                </div>
         </div>
     </div>

    <div class="float-end">
        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
    </div>
    <br>
</form>

@endsection
