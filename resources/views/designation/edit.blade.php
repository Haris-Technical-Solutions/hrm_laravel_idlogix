{{-- 
{{ Form::model($designation, ['route' => ['designation.update', $designation->id], 'method' => 'PUT']) }}
<div class="modal-body">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                {{ Form::label('branch_id', __('Branch'), ['class' => 'form-label']) }}
                <div class="form-icon-user">
                    {{ Form::select('branch_id', $branchs, null, ['class' => 'form-control ','placeholder' => __('Select Branch')]) }}
                </div>
            </div>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                {{ Form::label('department_id', __('Department'), ['class' => 'form-label']) }}
                <div class="form-icon-user">
                    {{ Form::select('department_id', $departments, null, ['class' => 'form-control ','placeholder' => __('Select Department')]) }}
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
                <div class="form-icon-user">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Designation Name')]) }}
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

<form action="{{ route('designation.update', $designation->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="modal-body">
        {{-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="client_id" class="form-label">Client</label>
                    <div class="form-icon-user">
                        <select name="client_id" id="client_id" class="form-control">
                            <option value="" disabled>Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id', $designation->client_id) == $client->id ? 'selected' : '' }}>
                                    {{ $client->client_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('client_id')
                        <span class="invalid-feedback d-block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="project_id" class="form-label">Project</label>
                    <div class="form-icon-user">
                        <select name="project_id" id="project_id" class="form-control">
                            <option value="" disabled>Select Project</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id', $designation->project_id) == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('project_id')
                        <span class="invalid-feedback d-block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="name" class="form-label">Designation Name</label>
                    <div class="form-icon-user">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Designation Name" value="{{ old('name', $designation->designation_title) }}">
                    </div>
                    @error('name')
                        <span class="invalid-feedback d-block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="is_active" class="form-label">Active</label>
                    <div class="form-icon-user">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $designation->is_active) == 1 ? 'checked' : '' }}>
                    </div>
                    @error('is_active')
                        <span class="invalid-feedback d-block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        </div> --}}

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="client_id" class="form-label">Client</label>
                    <div class="form-icon-user">
                        <select name="client_id" id="client_id" class="form-control">
                            <option value="" disabled>Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id', $designation->client_id) == $client->id ? 'selected' : '' }}>
                                    {{ $client->client_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('client_id')
                        <span class="invalid-feedback d-block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="project_id" class="form-label">Project</label>
                    <div class="form-icon-user">
                        <select name="project_id" id="project_id" class="form-control">
                            <option value="" disabled>Select Project</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id', $designation->project_id) == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('project_id')
                        <span class="invalid-feedback d-block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="name" class="form-label">Designation Name</label>
                    <div class="form-icon-user">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Designation Name" value="{{ old('name', $designation->designation_title) }}">
                    </div>
                    @error('name')
                        <span class="invalid-feedback d-block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    {{-- <label for="is_active" class="form-label">Active</label> --}}
                    <label for="is_active" class="form-label">{{ __('Is Active') }}</label>
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ old('is_active', $designation->is_active) == 1 ? 'checked' : '' }}>
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

    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

