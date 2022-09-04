@extends('layouts.admin.base')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        {{ config('app.name') }}
                    </div>
                    <h2 class="page-title">
                        {{ __('Create Event') }}
                    </h2>
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

            <form action="{{ route('admin.event.create') }}" enctype="multipart/form-data" method="POST" class="card"
                autocomplete="off">
                @csrf
                @method('POST')

                <div class="card-body">

                    <div class="row g-3">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label ">{{ __('Title') }}</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="{{ __('Title') }}" value="{{ old('title') }}"
                                    >
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label ">{{ __('Event Type') }}</label>
                                <select class="form-select @error('title') is-invalid @enderror" value="{{ old('event_type') }}" name="event_type">
                                    <option value="">---Select type---</option>
                                    @foreach (App\Models\Events::EventType as $item => $label)
                                    <option value="{{ $item }}">{{$label }}</option>
                                    @endforeach


                                </select>
                                @error('event_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                        </div>
                    </div>
                    <div class="g-3">
                        <div class="mb-3">
                            <label class="form-label ">{{ __('Description') }}</label>
                            <textarea  class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                          </div>

                    </div>

                    <div class="row g-3">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label ">{{ __('Price') }}</label>
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    placeholder="{{ __('Price') }}"
                                    value="{{ old('price') }}" >
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label ">{{ __('Date') }}</label>
                                <input type="date" name="date"
                                    class="form-control @error('date') is-invalid @enderror"
                                    placeholder="{{ __('Date') }}"
                                    value="{{ old('date') }}" >
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>




                    <div class="row g-3">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label ">{{ __('Event Status') }}</label>
                                <select class="form-select @error('event_status') is-invalid @enderror" value="{{ old('event_status') }}" name="event_status">
                                    <option value="">---Select status---</option>
                                    @foreach (App\Models\Events::EventStatus as $item => $label)
                                    <option value="{{ $item }}">{{$label }}</option>
                                    @endforeach


                                </select>
                                @error('event_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>


                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label ">{{ __('Time') }}</label>
                                <input type="time" name="time"
                                    class="form-control @error('time') is-invalid @enderror"
                                    placeholder="{{ __('New password confirmation') }}" >
                                @error('time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="row">


                        <div class="mb-3">

                            <label class="form-label ">{{ __('Event Image') }}</label>
                            <input type="file" name="thumbnail" id="thumbnail"
                                class="form-control @error('thumbnail') is-invalid @enderror">
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror



                        </div>

                    </div>




                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>

            </form>

        </div>
    </div>
@endsection
