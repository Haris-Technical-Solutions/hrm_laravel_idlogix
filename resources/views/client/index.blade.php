@extends('layouts.admin')

@section('page-title')
    {{ __('Manage Clients') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Client') }}</li>
@endsection

@section('action-button')
    <a href="{{ route('client.export') }}" data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-original-title="{{ __('Export') }}" class="btn btn-sm btn-primary">
        <i class="ti ti-file-export"></i>
    </a>

    <a href="#" data-url="{{ route('client.file.import') }}" data-ajax-popup="true"
        data-title="{{ __('Import  Employee CSV File') }}" data-bs-toggle="tooltip" title=""
        class="btn btn-sm btn-primary" data-bs-original-title="{{ __('Import') }}">
        <i class="ti ti-file"></i>
    </a>
    {{-- @can('Create Employee') --}}
        <a href="{{ route('client.create') }}" data-title="{{ __('Create New Client') }}" data-bs-toggle="tooltip"
            title="" class="btn btn-sm btn-primary" data-bs-original-title="{{ __('Create') }}">
            <i class="ti ti-plus"></i>
        </a>
    {{-- @endcan --}}
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header card-body table-border-style">
                    {{-- <h5></h5> --}}
                    <div class="table-responsive">
                        <table class="table" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Address') }}</th>
                                    <th>{{ __('Phone Number') }}</th>
                                    <th>{{ __('Active') }}</th>
                                    {{-- <th>{{ __('Designation') }}</th>
                                    <th>{{ __('Date Of Joining') }}</th> --}}
                                    {{-- @if (Gate::check('Edit Employee') || Gate::check('Delete Employee')) --}}
                                        <th width="200px">{{ __('Action') }}</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($clients as $client) 
                                    <tr>
                                            <td>
                                            {{ $client->id }}
                                            </td>
                                            <td>{{ $client->client_name }}</td>
                                            <td>{{ $client->address }}</td>
                                            <td>{{ $client->phone_no }}</td>
                                            <td>{{ $client->is_active }}</td>
                                            <td class="Action">
                                                {{-- @if ($employee->user->is_active == 1 && $employee->user->is_disable == 1) --}}
                                                    <span>
                                                        {{-- @can('Edit Employee') --}}
                                                            <div class="action-btn bg-info ms-2">
                                                                <a href="{{ route('client.edit', $client->id) }}"
                                                                    class="mx-3 btn btn-sm  align-items-center"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="{{ __('Edit') }}">
                                                                    <i class="ti ti-pencil text-white"></i>
                                                                </a>
                                                            </div>
                                                        {{-- @endcan --}}

                                                        {{-- @can('Delete Employee') --}}
                                                            <div class="action-btn bg-danger ms-2">
                                                                {!! Form::open([
                                                                    'method' => 'DELETE',
                                                                    'route' => ['client.destroy', $client->id],
                                                                    'id' => 'delete-form-' . $client->id,
                                                                ]) !!}
                                                                <a href="#"
                                                                    class="mx-3 btn btn-sm  align-items-center bs-pass-para"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="Delete" aria-label="Delete"><i
                                                                        class="ti ti-trash text-white text-white"></i></a>
                                                                </form>
                                                            </div>
                                                        {{-- @endcan --}}

                                                    </span>
                                                {{-- @else
                                                    <i class="ti ti-lock"></i>
                                                @endif --}}
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
