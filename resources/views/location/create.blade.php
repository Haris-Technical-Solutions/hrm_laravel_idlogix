@extends('layouts.admin')

@section('page-title')
    {{ __('Create Location') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ url('location') }}">{{ __('Location') }}</a></li>
    <li class="breadcrumb-item">{{ __('Create Location') }}</li>
@endsection


@section('content')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
    <form action="{{ route('location.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card em-card">
                    <div class="card-header">
                        <h5>{{ __('Location Detail') }}</h5>
                    </div>
                    <div class="card-body">
                        {{-- <div class="row">
                            <div class="form-group col-md-6">
                                <label for="location_name" class="form-label">{{ __('Location Name') }}<span class="text-danger pl-1">*</span></label>
                                <input type="text" name="location_name" id="location_name" class="form-control" value="{{ old('location_name') }}" required placeholder="Enter Location">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="longitude" class="form-label">{{ __('Longitude') }}<span class="text-danger pl-1">*</span></label>
                                <input type="number" name="longitude" id="longitude" class="form-control" step="0.0000000000001"  value="{{ old('longitude') }}" placeholder="Enter Longitude">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="latitude" class="form-label">{{ __('Latitude') }}<span class="text-danger pl-1">*</span></label>
                                <input type="number" name="latitude" id="latitude" class="form-control"   step="0.0000000000001"  value="{{ old('latitude') }}" placeholder="Enter Latitude">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="radius_in_meters" class="form-label">{{ __('Radius_in_meters') }}<span class="text-danger pl-1">*</span></label>
                                <input type="number" name="radius_in_meters" id="radius_in_meters" class="form-control" step="0.0001"   value="{{ old('radius_in_meters') }}" placeholder="Enter Radius in meters">
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
                                <label for="is_active" class="form-label">{{ __('Is Active') }}</label>
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active') ? 'checked' : '' }}>
                                    <label for="is_active" class="form-check-label">{{ __('Active') }}</label>
                                </div>
                            </div>
                     </div> --}}

                     <div class="row">
                        <div class="form-group col-md-6">
                            <label for="location_name" class="form-label">
                                {{ __('Location Name') }}
                                <span class="text-danger pl-1">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="location_name" 
                                id="location_name" 
                                class="form-control @error('location_name') is-invalid @enderror" 
                                value="{{ old('location_name') }}" 
                                {{-- required  --}}
                                placeholder="Enter Location">
                            @error('location_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="longitude" class="form-label">
                                {{ __('Longitude') }}
                                <span class="text-danger pl-1">*</span>
                            </label>
                            <input 
                                type="number" 
                                name="longitude" 
                                id="longitude" 
                                class="form-control @error('longitude') is-invalid @enderror" 
                                step="0.0000000000001" 
                                value="{{ old('longitude') }}" 
                                placeholder="Enter Longitude">
                            @error('longitude')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="latitude" class="form-label">
                                {{ __('Latitude') }}
                                <span class="text-danger pl-1">*</span>
                            </label>
                            <input 
                                type="number" 
                                name="latitude" 
                                id="latitude" 
                                class="form-control @error('latitude') is-invalid @enderror" 
                                step="0.0000000000001" 
                                value="{{ old('latitude') }}" 
                                placeholder="Enter Latitude">
                            @error('latitude')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="radius_in_meters" class="form-label">
                                {{ __('Radius in Meters') }}
                                <span class="text-danger pl-1">*</span>
                            </label>
                            <input 
                                type="number" 
                                name="radius_in_meters" 
                                id="radius_in_meters" 
                                class="form-control @error('radius_in_meters') is-invalid @enderror" 
                                step="0.0001" 
                                value="{{ old('radius_in_meters') }}" 
                                placeholder="Enter Radius in meters">
                            @error('radius_in_meters')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="client_id" class="form-label">
                                {{ __('Client') }}
                                <span class="text-danger pl-1">*</span>
                            </label>
                            <select 
                                name="client_id" 
                                id="client_id" 
                                class="form-control @error('client_id') is-invalid @enderror" 
                                required>
                                <option value="">Select Client</option>
                                @foreach($clients as $client)
                                    <option 
                                        value="{{ $client->id }}" 
                                        {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                        {{ $client->client_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="is_active" class="form-label">{{ __('Is Active') }}</label>
                            <div class="form-check">
                                <input 
                                    type="checkbox" 
                                    name="is_active" 
                                    id="is_active" 
                                    class="form-check-input @error('is_active') is-invalid @enderror" 
                                    value="1" 
                                    {{ old('is_active') ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">{{ __('Active') }}</label>
                            </div>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
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
