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
                      <li class="nav-item">
                        <a href="#tabs-home-ex1" class="nav-link active" data-bs-toggle="tab">My Events</a>
                      </li>
                      <li class="nav-item">
                        <a href="#tabs-profile-ex1" class="nav-link" data-bs-toggle="tab">All Events</a>
                      </li>
                    </ul>
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-home-ex1">
                          <div>Cursus turpis vestibulum, dui in pharetra vulputate id sed non turpis ultricies fringilla at sed facilisis lacus pellentesque purus nibh</div>
                        </div>
                        <div class="tab-pane" id="tabs-profile-ex1">
                            <div class="card">
                                <div class="card-img-top img-responsive img-responsive-21x9" style="background-image: url(...)"></div>
                                <div class="card-body">
                                  <h3 class="card-title">Card with title and image</h3>
                                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque minima
                                    neque pariatur perferendis sed suscipit velit vitae voluptatem.</p>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        
    </div>
</div>


@endsection
