@extends('layouts.admin')

@section('page-title')
    {{ __('Edit Client') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ url('client') }}">{{ __('Client') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit Client') }}</li>
@endsection

@section('content')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>

    {{-- <div class="row">
        <div class="">
            <div class=""> --}}

                {{ Form::model($client, ['route' => ['client.update', $client->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                {{-- {{ Form::open(['route' => ['client.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) }} --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card em-card">
                            <div class="card-header">
                                <h5>{{ __('Personal Detail') }}</h5>
                            </div>
                            <div class="card-body">
                                {{-- <div class="row">
                                    <div class="form-group col-md-6">
                                        {!! Form::label('name', __('Name'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::text('client_name', old('client_name'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Client Name',
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('address', __('Address'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::text('address', old('address'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Client Address',
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('phoneno', __('Phone'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::number('phone_no', old('phone_no'), ['class' => 'form-control', 'placeholder' => 'Enter Client Phone No']) !!}
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        {!! Form::label('logo', __('Company Logo'), ['class' => 'form-label']) !!}
                                        {{-- <div> --}}
                                           
                                        {{-- </div> --}}
                                        {{-- {!! Form::file('logo', ['class' => 'form-control', 'accept' => 'image/*']) !!}
                                        @if (!empty($client->logopath)) <!-- Check if the client has a logo -->
                                        <a href="{{ asset('storage/' . $client->logopath) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $client->logopath) }}" alt="Company Logo" class="img-thumbnail" style="width: 50px; height: 50px;">
                                            </a>
                                        @else
                                            <p>No logo uploaded</p>
                                        @endif
                                            <small class="text-muted">Accepted formats: JPEG, PNG, GIF</small>
                                    </div> --}}
                                    {{-- <div class="form-group col-md-6">
                                    {!! Form::label('logo', __('Company Logo'), ['class' => 'form-label w-100 mb-2']) !!}

                                    <div class="form-group col-md-12 d-flex align-items-center">
                                        <div class="d-flex align-items-center w-100">
                                            {!! Form::file('logo', ['class' => 'form-control me-2', 'accept' => 'image/*', 'style' => 'width: 75%;']) !!}
                                            @if (!empty($client->logo_path)) <!-- Check if the client has a logo -->
                                                <a href="{{ asset('storage/' . $client->logo_path) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $client->logo_path) }}" alt="Company Logo" class="img-thumbnail" style="width: 50px; height: 50px;">
                                                </a>
                                            @else
                                                <p class="ms-2 mb-0">No logo</p>
                                            @endif
                                        </div> --}}
                                        {{-- <small class="text-muted d-block mt-1">Accepted formats: JPEG, PNG, GIF</small> --}}
                                    {{-- </div>
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-6">
                                        {!! Form::label('firstname', __('First Name'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::text('first_name', old('first_name'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter First Name',
                                        ]) !!}
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        {!! Form::label('lastname', __('Last Name'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::text('last_name', old('last_name'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Last Name',
                                        ]) !!}
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        {!! Form::label('phonenumber', __('Phone Number'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::number('phone_number', old('phone_number'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Phone Number',
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('email', __('Email'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::email('email', old('email'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Client Email',
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('is_active', __('Is Active'), ['class' => 'form-label']) !!}
                                        <div class="form-check">
                                            {!! Form::checkbox('is_active', 1, old('is_active',$client->is_active) ?? false, [
                                                'class' => 'form-check-input',
                                                'id' => 'is_active',
                                            ]) !!}
                                            {!! Form::label('is_active', __('Active'), ['class' => 'form-check-label']) !!}
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        {!! Form::label('erp_client_id', __('ERP Client'), ['class' => 'form-label']) !!}
                                        <div class="form-check">
                                            {!! Form::checkbox('erp_client_id', 1, old('erp_client_id',$client->erp_client_id) ?? false, [
                                                'class' => 'form-check-input',
                                                'id' => 'erp_client_id',
                                            ]) !!}
                                            {!! Form::label('erp_client_id', __('Enabled'), ['class' => 'form-check-label']) !!}
                                        </div>
                                    </div>   
                                </div> --}} 

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {!! Form::label('name', __('Name'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::text('client_name', old('client_name'), [
                                            'class' => 'form-control',
                                            // 'required' => 'required',
                                            'placeholder' => 'Enter Client Name',
                                        ]) !!}
                                        @error('client_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        {!! Form::label('address', __('Address'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::text('address', old('address'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Client Address',
                                        ]) !!}
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        {!! Form::label('phoneno', __('Phone'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::number('phone_no', old('phone_no'), ['class' => 'form-control', 'placeholder' => 'Enter Client Phone No']) !!}
                                        @error('phone_no')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group col-md-6">
                                        {!! Form::label('logo', __('Company Logo'), ['class' => 'form-label w-100 mb-2']) !!}
                                        <div class="form-group col-md-12 d-flex align-items-center">
                                            <div class="d-flex align-items-center w-100">
                                                {!! Form::file('logo', ['class' => 'form-control me-2', 'accept' => 'image/*', 'style' => 'width: 75%;']) !!}
                                                @if (!empty($client->logo_path))
                                                    <a href="{{ asset('storage/' . $client->logo_path) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . $client->logo_path) }}" alt="Company Logo" class="img-thumbnail" style="width: 50px; height: 50px;">
                                                    </a>
                                                @else
                                                    <p class="ms-2 mb-0">No logo</p>
                                                @endif
                                            </div>
                                        </div>
                                        @error('logo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group col-md-6">
                                        {!! Form::label('firstname', __('First Name'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::text('first_name', old('first_name'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter First Name',
                                        ]) !!}
                                        @error('first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        {!! Form::label('lastname', __('Last Name'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::text('last_name', old('last_name'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Last Name',
                                        ]) !!}
                                        @error('last_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        {!! Form::label('phonenumber', __('Phone Number'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::number('phone_number', old('phone_number'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Phone Number',
                                        ]) !!}
                                        @error('phone_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        {!! Form::label('email', __('Email'), ['class' => 'form-label']) !!}<span class="text-danger pl-1">*</span>
                                        {!! Form::email('email', old('email'), [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => 'Enter Client Email',
                                        ]) !!}
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        {!! Form::label('is_active', __('Is Active'), ['class' => 'form-label']) !!}
                                        <div class="form-check">
                                            {!! Form::checkbox('is_active', 1, old('is_active', $client->is_active) ?? false, [
                                                'class' => 'form-check-input',
                                                'id' => 'is_active',
                                            ]) !!}
                                            {!! Form::label('is_active', __('Active'), ['class' => 'form-check-label']) !!}
                                        </div>
                                        @error('is_active')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        {!! Form::label('erp_client_id', __('ERP Client'), ['class' => 'form-label']) !!}
                                        <div class="form-check">
                                            {!! Form::checkbox('erp_client_id', 1, old('erp_client_id', $client->erp_client_id) ?? false, [
                                                'class' => 'form-check-input',
                                                'id' => 'erp_client_id',
                                            ]) !!}
                                            {!! Form::label('erp_client_id', __('Enabled'), ['class' => 'form-check-label']) !!}
                                        </div>
                                        @error('erp_client_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                   
                </div>

                {{-- @if (\Auth::user()->type != 'employee') --}}
                    <div class="float-end">
                        <button type="submit" class="btn  btn-primary">{{ 'Update' }}</button>
                    </div>
                    <br>
                {{-- @endif --}}
                <div class="col-12">
                    {!! Form::close() !!}
                </div>
            {{-- </div>
        </div>
    </div> --}}
@endsection

{{-- @push('script-page')
    <script type="text/javascript">
        function getDesignation(did) {

            $.ajax({
                url: '{{ route('employee.json') }}',
                type: 'POST',
                data: {
                    "department_id": did,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    $('.designation_id').empty();
                    // var emp_selct = ` <select class="form-control  designation_id" name="designation_id" id="choices-multiple"
                //                         placeholder="Select Designation" >
                //                         </select>`;
                    var emp_selct = `<select class="form-control designation_id" name="designation_id"
                                                 placeholder="Select Designation" required>
                                            </select>`;
                    $('.designation_div').html(emp_selct);
                    $('.designation_id').append('<option value="">{{ __('Select Designation') }}</option>');
                    $.each(data, function(key, value) {
                        var select = '';
                        if (key == '{{ $employee->designation_id }}') {
                            select = 'selected';
                        }

                        $('.designation_id').append('<option value="' + key + '"  ' + select + '>' +
                            value + '</option>');
                    });
                    new Choices('#choices-multiple', {
                        removeItemButton: true,
                    });
                }
            });
        }

        function getdepartment(bid) {

            $.ajax({
                url: '{{ route('employee.getdepartment') }}',
                type: 'POST',
                data: {
                    "branch_id": bid,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    $('#department_id').empty();
                    // var emp_selct = ` <select class="form-control department_id" name="department_id" id="choices-multiple"
                //                         placeholder="Select Department" >
                //                         </select>`;
                    var emp_selct = `<select class="form-control select department_id" name="department_id"
                                            id="department_id" placeholder="Select Department" required>
                                        </select>`;
                    $('.department_div').html(emp_selct);
                    $('.department_id').append('<option value="">{{ __('Select Department') }}</option>');
                    $.each(data, function(key, value) {
                        var select = '';
                        if (key == '{{ $employee->department_id }}') {
                            select = 'selected';
                        }

                        $('.department_id').append('<option value="' + key + '"  ' + select + '>' +
                            value + '</option>');
                    });
                    new Choices('#choices-multiple', {
                        removeItemButton: true,
                    });
                }
            });
        }

        $(document).ready(function() {
            var d_id = $('#department_id').val();
            var designation_id = '{{ $employee->designation_id }}';
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department_id]', function() {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        $(document).ready(function() {
            var b_id = $('#branch_id').val();
            var department_id = '{{ $employee->department_id }}';
            getdepartment(b_id);
        });

        $(document).on('change', 'select[name=branch_id]', function() {
            var branch_id = $(this).val();
            getdepartment(branch_id);
        });
    </script>
@endpush --}}
