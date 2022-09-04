@extends('layouts.home')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Events') }}
            </h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
           

                @foreach ($events as $event)
                <div class="card d-flex flex-column">
                    <a href="{{ url('/storage/image/events/' .$event->thumbnail) }}">
                      <img height="350" width="100" class="card-img-top" src="{{ url('/storage/image/events/' .$event->thumbnail) }}" alt="How do you know she is a witch?">
                    </a>
                    <div class="card-body d-flex flex-column">
                      <h3 class="card-title"><a href="#">  {{ $event->title}}</a></h3>
                      <div class="text-muted">{{$event->description }}</div>
                      <div class="d-flex align-items-center pt-4 mt-auto">
                        @if ($event->price > 0)
                        <span class="badge bg-blue">R {{$event->price }}</span>
                        @else
                        <span class="badge bg-green">FREE</span>
                        @endif
                        
                        <div class="ms-3">
                          <a href="#" class="text-body">DATE :{{ $event->date}}</a>
                          <div class="text-muted">TIME :{{ $event->time }}</div>
                        </div>
                        <div class="ms-auto">
                            <a href="{{ route('book-event', $event->id) }}" class="btn btn-primary">
                                Book Event
                              </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                @endforeach
           
        </div>
    </div>
@endsection
