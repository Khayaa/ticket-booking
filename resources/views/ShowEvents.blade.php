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


                @forelse ($events as $event)
                <div class="card d-flex flex-column">
                    <a href="{{ url('/storage/image/events/' .$event->thumbnail) }}">
                      <img height="350" width="100" class="card-img-top" src="{{ url('/storage/image/events/' .$event->thumbnail) }}" alt="How do you know she is a witch?">
                    </a>
                    <div class="card-body d-flex flex-column">
                      <h3 class="card-title"><a href="#">  {{ $event->title}}</a></h3>
                      <div class="text-muted">{{$event->description }}</div>
                      <div class="d-flex align-items-center pt-4 mt-auto">
                        @if ($event->event_type == 'free')
                        <span class="badge bg-green">FREE</span>
                        @else

                        <span class="badge bg-blue">R {{$event->price }}</span>
                        @endif

                        <div class="ms-3">
                          <a href="#" class="text-body">DATE :{{ $event->date}}</a>
                          <div class="text-muted">TIME :{{ $event->time }}</div>
                        </div>
                        @if ($event->sold_tickets == $event->number_of_tickets )
                        <div class="ms-auto">

                            <h2><span class="badge bg-red">Event Sold Out</span></h2>
                        </div>

                        @else
                        <div class="ms-auto">
                            <h2><span class="badge bg-blue"> {{ $event->number_of_tickets - $event->sold_tickets  }} ticket\s left </span></h2>
                        </div>
                        <div class="ms-auto">

                            <a href="{{ route('book-event', $event->slug) }}" class="btn btn-primary">
                                Book Event
                              </a>
                        </div>
                        @endif

                      </div>
                    </div>
                  </div>
                  <br>
                  @empty
                  <div class="page-body">
                    <div class="container-xl">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">
                                    {{ __('No Events currently available ') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                  <br>
                @endforelse

        </div>
    </div>
@endsection
