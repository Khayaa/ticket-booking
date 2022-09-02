@extends('layouts.admin.base')

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
                      <h2>Manage Users</h2>
                      <a href="{{ route('admin.users')}}" class="btn btn-blue">Click here</a>
                  </div>
                  </div>
                </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                    <h2>Profile</h2>
                    <a href="{{ route('admin.profile')}}" class="btn btn-blue">Update Profile</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                    <h2>Events</h2>
                    <a href="{{ route('admin.events')}}" class="btn btn-azure">Open Events</a>
                    </div>
              </div>
            </div>

            </div>
            <div class="row row-deck">
                <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                          <h2>Tickets</h2>
                          <a href="{{ route('admin.tickets')}}" class="btn btn-blue">Click here</a>
                      </div>
                      </div>
                    </div>
            </div>
          </div>

    </div>
</div>

@endsection
