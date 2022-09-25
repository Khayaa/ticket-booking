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
                        {{ __('My profile') }}
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

            <form action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" method="POST" class="card"
                autocomplete="off">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 text-center">
                            @if (auth()->guard('admin')->user()->avatar)
                                <img src="{{ url('/storage/image/users/avatars/' . auth()->guard('admin')->user()->avatar) }}"
                                    class="rounded-circle mb-3" style="width: 150px;" alt="Avatar" />
                            @else
                                <img src="https://eu.ui-avatars.com/api/?name={{ urlencode(auth()->guard('admin')->user()->fullname) }}"
                                    class="rounded-circle mb-3" style="width: 150px;" alt="Avatar" />
                            @endif


                            <h5 class="mb-2"><strong>{{ auth()->guard('admin')->user()->fullname }}</strong></h5>
                            <div class="mb-3">
                                <label class="form-label" for="avatar">Upload Profile Picture</label>

                                <input type="file" name="avatar" id="avatar"
                                    class="form-control @error('avatar') is-invalid @enderror">
                                @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                    </div>
                    <div class="row g-3">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('Full Name') }}</label>
                                <input type="text" name="fullname"
                                    class="form-control @error('fullname') is-invalid @enderror"
                                    placeholder="{{ __('Full Name') }}" value="{{ old('fullname', auth()->guard('admin')->user()->fullname) }}"
                                    required>
                                @error('fullname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="row g-3">

                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('Phone Number') }}</label>
                                <input type="phone_number" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    placeholder="{{ __('Phone Number') }}"
                                    value="{{ old('phone_number', auth()->guard('admin')->user()->phone_number) }}" required>
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('Email address') }}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="{{ __('Email') }}" value="{{ old('email', auth()->guard('admin')->user()->email) }}" disabled>

                    </div>


                    <div class="row g-3">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('New password') }}</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="{{ __('New password') }}">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label required">{{ __('New password confirmation') }}</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="{{ __('New password confirmation') }}" autocomplete="new-password">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

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
