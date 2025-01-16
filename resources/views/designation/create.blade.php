
{{-- {{ Form::open(['url' => 'designation', 'method' => 'post']) }}
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
    <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
</div>
{{ Form::close() }} --}}

<form action="{{ route('designation.store') }}" method="POST">
    @csrf
    <div class="modal-body">

        {{-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="client_id" class="form-label">{{ __('Client') }}</label>
                    <div class="form-icon-user">
                        <select name="client_id" id="client_id" class="form-control">
                            <option value="">{{ __('Select Client') }}</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                    {{ $client->client_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('client_id')
                        <span class="invalid-client_id" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="project_id" class="form-label">{{ __('Project') }}</label>
                    <div class="form-icon-user">
                        <select name="project_id" id="project_id" class="form-control">
                            <option value="">{{ __('Select Project') }}</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                    {{ $project->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('project_id')
                        <span class="invalid-project_id" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="name" class="form-label">{{ __('Designation Title') }}</label>
                    <div class="form-icon-user">
                        <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Enter Designation Title') }}" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <span class="invalid-name" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group form-check">
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" {{ old('is_active') ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">{{ __('Is Active') }}</label>
                </div>
            </div> --}}

            {{-- <div class="form-group col-md-6">
                <label for="is_active" class="form-label">{{ __('Is Active') }}</label>
                <div class="form-check">
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active') ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">{{ __('Active') }}</label>
                </div>
            </div>

        </div> --}} 

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="client_id" class="form-label">{{ __('Client') }}</label>
                    <div class="form-icon-user">
                        <select name="client_id" id="client_id" class="form-control">
                            <option value="">{{ __('Select Client') }}</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                    {{ $client->client_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('client_id')
                        <span class="invalid-client_id" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="project_id" class="form-label">{{ __('Project') }}</label>
                    <div class="form-icon-user">
                        <select name="project_id" id="project_id" class="form-control @error('location_name') is-invalid @enderror">
                            <option value="">{{ __('Select Project') }}</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                    {{ $project->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('project_id')
                        <span class="invalid-project_id" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="name" class="form-label">{{ __('Designation Title') }}</label>
                    <div class="form-icon-user">
                        <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Enter Designation Title') }}" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <span class="invalid-name" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
            {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group form-check">
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" {{ old('is_active') ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">{{ __('Is Active') }}</label>
                </div>
            </div> --}}
        
            <div class="form-group col-md-6">
                <label for="is_active" class="form-label">{{ __('Is Active') }}</label>
                <div class="form-check">
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active') ? 'checked' : '' }}>
                    <label for="is_active" class="form-check-label">{{ __('Active') }}</label>
                </div>
                @error('is_active')
                    <span class="invalid-is_active" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        
        </div>
        
    </div>
    <div class="modal-footer">
        <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
    </div>
</form>

