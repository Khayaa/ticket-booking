@extends('layouts.guest')

@section('content')
    <form class="card card-md" action="{{ route('register') }}" method="post" autocomplete="off">
        @csrf

        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('Create new account') }}</h2>

            <div class="mb-3">
                <label class="form-label">{{ __('Name') }}</label>
                <input type="text" name="name" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Surname') }}</label>
                <input type="text" name="surname" value="{{ old('surname')}}" class="form-control @error('surname') is-invalid @enderror" placeholder="{{ __('Surname') }}">
                @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Phone number') }}</label>
                <input type="number" name="phone_number" value="{{ old('phone_number')}}"class="form-control @error('phone_number') is-invalid @enderror" placeholder="{{ __('Phone number') }}">
                @error('phone_number')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('ID number') }}</label>
                <input type="number" name="id_number" value="{{old('id_number')}}"  class="form-control @error('id_number') is-invalid @enderror" placeholder="{{ __('ID number') }}">
                @error('id_number')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Email address') }}</label>
                <input type="email" name="email"  value="{{ old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Repeat Password') }}</label>
                <input type="password" name="password_confirmation" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('Repeat Password') }}">
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Create new account') }}</button>
            </div>
        </div>
    </form>

    @if (Route::has('login'))
    <div class="text-center text-muted mt-3">
        {{ __('Already have account?') }} <a href="{{ route('login') }}" tabindex="-1">{{ __('Sign in') }}</a>
    </div>
    @endif

@endsection
