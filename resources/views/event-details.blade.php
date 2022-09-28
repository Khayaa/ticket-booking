@extends('layouts.home')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Event Details') }}
            </h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                             Event
                        </h2>
                    </div>
                    <div class="col-auto ms-auto">
                        <div class="btn-list">
                            <h2>Price <span class="badge bg-blue">R {{ $event->price }}</span></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <img src="{{ url('/storage/image/events/' . $event->thumbnail) }}" height="300" width="300" class="card-img"
                    alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text">{{ $event->description }}.</p>
                    <div class="hr-text">Event Date and Time</div>
                    <p class="card-text text-center"><small class="text-muted"> {{ $event->date }} ,
                            {{ $event->time }}</small></p>
                </div>
            </div>
            <div class="hr-text"></div>
        </div>
    </div>
@endsection
