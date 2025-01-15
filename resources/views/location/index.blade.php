


@extends('layouts.admin')

@section('page-title')
   {{ __("Locations") }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __("Home") }}</a></li>
    <li class="breadcrumb-item">{{ __("Location") }}</li>
@endsection

@section('action-button')
{{-- @can('Create Department')
        <a href="#" data-url="{{ route('department.create') }}" data-ajax-popup="true"
            data-title="{{ __('Create New Department') }}" data-bs-toggle="tooltip" title="" class="btn btn-sm btn-primary"
            data-bs-original-title="{{ __('Create') }}">
            <i class="ti ti-plus"></i>
        </a>
    @endcan --}}
    <a href="{{ route('location.create') }}" data-title="{{ __('Create New Location') }}" data-bs-toggle="tooltip"
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
                                <th>{{ __('Location Name') }}</th>
                                <th>{{ __('Longitude') }}</th>
                                <th>{{ __('Latitude') }}</th>
                                <th>{{ __('Allowed Radius meters') }}</th>
                                <th>{{ __('Client') }}</th>
                                <th>{{ __('Active') }}</th>
                                {{-- <th>{{ __('Department') }}</th> --}}

                                <th width="200px">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($locations as $location)
                                <tr>
                                    {{-- <td>{{ !empty($department->branch) ? $department->branch->name : '' }}</td> --}}
                                    <td>{{ $location->location_name }}</td>
                                    <td>{{ $location->longitude }}</td>
                                    <td>{{ $location->latitude}}</td>
                                    <td>{{ $location->allowed_radius_in_meters }}</td>
                                    <td>{{ !empty($location->client_id) ? $location->client->client_name : '' }}</td>
                                    <td>{{ $location->is_active == 1 ? 'Active' : 'Inactive' }}</td>
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
                                                    <a href="{{ route('location.edit', $location->id) }}"
                                                        class="mx-3 btn btn-sm  align-items-center"
                                                        data-bs-toggle="tooltip" title=""
                                                        data-bs-original-title="{{ __('Edit') }}">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            {{-- @endcan --}}
                                        

                                            {{-- @can('Delete Department') --}}
                                                <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['location.destroy', $location->id], 'id' => 'delete-form-' . $location->id]) !!}
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