@extends('layouts.app')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __('My Tickets') }}
        </h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <p class="card-text">
                    {{ __('Booked Tickets') }}
                </p>
            </div>
        </div>

        <div class="table-responsive">
            <table
                  class="table table-vcenter table-nowrap">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Email</th>
                  <th>Event</th>
                  <th>Status</th>
                  <th>Total</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($tickets as $ticket)
                <tr>
                    <td >{{ $ticket->name}}</td>
                    <td class="text-muted" >
                        {{ $ticket->phone_number}}
                    </td>
                    <td class="text-muted" ><a href="#" class="text-reset">{{ $ticket->email }}</a></td>
                    <td class="text-muted" >View Event

                        <span>
                            <a href="{{ route('event-details', $ticket->event_id)}}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5"></path>
                                    <line x1="10" y1="14" x2="20" y2="4"></line>
                                    <polyline points="15 4 20 4 20 9"></polyline>
                                 </svg>
                            </a>
                         </span>
                    </td>

                    <td class="text-muted" >
                        <span class="status status-green">
                            Complete
                          </span>
                      </td>
                      <td class="text-muted" >
                        {{$ticket->total}}
                      </td>

                      <td>
                        <a href="#">View Ticket</a>
                      </td>
                  </tr>
                @endforeach






              </tbody>
            </table>
          </div>
    </div>
</div>


@endsection
