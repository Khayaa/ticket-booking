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
                    <td class="text-muted" >
                      {{$ticket->event_id}}
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
                        <a href="#">Cancel</a>
                      </td>
                  </tr>
                @endforeach
                
                
               
                 
                 
                
              </tbody>
            </table>
          </div>
    </div>
</div>


@endsection
