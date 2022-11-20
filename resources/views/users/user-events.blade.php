@extends('layouts.app')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __('All Events') }}
        </h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <div class="card">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">
                      {{-- <li class="nav-item">
                        <a href="#tabs-home-ex1" class="nav-link active" data-bs-toggle="tab">My Events</a>
                      </li> --}}
                      <li class="nav-item">
                        <a href="#tabs-profile-ex1" class="nav-link" data-bs-toggle="tab">All Events</a>
                      </li>
                    </ul>
                    <div class="card-body">
                      <div class="tab-content">
                        {{-- <div class="tab-pane active show" id="tabs-home-ex1">
                            <div class="card-body">
                                <div class="row align-items-center">
                                  <div class="col-10">
                                    <h3 class="h1"></h3>
                                    <div class="markdown text-muted">
                                        {{$event->events->title}}
                                    </div>
                                    <div class="mt-3">
                                      <a href="" class="btn btn-primary" target="_blank" rel="noopener">Open Event</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div> --}}
                        <div class="tab-pane" id="tabs-profile-ex1">
                           @foreach ($events as $event)
                           <div class="card-body">
                            <div class="row align-items-center">
                              <div class="col-10">
                                <h3 class="h1">{{ $event->title }}</h3>
                                <div class="markdown text-muted">
                                 {{$event->description}}
                                </div>
                                <div class="mt-3">
                                  <a href="{{route('event-details',['id'=> $event->id])}}" class="btn btn-primary" target="_blank" rel="noopener">Open Event</a>
                                </div>
                              </div>
                            </div>
                          </div>
                           @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

    </div>
</div>


@endsection
