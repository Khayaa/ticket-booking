@extends('layouts.admin.base')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        All Events
                    </div>
                    <h2 class="page-title">
                        Events
                    </h2>
                </div>
                <div class="col-auto ms-auto">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">

                        </span>
                        <a href="{{ route('admin.event.create') }}" class="btn btn-primary d-none d-sm-inline-block" >
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <!-- SVG icon code -->
                            Create new Event
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <div class="d-flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon alert-icon" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            {{ $message }}
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif

            <div class="card">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Event Type') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('date') }}</th>
                                <th>{{ __('Action') }}</th>
                                <th>{{ __('') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($events as $event)
                                <tr>

                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td>{{ $event->event_type }}</td>
                                    <td>{{ $event->status }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td><a href="{{ route('admin.event.update', $event->id) }}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                        <path d="M16 5l3 3"></path>
                                     </svg></a>
                                     <span>
                                        <a href="{{ route('admin.delete-event', $event->id)}}" onclick="event.preventDefault();
                                        document.getElementById(
                                          'delete-form-{{$event->id}}').submit();"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                         </svg></a>
                                     </span>
                                     <span>
                                        <a href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5"></path>
                                                <line x1="10" y1="14" x2="20" y2="4"></line>
                                                <polyline points="15 4 20 4 20 9"></polyline>
                                             </svg>
                                        </a>
                                     </span>
                                    </td>
                                    <form id="delete-form-{{$event->id}}"
                                        + action="{{route('admin.delete-event', $event->id)}}"
                                        method="post">
                                      @csrf @method('DELETE')
                                  </form>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($events->hasPages())
                    <div class="card-footer pb-0">
                        {{ $events->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
