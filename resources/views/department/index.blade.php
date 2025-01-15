


@extends('layouts.admin')

@section('page-title')
   {{ __("Manage Department") }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __("Home") }}</a></li>
    <li class="breadcrumb-item">{{ __("Department") }}</li>
@endsection

@section('action-button')
{{-- @can('Create Department')
        <a href="#" data-url="{{ route('department.create') }}" data-ajax-popup="true"
            data-title="{{ __('Create New Department') }}" data-bs-toggle="tooltip" title="" class="btn btn-sm btn-primary"
            data-bs-original-title="{{ __('Create') }}">
            <i class="ti ti-plus"></i>
        </a>
    @endcan --}}
    <a href="{{ route('department.create') }}" data-title="{{ __('Create New Client') }}" data-bs-toggle="tooltip"
            title="" class="btn btn-sm btn-primary" data-bs-original-title="{{ __('Create') }}">
            <i class="ti ti-plus"></i>
        </a>
@endsection

@section('content')
<div class="row">
        {{-- <div class="col-3">
            @include('layouts.hrm_setup')
        </div> --}}
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">

                    <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                {{-- <th>{{ __('Branch') }}</th> --}}
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Short Name') }}</th>
                                <th>{{ __('HOD') }}</th>
                                <th>{{ __('Project') }}</th>
                                <th>{{ __('Client') }}</th>
                                <th>{{ __('Active') }}</th>
                                {{-- <th>{{ __('Department') }}</th> --}}

                                <th width="200px">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    {{-- <td>{{ !empty($department->branch) ? $department->branch->name : '' }}</td> --}}
                                    <td>{{ $department->department_name }}</td>
                                    <td>{{ $department->short_name }}</td>
                                    <td>{{ $department->hod}}</td>
                                    <td>{{ $department->project_id }}</td>
                                    <td>{{ !empty($department->client_id) ? $department->client->client_name : '' }}</td>
                                    <td>{{ $department->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                                    {{-- <td>{{ !empty($department->department) ? $department->department->department_name : '' }}</td> --}}


                                    <td class="Action">
                                        <span>
                                            {{-- @can('Edit Department') --}}
                                                {{-- <div class="action-btn bg-info ms-2">
                                                    <a href="#" class="mx-3 btn btn-sm  align-items-center"
                                                        data-url="{{  URL::to('department/' . $department->id . '/edit') }}"
                                                        data-ajax-popup="true" data-size="md" data-bs-toggle="tooltip" title=""
                                                        data-title="{{ __('Edit Department') }}"
                                                        data-bs-original-title="{{ __('Edit') }}">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div> --}}

                                                <div class="action-btn bg-info ms-2">
                                                    <a href="{{ route('department.edit', $department->id) }}"
                                                        class="mx-3 btn btn-sm  align-items-center"
                                                        data-bs-toggle="tooltip" title=""
                                                        data-bs-original-title="{{ __('Edit') }}">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            {{-- @endcan --}}
                                        

                                            {{-- @can('Delete Department') --}}
                                                <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['department.destroy', $department->id], 'id' => 'delete-form-' . $department->id]) !!}
                                                    <a href="#" class="mx-3 btn btn-sm  align-items-center bs-pass-para"
                                                        data-bs-toggle="tooltip" title="" data-bs-original-title="Delete"
                                                        aria-label="Delete"><i
                                                            class="ti ti-trash text-white text-white"></i></a>
                                                    </form>
                                                </div>
                                            {{-- @endcan --}}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection