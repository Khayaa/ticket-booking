@extends('layouts.app')

@section('custom_styles')

@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">

            <div class="alert alert-success">
                <div class="alert-title">
                    {{ __('Welcome') }} {{ auth()->user()->name ?? null }}
                </div>
                <div class="text-muted">
                    {{ __('You are logged in!') }}
                </div>
            </div>

            <div class="row row-deck">
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                        <h2>Profile</h2>
                        <a href="{{ route('profile.show')}}" class="btn btn-blue">Update Profile</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                        <h2>Events</h2>
                        <a href="{{ route('user.events')}}" class="btn btn-azure">Open Events</a>
                        </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                        <h2>Tickets</h2>
                        <a href="{{ route('user.tickets')}}" class="btn btn-blue">Check your Tickets</a>
                    </div>
                    </div>
                  </div>
                </div>
              </div>

        </div>
    </div>
@endsection
